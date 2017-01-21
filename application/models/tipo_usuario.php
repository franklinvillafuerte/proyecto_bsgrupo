<?php
    require_once 'abstractclassbasicmodel.php';
    class tipo_usuario extends AbstractclassBasicModel
    {
        function obtener_tipo_usuario($id_usuario)
        {
            $this->db->select('id, usuarios_id, usuarios_tipos_id');
            $this->db->from('relacion_usuarios_tipos');
            $this->db->where('usuarios_id', $id_usuario);
            $query = $this->db->get();

            if($query->num_rows() > 0)
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