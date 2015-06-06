<?php
class User extends Controller
{
    function __construct()
    {
        parent:: __construct();
    }

    public function signUp()
    {
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
            ?><script> alert("registro Exitoso");
            document.location = "<?php echo URL; ?>";</script><?php
        }
        else
        {
            ?><script> alert("uno o mas datos son nulos");
            document.location = "<?php echo URL; ?>";</script><?php
        }
    }

    public function signIn()
    {
        if(isset($_POST["mail"]) && isset($_POST["password"]))
        {
            $response = $this->model->signIn( array(':mail' => $_POST["mail"]) );
            if(isset($response[0]))
            {
                $response = $response[0];
                if($response["password"] == $_POST["password"])
                {
                    $this->createSession($response);
                    ?><script> document.location = "<?php echo URL; ?>";</script><?php
                }
                else
                {
                    ?><script> alert("correo o contraseña incorrecto");
                    document.location = "<?php echo URL; ?>";</script><?php
                }
            }
            else
            {
                ?><script> alert("correo o contraseña incorrecto");
                document.location = "<?php echo URL; ?>";</script><?php
            
            }
          }
        else
        {
            ?><script> alert("uno o mas datos son nulos");
            document.location = "<?php echo URL; ?>";</script><?php
        }
        
    }   
    
    public function recoveryPass() {
        if (isset($_POST["mail"])) {
            $response = $this->model->recoveryPass(array(':mail' => $_POST["mail"]));
            if (isset($response[0])) {
                ?><script src="js/gdAlert.js" type="text/javascript">; alert("Se ha enviado la clave a tu correo electronico!");
            document.location = "<?php echo URL; ?>";</script><?php
            }
            else {
            ?><script> alert("No se encuentra registrado ".$_POST["mail"]);
            document.location = "<?php echo URL; ?>";</script><?php
            }
        }
    }
    function validar($mail) {
     ?><script> var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test($mail); </script><?php
     }

    
    public function update()
    {

        if(isset($_POST["idUsuario"]) && isset($_POST["mail"]) && isset($_POST["password"]) &&
            isset($_POST["nomyap"]) && isset($_POST["dni"]) &&
            isset($_POST["direccion"]) && isset($_POST["telefono"]))
            {
            $data["mail"] = $_POST["mail"];
             if(validar($_POST["mail"]))
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
    }
    

    public function delete()
    {
        print($_POST["idUsuario"]);

        if(isset($_POST["idUsuario"])){
            $response = $this->model->delete($_POST["idUsuario"] );
            $this->destroySession();
            ?><script> document.location = "<?php echo URL; ?>";</script><?php
        }
    }

    function createSession($data)
    {
        Session::setValue('ID', $data["idUsuario"]);
        Session::setValue('MAIL', $data["mail"]);
        Session::setValue('PASS', $data["password"]);
        Session::setValue('NOMBRE', $data["nomyap"]);
        Session::setValue('DNI', $data["dni"]);
        Session::setValue('TIPO', $data["tipoUsuario"]);
        Session::setValue('DIR', $data["direccion"]);
        Session::setValue('TEL', $data["telefono"]);
        Session::setValue('IMAG', $data["imagen"]);
        Session::setValue('TIMAG', $data["tipoimagen"]);
    }
    
    function destroySession()
    {
        Session::destroy();
        header('location:'.URL);
    }
}
?>