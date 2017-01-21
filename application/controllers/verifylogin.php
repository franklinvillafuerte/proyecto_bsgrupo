<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require_once 'AbstractController.php';

    class VerifyLogin extends AbstractController 
    {
     
      function __construct()
      {
        parent::__construct();
        $this->load->model('usuario','',TRUE);
      }
     
      function index()
      {
        //This method will have the credentials validation
        $this->load->library('form_validation');     
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');     
        if($this->form_validation->run() == FALSE)
        {
          //Field validation failed.  User redirected to login page
          $this->load->view('autorizar/index');
        }
        else
        {
          //obtenemos los datos
          $usuario = $this->input->post('inputEmail');
          $contrasena = $this->input->post('inputPassword');
          $respuesta = $this->usuario->login($usuario,$contrasena);
          //obtenemos los datos del login
          if ($respuesta)
          {
            //existe el usuario en la base de datos
            //determinamos si es el usuario administrador o si es un usuario comun
            $id_usuario = 0;
            foreach ($respuesta as $row) 
            {
              $id_usuario = $row->id;
            }
            //determinamos que tipo de usuario es

            $rs_tipo_usuario = $this->tipo_usuario->obtener_tipo_usuario_($id_usuario);            
            if ($rs_tipo_usuario)
            {
              $tipo_de_usuario = 0;
              foreach ($rs_tipo_usuario as $row)
              {
                $tipo_de_usuario = $row->usuarios_tipos_id;
              }
              if ($tipo_de_usuario == 0)
              {
                //es usuario administrador
                $this->load->view('bienvenido/bienvenido_administrador');
              } 
              else
              {
                $this->load->view('bienvenido/bienvenido_usuario');
              }
            }
          }
          //Go to private area
          //redirect('home', 'refresh');
        }
        else
        {
          $this->load->view('no_existe_usuario');
        }
     
      }
     
      function check_database($password)
      {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
     
        //query the database
        $result = $this->user->login($username, $password);
     
        if($result)
        {
          $sess_array = array();
          foreach($result as $row)
          {
            $sess_array = array
            (
              'id' => $row->id,
              'username' => $row->username
            );
            $this->session->set_userdata('logged_in', $sess_array);
          }
          return TRUE;
        }
        else
        {
          $this->form_validation->set_message('check_database', 'Invalid username or password');
          return false;
        }
      }
    }
?>