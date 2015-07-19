<?php
require_once("../public/complementos/conexion.php");



	if(isset($_POST["precio"]) && isset($_POST["razon"]))
    {
        $sql="SELECT * FROM oferta WHERE idUsuario = :idUsuario AND idProducto = :idProducto";
        $sth = $conexionPDO->prepare($sql);
        session_start();
        $sth->bindValue(":idUsuario",$_SESSION["ID"]);
        $sth->bindValue(":idProducto",$_POST["idProducto"]);
        $sth->execute();
        $ofer = $sth->fetchAll(PDO::FETCH_ASSOC);
        if(!isset($ofer[0]))
        {
            $sql="SELECT * FROM producto WHERE idUsuario = :idUsuario AND idProducto = :idProducto";
        $sth = $conexionPDO->prepare($sql);
        $sth->bindValue(":idUsuario",$_SESSION["ID"]);
        $sth->bindValue(":idProducto",$_POST["idProducto"]);
        $sth->execute();
        $mio = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(!isset($mio[0]))
            {
            $data["idUsuario"] = $_SESSION['ID'];
            $data["idProducto"] = $_POST["idProducto"];
            $data["precio"] = $_POST["precio"];
            $data["razon"] = $_POST["razon"];
            $data["notificacionOferta"] = 1;
            $data["estado"] = "en espera";
        
            ksort($data);
            $fieldNames = implode('`, `', array_keys($data));
            $filedValues = ':' . implode(', :', array_keys($data));
            $sth = $conexionPDO->prepare("INSERT INTO oferta (`$fieldNames`) VALUES ($filedValues)");
            foreach ($data as $key => $value)
            {
                $sth->bindValue(":$key",$value);
            }
            $sth->execute();
            ?><script>alert("oferta exitosa!!");
            document.location = "../index.php";</script><?php
            }
            else
            {
            ?><script> alert("no puede postularse a su propio producto");
            document.location = "../index.php";</script><?php
            
            }
        }
        else
        {
            ?><script> alert("Usted ya ha realizado una oferta por este producto");
            document.location = "../index.php";</script><?php
            
        }
    }
    else
    {
        ?><script> alert("uno o mas datos son nulos");
        document.location = "../index.php";</script><?php
    }

?>