<?php
	class Producto_model extends Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function buscar($data)
		{
			return $this->db->select("SELECT * FROM categoria WHERE nombre = :nombre",$data);
		}
	}
?>