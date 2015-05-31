<!DOCTYPE html>
<html class="html" lang="es-ES">
  <head>

  <meta charset="utf-8">
  <title>inicio</title>
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/general.css">
  <script src="<?php echo URL; ?>public/js/jquery-1.11.2.js"></script>
  </head>
  <body>

  


    <!-- header -->
    <div class="cabecera">
    	<img class="logosubasta" src="images/bestnid.png">
    	<img class="bestnid"src="images/bestnid logo.png">  
    </div>


    <?php
    	if(!Session::exist()){ ?>

    <div class= cuerpo>
      <div class= bloqueCategorias>
      <!-- categorias -->
      </div>
      <div class= subastas>
      <!-- reservado para miguel -->
      </div>

      <div class= regylog>
            <!-- login -->
    		<div class="formWrapper">
    		<div class="formTitle">Entrar</div>
    			<form id="signInForm" action="<?php echo URL; ?>User/signIn" name="signIn" method="post">

    				<input name="mail" type="email" placeholder="Correo Electronico" required/>
    				<input name="password" type="password" placeholder="Contraseña" required/>

    				<input id="signInBtn" name="signInBtn" type="submit" value="Entrar" required/>
    				<div class="smallText">
    					<span>¿No estas registrado?<br>
    						<div class="button" id="signUpButton">Registrate Aqui</div>
    					</span>
    					<span>¿Olvidaste tu password?<br>
    						<a href="">Recordar Password</a>
    					</span>
    				</div>
    			</form>
    		</div>

    		<!-- registracion -->
    		<div class="formWrapper hidden">
    		<div class="formTitle">Registro</div>
    			<form id="signUpForm" action="<?php echo URL; ?>User/signUp" name="signUp" method="post">

    				<input name="mail" type="email" placeholder="ejemplo@ejemplo.com" required/>
    				<input name="password" type="password" placeholder="Password" required/>
            <input name="nomyap" type="text" placeholder="nombre y apellido" required/>
    				<input name="dni" type="number" placeholder="Dni" required/>
            <input name="direccion" type="text" placeholder="Direccion" required/>
            <input name="telefono" type="text" placeholder="Telefono" required/>

    				<input id="signUpBtn" name="singUpBtn" type="submit" value="Registrarme" required/>
    				<div class="smallText">
    					<span>¿Si estas registrado?<br>
    						<div class="button" id="signInButton">Volver</div>
    					</span>
    				</div>
    			</form>
    		</div>
    	</div> 

    </div>  
    
    <script>
  	$(function()
  	{
  		$('#signUpButton').click(function()
  		{
  			$("form[name=signIn]").parent().hide();
  			$("form[name=signUp]").parent().fadeToggle();
  		});
  		$('#signInButton').click(function()
  		{
  			$("form[name=signUp]").parent().hide();
  			$("form[name=signIn]").parent().fadeToggle();
  		});


      $('#signUpBtn').click(function(e)
      {
        
        signUp();
      });

      $('#signInBtn').click(function(e)
      {
        
        signIn();
      });

  	});

    function signUp()
    {
      var mail = $('form[name=signUp] input[name=mail]')[0].value;
      var password = $('form[name=signUp] input[name=password]')[0].value;
      var nomyap = $('form[name=signUp] input[name=nomyap]')[0].value;
      var dni = $('form[name=signUp] input[name=dni]')[0].value;
      var direccion = $('form[name=signUp] input[name=direccion]')[0].value;
      var tenefono = $('form[name=signUp] input[name=telefono]')[0].value;

      $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>User/signUp",
          data: {mail: mail, password: password, nomyap: nomyap, dni: dni, direccion: direccion, tenefono:telefono}
      });
    }
    function signIn()
    {
      
      var mail = $('form[name=signIn] input[name=mail]')[0].value;
      var password = $('form[name=signIn] input[name=password]')[0].value;

      $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>User/signIn",
          data: {mail: mail, password: password}
      });
    }
 	</script>

 	<?php 
  }else{ ?>
  
    
      
      <?php 
      if(Session::getValue('TIPO')==1)//opciones para usuario logueado
      {
          ?>
          <div class="formWrapper">
            <div class="botoncerrar">
              <span class="correo"><?php echo Session::getValue('MAIL'); ?></span>
              <button id="closeSessionBtn">Cerrar Session</button>
            </div>
          </div>
          <?php
      }
      if(Session::getValue('TIPO')==0)//opciones para administrador
      {//insert into usuario values (null,'admin@admin.com',1234,'admin',999,0,'av. siempre viva',8003333,null,null)
          ?>
          <div class="formadmin">
            <div class="botoncerrar">
              <span class="correo"><?php echo Session::getValue('MAIL'); ?></span>
              <button id="closeSessionBtn">Cerrar Session</button>
            </div>

            <div>
              











<table class="categoria">

<tr>
<td valign="top" align="center" width="150px" colspan="3">
<h3>Listado de Categorias</h3>
</td>
</tr>

<tr class="encabezado">
<td width="100px">

</td>
<td width="25px">&nbsp;

</td>
<td width="25px">&nbsp;

</td>
</tr>

<?php
$sql="select * from categoria where idPadre=0";
$res=mysql_query($sql);
while ($reg=mysql_fetch_array($res))
{
?>
<tr class="registros">
<td width="100px">
<?php
echo $reg["nombre"];
?>
</td>
<td width="25px">
        <form id="formModificarCategoria"  name="formModificarCategoria" >
            <input name="modificarCategoria" type="text" placeholder="escriba un nombre" required/>
            <input name="idCategoria" type="hidden" value="<?php echo $reg["idCategoria"];?>"/>
            <input name="idPadre" type="hidden" value="<?php echo $reg["idPadre"];?>" />
            <input id="botonModificarCategoria" name="botonModificarCategoria" type="submit" value="Modificar"/>
        </form>
</td>

<td width="25px">
        <form id="formEliminarCategoria"  name="formEliminarCategoria" >
            <input name="idCategoria" type="hidden" value="<?php echo $reg["idCategoria"];?>"/>
            <input id="botonEliminarCategoria" name="botonEliminarCategoria" type="submit" value="Eliminar"/>
        </form>

</td>
</tr>
<?php
}
?>
<tr>
<td align ="center" colspan="3">
        <form id="formAgregarCategoria"  name="formAgregarCategoria" >
                <select name="ti"> 
                <option value="0">Seleccione un Tipo</option>  
                    <?php
                    while($tip=mysql_fetch_array($mistipos))
                    {
                    ?>

                        <option value="<?php echo $tip["idTipo"]; ?>"><?php echo $tip["Tipo"]; ?></option>

                    <?php
                    }
                    ?>
                </select> 
            <input name="idPadre" type="number" value="<?php echo $reg["idCategoria"];?>"/>
            <input id="botonEliminarCategoria" name="botonEliminarCategoria" type="submit" value="Eliminar"/>
        </form>
<a href="agregarCaracteristica.php" title="Agregar Caracteristica"><img src="../imagenes/agregar.png"></a>
</td>
</tr>

</table>

<script>
    $("#formModificarCategoria").submit(function(event))
    {
        event.preventDefault();
        var idCategoria = $('form[name=formModificarCategoria] input[name=idCategoria]')[0].value;
        var idPadre = $('form[name=formModificarCategoria] input[name=idPadre]')[0].value;
        var nombre = $('form[name=formModificarCategoria] input[name=modificarCategoria]')[0].value;
        $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>Categoria/actualizar",
          data: {idCategoria: idCategoria, idPadre: idPadre, nombre: nombre}
        });
    });
    

    $("#formEliminarCategoria").submit(function(event))
    {
        event.preventDefault();
        var idCategoria = $('form[name=formEliminarCategoria] input[name=idCategoria]')[0].value;
        $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>Categoria/eliminar",
          data: {idCategoria: idCategoria}
        });
    });
</script>>



                
              
            </div>

          </div>
          <?php
      }
      ?>
    
    <script>
        $(function()
        {
            $('#closeSessionBtn').click(function()
            {
              document.location = "<?php echo URL; ?>User/destroySession";
            });
        });
    </script>
  <?php } ?>




      <div class= pie>
      <!-- pie de pagina -->
      </div>

  </body>
</html>
