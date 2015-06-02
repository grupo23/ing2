<?php
	class User_model extends Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function signUp($data)
		{
			//return $this->db->insert('usuario',$data);
			return $this->db->insert('usuario',$data);
		}
		function signIn($data)
		{
			//return $this->db->select($fields,'usuario',$where);
			return $this->db->select("SELECT * FROM usuario WHERE mail = :mail",$data);
		}
		function update($data)
		{

           return $this->db->update('usuario', $data, "idUsuario = :idUsuario");
           print("El usuario ha sido modificado");
		}

		function getUser($id)
		{
			 $this->db->select("SELECT * FROM usuario WHERE id = :id", array("id"=>$id));
		}
	}
?>