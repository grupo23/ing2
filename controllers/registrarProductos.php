<?php
require_once("../public/complementos/conexion.php");
if(isset($_SESSION)) 
{include "../public/complementos/cabeceraUsuario.inc";
include "../public/complementos/posicionInvalida.inc";
include "../public/complementos/piePublico.inc";}
else
{

    if(isset($_POST["idProducto"]) && isset($_POST["idCategoria"]) && isset($_POST["nombre"]) && 
      isset($_POST["descripcion"]) && isset($_POST["cantidad"]) && isset($_POST["fechafin"]))
    {
        if($_POST["idCategoria"] > 0)
        {
         session_start();
         $data["idUsuario"] = $_SESSION['ID'];
         $data["idCategoria"] = $_POST["idCategoria"];
         $data["nombre"] = $_POST["nombre"];
         $data["descripcion"] = $_POST["descripcion"];
         $data["estado"] = "en subasta";
         $data["cantidad"] = $_POST["cantidad"];
         $dt = new DateTime();
         
         $data["fechaIni"] = $dt->format('Y-m-d');
         $fin=$_POST["fechafin"];
         $dt->modify("+$fin day");
         $data["fechaFin"] = $dt->format('Y-m-d');

        if (isset($_FILES['imagenProd'])) {
            $nombre = $_FILES['imagenProd']['name'];
            $tipo = $_FILES['imagenProd']['type'];
            $tmp = $_FILES['imagenProd']['tmp_name'];
            $folder = 'C:\xampp\htdocs\ingenieria-2\pictures\productos';
            move_uploaded_file($tmp, $folder . '/' . $nombre);

            $data["imagen"] = $_FILES['imagenProd']['name'];
            $data["tipoImagen"] = $_FILES['imagenProd']['type'];
        } else {
            $data["imagen"] = "";
            $data["tipoImagen"] = "";
        }
            ksort($data);
            $fieldNames = implode('`, `', array_keys($data));
            $filedValues = ':' . implode(', :', array_keys($data));
            $sth = $conexionPDO->prepare("INSERT INTO producto (`$fieldNames`) VALUES ($filedValues)");
            foreach ($data as $key => $value)
            {
                $sth->bindValue(":$key",$value);
            }
            $sth->execute(); 
            ?><script> alert("Registro Exitoso");
            document.location = "../index.php";</script><?php 
        }
        else
        {
            ?><script> alert("tiene que elegir una categoria");
            document.location = "../registrarProductos.php";</script><?php
        } 
    }
    else
    {
            ?><script> alert("uno o mas datos son nulos");
            document.location = "../index.php";</script><?php
    }
}
    
?>