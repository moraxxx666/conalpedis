<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biblioteca extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->load->model('biblioteca_model', '', TRUE);
    }
    public function index()
	{
		if ($this->ion_auth->logged_in()) {
			$data['colecciones'] = $this->biblioteca_model->ObtenerColecciones();
			$data['user'] = $this->ion_auth->user()->row();
			$this->load->view('/administrador/biblioteca-admin', $data);
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
    }
    public function AgregarColeccion()
	{
		if ($this->ion_auth->logged_in()) {
			if (empty($this->input->post('nombreColeccion')) || empty($this->input->post('descrColeccion'))) {
				$this->session->set_flashdata('my_data', "LLENE TODOS LOS CAMPOS");
				redirect('biblioteca-admin', 'refresh');
			} else {
				$nombre = $this->input->post('nombreColeccion');
				$descripcion = $this->input->post('descrColeccion');
				$obj = array(
					"nombre" => $nombre,
					"descripcion" => $descripcion
				);
				if ($this->biblioteca_model->AgregarColeccion($obj) != false) {
					$this->session->set_flashdata('my_data', "COLECCION AGREGADO EXITOSAMENTE");
					redirect('biblioteca-admin', 'refresh');
				} else {
					$this->session->set_flashdata('my_data', "ERROR AL AGREGAR LA COLECCION");
					redirect('biblioteca-admin', 'refresh');
				}
			}
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
	}
	public function AgregarLibro()
	{
		if ($this->ion_auth->logged_in()) {
			$redireccionar = false;
			$data = array();
			// Count total files
			//echo $this->input->post('titulo') . " " . $this->input->post('album');
			if (empty($_FILES['file']['name']) || empty($this->input->post('titulo')) || empty($this->input->post('autor')) || empty($this->input->post('fecha')) || empty($this->input->post('palabras'))) {
				// REDIRECCIONAR CON MENSAJE DE CORRECCION
				$this->session->set_flashdata('my_data', "LLENE TODOS LOS CAMPOS");
				redirect('biblioteca-admin', 'refresh');
			} else if (!empty($_FILES['file']['name']) && !empty($this->input->post('titulo'))  && !empty($this->input->post('autor')) && !empty($this->input->post('fecha')) && !empty($this->input->post('palabras'))) {

				// SUBIR FOTOS AL SERVIDOR

				//echo $countfiles;


				// Set preference
				$config['upload_path'] = 'uploads/biblioteca';
				$config['allowed_types'] = '*';
				$config['max_size'] = '0'; // max_size in kb
				$config['file_name'] = $_FILES['file']['name'];
				//Load upload library
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')) {
					//*** ocurrio un error

					echo $this->upload->display_errors();
				} else {
					$data['uploadSuccess'] = $this->upload->data();
					$array = array(
						"titulo" => $this->input->post('titulo'),
						"autor" => $this->input->post('autor'),
						"fecha" => $this->input->post('fecha'),
						"palabras_clave" => $this->input->post('palabras'),
						"ruta" => 'http://192.168.137.44/uploads/biblioteca/' . $data['uploadSuccess']['file_name'],
						"id_coleccion" => $this->input->post('coleccion'),

					);
					if ($this->biblioteca_model->AgregarLibro($array)) {
						$redireccionar = true;
					} else {
						$redireccionar = false;
					}
				}

				if ($redireccionar) {
					$this->session->set_flashdata('my_data', "LIBRO AGREGADA EXITOSAMENTE");
					redirect('biblioteca-admin', 'refresh');
				} else {
					$this->session->set_flashdata('my_data', "ERROR AL AGREGAR EL LIBRO");
					redirect('biblioteca-admin', 'refresh');
				}
			}
		}
	}
	public function BorrarColeccion()
	{
		$id = $this->input->post('id_coleccion');
		if ($this->ion_auth->logged_in()) {
			if (!empty($id)) {
				if ($this->biblioteca_model->EliminarColeccion($id)) {
					$this->session->set_flashdata('my_data', "COLECCION ELIMINADA");
					redirect('biblioteca-admin', 'refresh');
				}
			}
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
	}
	public function VerColeccion($id)
	{


		if ($this->ion_auth->logged_in() && $this->biblioteca_model->EncontrarColeccion($id) != false) {
			$data['libros'] = $this->biblioteca_model->ObtenerLibrosDeColeccion($id);
			$data['coleccion'] = $this->biblioteca_model->EncontrarColeccion($id);
			$data['user'] = $this->ion_auth->user()->row();
			$this->load->view('/administrador/ver-coleccion-admin', $data);
		} else {
			$this->session->set_flashdata('my_data', "NO EXISTE ESE ALBUM");
			redirect('biblioteca-admin', 'refresh');
		}
	}
	public function VerColeccionUsuario($id)
	{


		if ($this->biblioteca_model->EncontrarColeccion($id) != false) {
			$data['libros'] = $this->biblioteca_model->ObtenerLibrosDeColeccion($id);
			$data['coleccion'] = $this->biblioteca_model->EncontrarColeccion($id);
			$data['user'] = $this->ion_auth->user()->row();
			$data['titulo'] = $data['coleccion']['nombre'];
			$this->load->view('pagina-web/header', $data);
			$this->load->view('/administrador/ver-coleccion', $data);
			$this->load->view('pagina-web/footer', $data);
		} else {
			$this->session->set_flashdata('my_data', "NO EXISTE ESE ALBUM");
			redirect('Inicio', 'refresh');
		}
	}
}