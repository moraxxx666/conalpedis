<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Noticias extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->load->model('noticias_model', '', TRUE);
    }

    public function index()
    {

        if ($this->ion_auth->logged_in()) {
            $data['noticias'] = $this->noticias_model->ObtenerNoticias();
            $data['user'] = $this->ion_auth->user()->row();
            $this->load->view('/administrador/noticias-admin', $data);
        } else {
            $data['mostrar_alert'] = true;
            $data['mensaje'] = "Necesita iniciar sesión";
            $this->load->view('administrador/login', $data);
        }
    }
    public function AgregarNoticia()
    {
        if ($this->ion_auth->logged_in()) {
            $redireccionar = false;
            $data = array();
            // Count total files
            if (empty($_FILES['files']['name'][0]) || empty($this->input->post('titulo')) || empty($this->input->post('cuerpo'))) {
                // REDIRECCIONAR CON MENSAJE DE CORRECCION
                $this->session->set_flashdata('my_data', "LLENE TODOS LOS CAMPOS");
                redirect('noticias-admin', 'refresh');
            } else if (!empty($_FILES['files']['name']) && !empty($this->input->post('titulo')) && !empty($this->input->post('cuerpo'))) {

                //AGREGAR NOTICIA
                $datos = array(
                    "titulo" => $this->input->post('titulo'),
                    "cuerpo" => $this->input->post('cuerpo'),
                    "fecha" => date("Y-m-d")
                );
                $id_noticia = $this->noticias_model->AgregarNoticia($datos);
                // SUBIR FOTOS AL SERVIDOR
                $countfiles = count($_FILES['files']['name']);
                echo $countfiles;
                for ($i = 0; $i < $countfiles; $i++) {
                    if (!empty($_FILES['files']['name'][$i])) {
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['files']['size'][$i];
                        // Set preference
                        $config['upload_path'] = 'uploads/noticias';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = '0'; // max_size in kb
                        $config['file_name'] = $_FILES['files']['name'][$i];
                        //Load upload library
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('file')) {
                            //*** ocurrio un error

                            echo $this->upload->display_errors();
                        } else {
                            $data['uploadSuccess'] = $this->upload->data();
                            $array = array(
                                "nombre" => $data['uploadSuccess']['file_name'],
                                "ruta" => 'http://192.168.137.44/uploads/noticias/' . $data['uploadSuccess']['file_name'],
                                "id_noticia" => $id_noticia,
                                "descripcion" => "Imagen de Noticia"
                            );
                            if ($this->noticias_model->AgregarFoto($array)) {
                                $redireccionar = true;
                            } else {
                                $redireccionar = false;
                            }
                        }
                    }
                }
                if ($redireccionar) {
                    $this->session->set_flashdata('my_data', "NOTICIA AGREGADA EXITOSAMENTE");
                    redirect('noticias-admin', 'refresh');
                } else {
                    $this->session->set_flashdata('my_data', "ERRO AL AGREGAR LA NOTICIA");
                    redirect('noticias-admin', 'refresh');
                }
            }
        }
    }
    public function BorrarNoticia()
    {
        if ($this->ion_auth->logged_in()) {
            $id = $this->input->post('id');

            if ($this->noticias_model->EliminarNoticia($id)) {
                redirect('administrador/login', 'refresh');
            }
        }
    }
    public function VerNoticia($id)
    {
        $data['noticia'] = $this->noticias_model->EncontrarNoticia($id);
        $data['fotos'] = $this->noticias_model->ObtenerFotos($id);
        if ($this->ion_auth->logged_in() && !empty($data['noticia']) && !empty($data['fotos'])) {
            $this->load->view('administrador/ver-noticia-admin', $data);
        } else {
            redirect('administrador/noticias', 'refresh');
        }
    }
    public function VerNoticiaUsuario($id)
    {
        $data['noticia'] = $this->noticias_model->EncontrarNoticia($id);
        $data['fotos'] = $this->noticias_model->ObtenerFotos($id);
        $data['titulo'] = $data['noticia']['titulo'];
        if (!empty($data['noticia']) && !empty($data['fotos'])) {
            $this->load->view('pagina-web/header', $data);
            $this->load->view('administrador/noticia', $data);
            $this->load->view('pagina-web/footer', $data);
        } else {
            redirect('Vistas/prensa', 'refresh');
        }
    }
}
