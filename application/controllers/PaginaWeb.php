<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaginaWeb extends CI_Controller {
	function __construct()
	{
		// Construct the parent class
		parent::__construct();

		// Configure limits on our controller methods
		// Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
		$this->load->model('noticias_model', '', TRUE);
		$this->load->model('multimedia_model', '', TRUE);
		$this->load->model('biblioteca_model', '', TRUE);

	}

	public function index($page = 'inicio')
	{
		if(! file_exists(APPPATH.'views/pagina-web/'.$page.'.php')){
			show_404();
		}
			$data['titulo'] = ucfirst($page);
			 
			switch($page){
				case "inicio":
				$data['noticias'] = $this->noticias_model->ObtenerNoticiasConFotos();
				break;
				case "prensa":
				$data['noticias'] = $this->noticias_model->ObtenerNoticias();
				break;
				case "biblioteca":
				$data['colecciones'] = $this->biblioteca_model->ObtenerColecciones();
				break;
				case "multimedia":
				$data['multimedia'] = $this->multimedia_model->ObtenerAlbums();
				break;
			}
			
			$this->load->view('pagina-web/header', $data);
			$this->load->view('pagina-web/'.$page, $data);
			$this->load->view('pagina-web/footer', $data);

	}
	
}
