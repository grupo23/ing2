<?php 
    
        $sql="SELECT * FROM usuario WHERE idUsuario = :idUsuario";
        $sth = $conexionPDO->prepare($sql);
        $sth->bindValue(":idUsuario",$_SESSION['ID']);
        $sth->execute();
        $response = $sth->fetchAll(PDO::FETCH_ASSOC);
        $response=$response[0];

?>
  <div class="formWrapper" >
                <form id="formulariomodificar" name="formulariomodificar" action="controllers/modificarDatos.php" enctype="multipart/form-data" method="post">
                    <div class="formTitle">Actualizar</div>
                    <input class="recuadro" name="idUsuario" type="hidden" value="<?php echo $response["idUsuario"]; ?>" required/>
                    <input class="recuadro" name="mail" type="email" value="<?php echo $response["mail"]; ?>" placeholder="correo electronico" required/>
                    <input class="recuadro" name="password" type="password" value="<?php echo $response["password"]; ?>" placeholder="Password" required/>
                    <input class="recuadro" name="nomyap" type="text" value="<?php echo $response["nomyap"]; ?>" placeholder="nombre y apellido" required/>
                    <input class="recuadro" name="dni" type="text" pattern="[0-9]*" value="<?php echo $response["dni"]; ?>" placeholder="Dni" required/>
                    <input class="recuadro" name="direccion" type="text" value="<?php echo $response["direccion"]; ?>" placeholder="Direccion" required/>
                    <input class="recuadro" name="telefono" type="text" pattern="[0-9]*" value="<?php echo $response["telefono"]; ?>" placeholder="Telefono" required/>
                    <span>Selecionar una imagen de perfil</span>
                    <input class="recuadro" name="imagen" type="file" />
                    <input id="myDataButton" name="myDataButton" type="submit" value="actualizar" required/>
                    
                    </form> 
                    <a href="javascript:void(0)" title="Eliminar" onClick="eliminarUsuario('<?php echo $_SESSION["ID"];?>')"><img src="pictures/sistema/eliminar.png"></a>
                    
                
</div>

               