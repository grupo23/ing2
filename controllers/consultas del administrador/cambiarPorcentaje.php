<?php 
  if(isset($_POST["porcentaje"])){
     require_once("../../public/complementos/conexion.php");
  	  $nuevoValor=$_POST["porcentaje"];
      $sth = $conexionPDO->prepare("UPDATE porcentaje  SET valor=$nuevoValor");
       $sth->execute();

       ?><script type="text/javascript">document.location="../../admin/cambiodeporcentaje.php";/*history.back(-1);*/</script><?php
       

  }
  else{
  	  ?><script type="text/javascript">alert("el dato es invalido");history.back(-1)</script><?php
  }
  ?>  
