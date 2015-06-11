<?php
	class Producto extends Controller
	{
		function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar()
		{
			
			if(isset($_POST["cadena"]))
			{
				echo $response = $this->model->buscar( array(':nombre'=>$_POST["nombre"]) );
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
			
		}
		
	}
?>