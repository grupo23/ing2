<?php
	class Categoria extends Controller
	{
		function __construct()
		{
			parent:: __construct();
		}
		public function agregar()
		{

			if(isset($_POST["idPadre"]) && isset($_POST["nombre"]))
			{
				$data["idPadre"] = $_POST["idPadre"];
				$data["nombre"] = $_POST["nombre"];

				echo $this->model->agregar($data);
				/*?><script> alert("registro Exitoso"); document.location = "<?php echo URL; ?>";</script><?php*/
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
		}
		public function buscar()
		{
			
			if(isset($_POST["nombre"]))
			{
				echo $response = $this->model->buscar( array(':nombre'=>$_POST["nombre"]) );
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
			
		}
		public function padres()
		{
			echo $response = $this->model->padres( array(':idPadre'=>0));
		}
		public function actualizar()
		{

			if(isset($_POST["idCategoria"]) && isset($_POST["idPadre"]) && isset($_POST["nombre"]))
			{
				$data["idCategoria"] = $_POST["idCategoria"];
				$data["idPadre"] = $_POST["idPadre"];
				$data["nombre"] = $_POST["nombre"];

				echo $this->model->actualizar($data);
				/*?><script> alert("registro Exitoso"); document.location = "<?php echo URL; ?>";</script><?php*/
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
		}
		public function eliminar()
		{
			
			if(isset($_POST["idCategoria"]))
			{
				echo $response = $this->model->eliminar( $_POST["idCategoria"] );
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
			
		}
	}
?>