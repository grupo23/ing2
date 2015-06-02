<?php
	class User extends Controller
	{
		function __construct()
		{
			parent:: __construct();
		}
	

		public function signUp()
		{
			//name, username, email, password
			if(isset($_POST["mail"]) && isset($_POST["password"]) && 
				isset($_POST["nomyap"]) && isset($_POST["dni"]) &&
				isset($_POST["direccion"]) && isset($_POST["telefono"]))
			{
				$data["mail"] = $_POST["mail"];
				$data["password"] = $_POST["password"];
				$data["nomyap"] = $_POST["nomyap"];
				$data["tipoUsuario"] = 1;
				$data["dni"] = $_POST["dni"];
				$data["direccion"] = $_POST["direccion"];
				$data["telefono"] = $_POST["telefono"];

				echo $this->model->signUp($data);
				?><script> alert("registro Exitoso"); document.location = "<?php echo URL; ?>";</script><?php
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
			/*?><script> document.location = "<?php echo URL; ?>";</script><?php*/
		}

		public function signIn()
		{
			
			if(isset($_POST["mail"]) && isset($_POST["password"]))
			{
				//$response = $this->model->signIn("*","username = '".$_POST["username"]."'");
				$response = $this->model->signIn( array(':mail'=>$_POST["mail"]) );
				if(isset($response[0]))
				{
					$response = $response[0];
					if($response["password"] == $_POST["password"])
					{
						$this->createSession($response["mail"],$response["idUsuario"],$response["tipoUsuario"]);
						?><script> document.location = "<?php echo URL; ?>";</script><?php
					}
					else
					{
						?><script> alert("correo o contraseña incorrecto"); document.location = "<?php echo URL; ?>";</script><?php
					}
				}
				else
				{
					?><script> alert("correo o contraseña incorrecto"); document.location = "<?php echo URL; ?>";</script><?php
				}
					/*?><script> document.location = "<?php echo URL; ?>";</script><?php*/
			}
			else
			{
				?><script> alert("uno o mas datos son nulos"); document.location = "<?php echo URL; ?>";</script><?php
			}
			
		}

		public function update()
		{

              if(isset($_POST["idUsuario"]) && isset($_POST["mail"]) && isset($_POST["password"]) && 
				isset($_POST["nomyap"]) && isset($_POST["dni"]) &&
		        isset($_POST["direccion"]) && isset($_POST["telefono"]))
                {
                	$data["idUsuario"] = $_POST["idUsuario"];
          	      $data["password"] = $_POST["password"];
			      $data["nomyap"] = $_POST["nomyap"];
			      $data["dni"] = $_POST["dni"];
			      $data["direccion"] = $_POST["direccion"];
			      $data["telefono"] = $_POST["telefono"]; 
			      $this->model->update($data);
			      ?><script> document.location = "<?php echo URL; ?>";</script><?php
			   }
		}

		function createSession($mail,$id,$tipo)
		{
			Session::setValue('MAIL',$mail);
			Session::setValue('ID', $id);
			Session::setValue('TIPO', $tipo);
		}
		function destroySession()
		{
			Session::destroy();
			header('location:'.URL);
		}
	}
?>