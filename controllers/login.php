<?php
require_once("../public/complementos/conexion.php");


if(isset($_SESSION)) 
{include "../public/complementos/cabeceraUsuario.inc";
include "../public/complementos/posicionInvalida.inc";
include "../public/complementos/piePublico.inc";}
else
{
	if(isset($_POST["mail"]) && isset($_POST["password"]))
    {
        $sql="SELECT * FROM usuario WHERE mail = :mail";
		$sth = $conexionPDO->prepare($sql);
		$sth->bindValue(":mail",$_POST["mail"]);
		$sth->execute();
		$response = $sth->fetchAll(PDO::FETCH_ASSOC);
		if(isset($response[0]))
        {
            $response = $response[0];
            if($response["password"] == $_POST["password"])
            {
                session_start();
                $_SESSION['ID'] = $response["idUsuario"];
                $_SESSION['MAIL'] = $response["mail"];
                $_SESSION['TIPO'] = $response["tipoUsuario"];
                $_SESSION['NOMBRE'] = $response["nomyap"];
                ?><script>document.location = "../index.php";</script><?php
            }
            else
            {
                ?><script> alert("correo o contraseña incorrecto");
                document.location = "../conectarse.php";</script><?php
            }
        }
        else
        {
            ?><script> alert("correo o contraseña incorrecto");
            document.location = "../conectarse.php";</script><?php
            
        }
    }
    else
    {
        ?><script> alert("uno o mas datos son nulos");
        document.location = "../conectarse.php";</script><?php
    }
}
?>