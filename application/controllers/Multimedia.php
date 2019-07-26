<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Multimedia extends CI_Controller
{
	function __construct()
	{
		// Construct the parent class
		parent::__construct();

		// Configure limits on our controller methods
		// Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
		$this->load->model('multimedia_model', '', TRUE);
	}

	public function index()
	{
		if ($this->ion_auth->logged_in()) {
			$data['albums'] = $this->multimedia_model->ObtenerAlbums();
			$data['user'] = $this->ion_auth->user()->row();
			$this->load->view('/administrador/multimedia-admin', $data);
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
	}
	public function AgregarAlbum()
	{
		if ($this->ion_auth->logged_in()) {
			if (empty($this->input->post('nombreAlbum')) || empty($this->input->post('descrAlbum'))) {
				$this->session->set_flashdata('my_data', "LLENE TODOS LOS CAMPOS");
				redirect('multimedia-admin', 'refresh');
			} else {
				$nombre = $this->input->post('nombreAlbum');
				$descripcion = $this->input->post('descrAlbum');
				$obj = array(
					"nombre" => $nombre,
					"descripcion" => $descripcion
				);
				if ($this->multimedia_model->AgregarAlbum($obj) != 0) {
					$this->session->set_flashdata('my_data', "ALBUM AGREGADO EXITOSAMENTE");
					redirect('multimedia-admin', 'refresh');
				} else {
					$this->session->set_flashdata('my_data', "ERROR AL AGREGAR EL ALBUM");
					redirect('multimedia-admin', 'refresh');
				}
			}
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
	}
	public function AgregarMultimedia()
	{
		if ($this->ion_auth->logged_in()) {
			$redireccionar = false;
			$data = array();
			// Count total files
			//echo $this->input->post('titulo') . " " . $this->input->post('album');
			if (empty($_FILES['files']['name'][0]) || empty($this->input->post('titulo')) || empty($this->input->post('album'))) {
				// REDIRECCIONAR CON MENSAJE DE CORRECCION
				$this->session->set_flashdata('my_data', "LLENE TODOS LOS CAMPOS");
				redirect('multimedia-admin', 'refresh');
			} else if (!empty($_FILES['files']['name'][0]) && !empty($this->input->post('titulo')) && !empty($this->input->post('album'))) {

				// SUBIR FOTOS AL SERVIDOR
				$countfiles = count($_FILES['files']['name']);
				//echo $countfiles;
				for ($i = 0; $i < $countfiles; $i++) {
					if (!empty($_FILES['files']['name'][$i])) {
						// Define new $_FILES array - $_FILES['file']
						$_FILES['file']['name'] = $_FILES['files']['name'][$i];
						$_FILES['file']['type'] = $_FILES['files']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['files']['error'][$i];
						$_FILES['file']['size'] = $_FILES['files']['size'][$i];
						// Set preference
						$config['upload_path'] = 'uploads/multimedia';
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
								"titulo" => $this->input->post('titulo'),
								"ruta" => 'http://192.168.137.44/uploads/multimedia/' . $data['uploadSuccess']['file_name'],
								"id_album" => $this->input->post('album'),
								"fecha" =>  date("Y-m-d")
							);
							if ($this->multimedia_model->AgregarImagenesMultimedia($array)) {
								$redireccionar = true;
							} else {
								$redireccionar = false;
							}
						}
					}
				}
				if ($redireccionar) {
					$this->session->set_flashdata('my_data', "MULTIMEDIA AGREGADA EXITOSAMENTE");
					redirect('multimedia-admin', 'refresh');
				} else {
					$this->session->set_flashdata('my_data', "ERROR AL AGREGAR LA NOTICIA");
					redirect('multimedia-admin', 'refresh');
				}
			}
		}
	}
	public function BorrarMultimedia()
	{
		$id = $this->input->post('id_album');
		if ($this->ion_auth->logged_in()) {
			if (!empty($id)) {
				if ($this->multimedia_model->EliminarAlbum($id)) {
					$this->session->set_flashdata('my_data', "ALBUM ELIMINADO");
					redirect('multimedia-admin', 'refresh');
				}
			}
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
	}
	public function VerAlbum($id)
	{

		if ($this->ion_auth->logged_in()) {
			if ($this->multimedia_model->EncontrarAlbum($id) != false) {
				$data['fotos'] = $this->multimedia_model->ObtenerFotosdeAlbum($id);
				$data['album'] = $this->multimedia_model->EncontrarAlbum($id);
				$data['user'] = $this->ion_auth->user()->row();
				$this->load->view('/administrador/ver-album-admin', $data);
			} else {
				$this->session->set_flashdata('my_data', "NO EXISTE ESE ALBUM");
				redirect('multimedia-admin', 'refresh');
			}
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
	}
	public function VerAlbumUsuario($id)
	{


		if ($this->multimedia_model->EncontrarAlbum($id) != false) {
			$data['fotos'] = $this->multimedia_model->ObtenerFotosdeAlbum($id);
			$data['album'] = $this->multimedia_model->EncontrarAlbum($id);
			$data['user'] = $this->ion_auth->user()->row();
			$data['titulo'] = $data['album']['nombre'];
			$this->load->view('pagina-web/header', $data);
			$this->load->view('/administrador/ver-album', $data);
			$this->load->view('pagina-web/footer', $data);
		} else {
			$this->session->set_flashdata('my_data', "NO EXISTE ESE ALBUM");
			redirect('multimedia-admin', 'refresh');
		}
	}
}
