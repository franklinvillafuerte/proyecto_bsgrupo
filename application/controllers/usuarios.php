<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'AbstractController.php';
class usuarios extends AbstractController 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('autorizar/index');
	}

	public function registrar_usuario()
	{		
		if ($this->is_post())
		{
			$this->usuario->poblar_propiedades($this->arregloPost);
			$this->usuario->insert();
			redirect('autorizar/index');
		}
		$datos = $this->formulario_usuarios();
		$datos['titulo']='Registrar Usuario';
		$this->load->view('usuarios/registrar_usuario',$datos);
	}

	//registro de nuevos usuarios	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */





