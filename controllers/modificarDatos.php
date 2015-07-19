<?php
require_once("../public/complementos/conexion.php");
if(isset($_SESSION)) 
{
    include "../public/complementos/cabeceraUsuario.inc";
    include "../public/complementos/posicionInvalida.inc";
    include "../public/complementos/piePublico.inc";
}
else
{

	if(isset($_POST["mail"]) && isset($_POST["password"]) &&
            isset($_POST["nomyap"]) && isset($_POST["dni"]) &&
            isset($_POST["direccion"]) && isset($_POST["telefono"]))
    {
        session_start();
        $idu=$_SESSION['ID'];
        $sql="SELECT * FROM usuario WHERE idUsuario = :idUsuario";
		$sth = $conexionPDO->prepare($sql);
		$sth->bindValue(":idUsuario",$idu);
		$sth->execute();
		$response = $sth->fetchAll(PDO::FETCH_ASSOC);
		if(isset($response[0]))
        {
            $response=$response[0];
            $sql = "SELECT * FROM usuario WHERE mail = :mail";
            $sth = $conexionPDO->prepare($sql);
            $sth->bindValue(":mail", $_POST["mail"]);
            $sth->execute();
            $respuesta = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(isset($respuesta[0]))
            {
                if($respuesta[0]["mail"]==$response["mail"])
                {
                    $data["idUsuario"] = $_SESSION['ID'];
                    $data["mail"] = $_POST["mail"];
                    $data["password"] = $_POST["password"];
                    $data["nomyap"] = $_POST["nomyap"];
                    $data["dni"] = $_POST["dni"];
                    $data["direccion"] = $_POST["direccion"];
                    $data["telefono"] = $_POST["telefono"];
                    if (isset($_FILES['imagen'])) 
                    {
                        $nombre = $_FILES['imagen']['name'];
                        $tipo = $_FILES['imagen']['type'];
                        $tmp = $_FILES['imagen']['tmp_name'];
                        $folder = 'C:\xampp\htdocs\ingenieria-2\pictures\Users';
                        move_uploaded_file($tmp, $folder . '/' . $nombre);

                        $data["imagen"] = $_FILES['imagen']['name'];
                        $data["tipoImagen"] = $_FILES['imagen']['type'];
                    } 
                ksort($data);
                $fieldDetails = NULL;
                foreach ($data as $key => $values)
                {
                    $fieldDetails .= "$key=:$key,";
                }
                $fieldDetails = rtrim($fieldDetails, ',');
                $sth = $conexionPDO->prepare("UPDATE usuario SET $fieldDetails WHERE idUsuario = :idUsuario");
                foreach($data as $key => $value)
                {
                    $sth->bindValue(":$key", $value);
                }
                $sth->execute(); 
                ?><script> alert("se realisaron los cambios con exito");
                document.location = "../modificardatos.php";</script><?php
                }
                else
                {
                    ?><script> alert("el correo ya esta en uso");
                    document.location = "../modificardatos.php";</script><?php
                }
            
            }
            else
            {
                    $data["idUsuario"] = $_SESSION['ID'];
                    $data["mail"] = $_POST["mail"];
                    $data["password"] = $_POST["password"];
                    $data["nomyap"] = $_POST["nomyap"];
                    $data["dni"] = $_POST["dni"];
                    $data["direccion"] = $_POST["direccion"];
                    $data["telefono"] = $_POST["telefono"];
                    if (isset($_FILES['imagen'])) 
                    {
                        $nombre = $_FILES['imagen']['name'];
                        $tipo = $_FILES['imagen']['type'];
                        $tmp = $_FILES['imagen']['tmp_name'];
                        $folder = 'C:\xampp\htdocs\ingenieria-2\pictures\Users';
                        move_uploaded_file($tmp, $folder . '/' . $nombre);

                        $data["imagen"] = $_FILES['imagen']['name'];
                        $data["tipoImagen"] = $_FILES['imagen']['type'];
                    } 
                ksort($data);
                $fieldDetails = NULL;
                foreach ($data as $key => $values)
                {
                    $fieldDetails .= "$key=:$key,";
                }
                $fieldDetails = rtrim($fieldDetails, ',');
                $sth = $conexionPDO->prepare("UPDATE usuario SET $fieldDetails WHERE idUsuario = :idUsuario");
                foreach($data as $key => $value)
                {
                    $sth->bindValue(":$key", $value);
                }
                $sth->execute(); 
                ?><script> alert("se realisaron los cambios con exito");
                document.location = "../modificardatos.php";</script><?php
            }
          }
          else
         {
            ?><script> alert("no se encontro el usuario");
            document.location = "../modificardatos.php";</script><?php
         } 
         
        }
        else
        {
            ?><script> alert("uno o mas datos son nulos");
            document.location = "../modificarDatos.php";</script><?php
        }
}

?>