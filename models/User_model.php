<?php

class User_model extends Model {

    function __construct() {
        parent::__construct();
    }

    function signUp($data) {
        //return $this->db->insert('usuario',$data);
        return $this->db->insert('usuario', $data);
    }

    function signIn($data) {
        //return $this->db->select($fields,'usuario',$where);
        return $this->db->select("SELECT * FROM usuario WHERE mail = :mail", $data);
    }
    
    function recoveryPass($data) {
        return $this->db->select("SELECT * FROM usuario WHERE mail = :mail", $data);
    }

    function updateImagen($imagen, $tipoimagen)
    {
        return $this->db->addcslashes("UPDATE usuario SET imagen = :imagen WHERE tipoimagen = :tipoimagen");
    }

    function update($data) {

        return $this->db->update('usuario', $data, "idUsuario = :idUsuario");
        ?><script> alert("El usuario ha sido modificado"); </script><?php
    }

    function delete($idUsuario) {
        return $this->db->delete('usuario', 'idUsuario = :idUsuario', 'idUsuario', $idUsuario);
    }

}

?>