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

  if(isset($_GET["idOferta"])&&(isset($_GET["idConsulta"]))&&(isset($_GET["respuesta"])))
    {
        $ofert = $_GET["idOferta"];
        $consult = $_GET["idConsulta"];
        $sth = $conexionPDO->prepare("SELECT respuesta FROM consultaproducto WHERE idConsulta = '$consult' ");
        $sth->execute();
        $ofer = $sth->fetchAll(PDO::FETCH_ASSOC);
        if(empty($ofer[0]["respuesta"]))
        {
           $data["idOferta"] = $ofert;
           $data["idConsulta"] = $consult;
           $data["notificacionPregunta"] = 0;
           $data["respuesta"] = $_GET["respuesta"];
           $data["notificacionRespuesta"] = 1;  
        
            ksort($data);
            $fieldDetails = NULL;

            foreach ($data as $key => $values)
             {
                 $fieldDetails .= "$key=:$key,";
             }
            $fieldDetails = rtrim($fieldDetails, ',');
            $sth = $conexionPDO->prepare("UPDATE consultaproducto SET $fieldDetails WHERE idConsulta = :idConsulta");
            foreach($data as $key => $value)
             {
               $sth->bindValue(":$key", $value);
             }
            $sth->execute(); 
                 ?><script>alert("respuesta realizada!!");
                 document.location = "../verMisProductosOfertados.php";</script><?php
              }
        else
        {
            ?><script> alert("Usted ya ha contestado esta pregunta");
            document.location = "../verMisProductosOfertados.php";</script><?php
            
        }
      }
  }

?>