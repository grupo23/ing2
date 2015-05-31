<?php
	class Categoria_model extends Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function agregar($data)
		{
			return $this->db->insert('categoria',$data);
		}
		function buscar($data)
		{
			return $this->db->select("SELECT * FROM categoria WHERE nombre = :nombre",$data);
		}
		function padres($data)
		{
			return $this->db->select("SELECT * FROM categoria WHERE idPadre = :idPadre",$data);
		}
		function actualizar($data)
		{
			return $this->db->update('categoria',$data,'idCategoria = :idCategoria');
		}
		function eliminar($data)
		{
			return $this->db->delete('categoria','idCategoria = :idCategoria','idCategoria',$data);
		}
	}
?>