<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sibpdis extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->load->model('sibpdis_model', '', TRUE);
       
    }
    public function index()
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
			$data['user'] = $this->ion_auth->user()->row();
			$this->load->view('/administrador/sibpdis', $data);
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
	}
	public function BuscarpSibpdis()
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
			if ($this->sibpdis_model->BuscarRegistro($this->input->post('usuario'))) {
				$data['registros'] = $this->sibpdis_model->BuscarRegistro($this->input->post('usuario'));
			} else {
				$this->session->set_flashdata('my_data', "NO EXISTE");
				redirect('sibpdis-admin', 'refresh');
			}

			$data['user'] = $this->ion_auth->user()->row();
			$this->load->view('/administrador/sibpdis', $data);
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
	}
	public function VerRegistroSibpdis($nro_registro)
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
			if ($this->sibpdis_model->BuscarPorNroRegistro($nro_registro) != false) {
				$data['registro'] = $this->sibpdis_model->BuscarPorNroRegistro($nro_registro);
			} else {
				$this->session->set_flashdata('my_data', "NO EXISTE");
				redirect('sibpdis-admin', 'refresh');
			}
			//Verificar carnetizado
			if ($this->sibpdis_model->Carnetizado($nro_registro) != FALSE) {
				$datosConsulta = $this->sibpdis_model->Carnetizado($nro_registro);
				$data['carnetizado'] = $datosConsulta->carnetizado;
			} else {
				$data['carnetizado'] = "NO";
			}
			// Verificar educacion
			if ($this->sibpdis_model->Educacion($nro_registro) != FALSE) {
				$datosConsulta = $this->sibpdis_model->Educacion($nro_registro);
				$data['educacion'] = $datosConsulta->educacion;
				$data['telefono'] = $datosConsulta->telefono;
				$data['direccion'] = $datosConsulta->direccion;
			} else {
				$data['educacion'] = "NO";
			}
			//Verificar si lee y escribe
			if ($this->sibpdis_model->LeeEscribe($nro_registro) != FALSE) {
				$datosConsulta = $this->sibpdis_model->LeeEscribe($nro_registro);
				$data['leen_escriben'] = $datosConsulta->lee_escribe;
			} else {
				$data['leen_escriben'] = "NO";
			}
			//Verificar Rehabilitacion
			if ($this->sibpdis_model->Rehabilitacion($nro_registro) != FALSE) {
				$datosConsulta = $this->sibpdis_model->Rehabilitacion($nro_registro);
				$data['rehabilitacion'] = $datosConsulta->rehabilitacion;
				$data['telefono2'] = $datosConsulta->telefono;
			} else {
				$data['rehabilitacion'] = "NO";
			}
			//Verificar VAriables cruzadas
			if ($this->sibpdis_model->VariablesCruzadas($nro_registro) != FALSE) {
				$datosConsulta = $this->sibpdis_model->VariablesCruzadas($nro_registro);
				$data['edad'] = $datosConsulta->edad;
				$data['sexo'] = $datosConsulta->sexo;
				$data['estado_civil'] = $datosConsulta->estado_civil;
				$data['vive_con'] = $datosConsulta->vive_con;
				$data['seguro'] = $datosConsulta->seguro;
				$data['vivienda'] = $datosConsulta->vivienda;
				$data['oficio'] = $datosConsulta->oficio;
				$data['grado'] = $datosConsulta->grado;
			} else {
				$data['edad'] = " ";
				$data['sexo'] = " ";
				$data['estado_civil'] = " ";
				$data['vive_con'] = " ";
				$data['seguro'] = " ";
				$data['vivienda'] = " ";
				$data['oficio'] = " ";
				$data['grado'] = " ";
			}
			$data['user'] = $this->ion_auth->user()->row();
			$this->load->view('/administrador/VerRegistroSibpdis', $data);
		} else {
			$data['mostrar_alert'] = true;
			$data['mensaje'] = "Necesita iniciar sesión";
			$this->load->view('administrador/login', $data);
		}
	}
}