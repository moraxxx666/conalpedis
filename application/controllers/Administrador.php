<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrador extends CI_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->load->model('administrador_model', '', TRUE);
       
    }

    public function index()
    {

        $data['mostrar_alert'] = false;
        $this->load->view('administrador/login', $data);
    }
    public function login()
    {
        if ($this->ion_auth->login($this->input->post('usuario'), $this->input->post('contrasena'), false)) {
            //if the login is successful
            //redirect them back to the home page
            redirect('noticias-admin', 'refresh');
        } else {
            // if the login was un-successful
            // redirect them back to the login page
            $data['mostrar_alert'] = true;
            $data['mensaje'] = $this->ion_auth->errors();
            $this->load->view('administrador/login', $data);
            // use redirects instead of loading views for compatibility with MY_Controller libraries

        }
    }
    public function logout()
    {
        $this->ion_auth->logout();
        $this->load->view('administrador/login');
    } 

    public function VerONG($id)
	{
		$this->load->view('administrador/ver-ong');
	}
}
