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
		function filtrar_por_nombre_y_descripcion($unString){
			$aux="SELECT * FROM producto WHERE nombre  LIKE ? OR descripcion LIKE ?";
			$parametros=array( "%$unString%", "%$unString%");

			//$aux=addslashes($aux);
			//echo $aux;

			return $this->db->seleccionar($aux,$parametros);
		}
	}
?>