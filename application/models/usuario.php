<?php
  require_once 'abstractclassbasicmodel.php';
  
  Class usuario extends AbstractclassBasicModel
  {
    function login($usuario, $contrasena)
    {
      $this->db->select('id, email, password');
      $this->db->from('usuarios');
      $this->db->where('email', $usuario);
      $this->db->where('password', md5($contrasena));
      $this->db->limit(1);
      $query = $this->db->get();
 
      if($query -> num_rows() == 1)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }
  }
?>