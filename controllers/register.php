<?php
require_once("../public/complementos/conexion.php");


if(isset($_SESSION)) 
{include "../public/complementos/cabeceraUsuario.inc";
include "../public/complementos/posicionInvalida.inc";
include "../public/complementos/piePublico.inc";}
else
{
	if(isset($_POST["mail"]) && isset($_POST["password"]) &&
            isset($_POST["nomyap"]) && isset($_POST["dni"]) &&
            isset($_POST["direccion"]) && isset($_POST["telefono"]))
    {
        $sql="SELECT * FROM usuario WHERE mail = :mail";
		$sth = $conexionPDO->prepare($sql);
		$sth->bindValue(":mail",$_POST["mail"]);
		$sth->execute();
		$response = $sth->fetchAll(PDO::FETCH_ASSOC);
		if(!isset($response[0]))
        {
            $data["mail"] = $_POST["mail"];
            $data["password"] = $_POST["password"];
            $data["nomyap"] = $_POST["nomyap"];
            $data["tipoUsuario"] = 1;
            $data["dni"] = $_POST["dni"];
            $data["direccion"] = $_POST["direccion"];
            $data["telefono"] = $_POST["telefono"];
            $dt = new DateTime();
            $data["fechaRegistracion"] = $dt->format('Y-m-d');
            ksort($data);
            $fieldNames = implode('`, `', array_keys($data));
            $filedValues = ':' . implode(', :', array_keys($data));
            $sth = $conexionPDO->prepare("INSERT INTO usuario (`$fieldNames`) VALUES ($filedValues)");
            foreach ($data as $key => $value)
            {
                $sth->bindValue(":$key",$value);
            }
            $sth->execute();
            ?><script> alert("registro Exitoso");
            document.location = "../index.php";</script><?php
        }
        else
        {
            ?><script> alert("correo ya registrado, intente con otro");
            document.location = "../registrarse.php";</script><?php
        }
    }
    else
    {
            ?><script> alert("uno o mas datos son nulos");
            document.location = "../registrarse.php";</script><?php
    }
    
}
?>