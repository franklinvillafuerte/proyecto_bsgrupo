<?php

require_once "abstractclassbasicmodel.php";

Class usuario extends AbstractclassBasicModel
{
    const DB_TABLE = 'usuarios';
    const DB_TABLE_PK = 'id';

    public $id;
    public $email;
    public $password;
    public $cumpleanios;
    public $nombre;
    public $apellidos;
    public $telefono;
    public $fotografia;
    public $creado_en;

    public function poblar_propiedades(array $datos)
    {
        $this->id = isset($datos['id']) ? trim($datos['id']) : null;
        $this->email = isset($datos['email']) ? trim($datos['email']) : null;
        $this->password = isset($datos['password']) ? md5(trim($datos['password'])) : null;
        $this->cumpleanios = isset($datos['cumpleanos']) ? trim($datos['cumpleanos']) : null;
        $this->nombre = isset($datos['nombre']) ? trim($datos['nombre']) : null;
        $this->apellidos = isset($datos['apellidos']) ? trim($datos['apellidos']) : null;
        $this->telefono = isset($datos['telefono']) ? trim($datos['telefono']) : null;
        $this->fotografia = isset($datos['fotografia']) ? trim($datos['fotografia']) : null;
        $this->creado_en = isset($datos['creado_en']) ? trim($datos['creado_en']) : null;
    }    

    function login($username, $password)
    {
        $this -> db -> select('id, email, password');
        $this -> db -> from('usuarios');
        $this -> db -> where('email', $username);
        $this -> db -> where('password', MD5($password));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    function save($username, $password)
    {
        $data = array(
            'email' => $username,
            'password' => MD5($password),
        );
        $this->db->set($data);
        $this->db->insert('usuarios');
        $this->db->insert_id();
    }

}
?>