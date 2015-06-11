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
				?><script> document.location = "<?php echo URL; ?>";</script><?php
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
			
		}
		public function botonEliminarCategoria()
		{
			
			if(isset($_POST["idCategoria"]))
			{
				
				$respuesta = $this->model->buscarid( array(':idCategoria'=>$_POST["idCategoria"]) );
				if(isset($respuesta["idCategoria"]))
				{
					
						?><script> alert("Contiene SubCategorias, no se puede eliminar"); document.location = "<?php echo URL; ?>";</script><?php
				}
				else
				{
					$response = $this->model->eliminar( $_POST["idCategoria"] );
					?><script> document.location = "<?php echo URL; ?>";</script><?php
				}
				
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
		}
		public function botonModificarCategoria()
		{
				
              if(isset($_POST["idCategoria"]) && isset($_POST["idPadre"]) && isset($_POST["nombreCategoria"]))
                {
                	$respuesta = $this->model->buscar( array(':nombre'=>$_POST["nombreCategoria"]) );
					if(!isset($respuesta["idCategoria"]))
						{
					$data["idCategoria"] = $_POST["idCategoria"];
          	      	$data["idPadre"] = $_POST["idPadre"];
			      	$data["nombre"] = $_POST["nombreCategoria"];
			      	$this->model->actualizar($data);
			      	?><script> document.location = "<?php echo URL; ?>";</script><?php
						}
                	else
                	{
                	?><script> alert("el nombre ya esta en uso"); document.location = "<?php echo URL; ?>";</script><?php
                	}
                  
			   }
		}
		public function botonEliminarCategoriahija()
		{
			
			if(isset($_POST["idCategoria"]))
			{
				
				/*$respuesta = $this->model->buscarid( array(':idCategoria'=>$_POST["idCategoria"]) );     
				if(isset($respuesta[0]))   // plantear cuando aya productos asociados
				{
					
						?><script> alert("Contiene SubCategorias, no se puede eliminar"); document.location = "<?php echo URL; ?>";</script><?php
				}
				else
				{*/
					$response = $this->model->eliminar( $_POST["idCategoria"] );
					?><script> document.location = "<?php echo URL; ?>";</script><?php
				/*}*/
				
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
			
		}
		public function botonAgregarCategoria()
		{

			if(isset($_POST["nombreCategoria"]))
			{
				$data["idPadre"] = 0;
				$data["nombre"] = $_POST["nombreCategoria"];

				echo $this->model->agregar($data);
				?><script> document.location = "<?php echo URL; ?>";</script><?php
				/*?><script> alert("registro Exitoso"); document.location = "<?php echo URL; ?>";</script><?php*/
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
		}
		public function botonAgregarSubCategoria()
		{
			
			if(isset($_POST["nombreCategoria"]) && isset($_POST["idPadrecategoria"]))
			{
				$data["idPadre"] = $_POST["idPadrecategoria"];
				$data["nombre"] = $_POST["nombreCategoria"];

				echo $this->model->agregar($data);
				?><script> document.location = "<?php echo URL; ?>";</script><?php
				/*?><script> alert("registro Exitoso"); document.location = "<?php echo URL; ?>";</script><?php*/
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
		}
	}
?>