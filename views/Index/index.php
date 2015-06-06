<!DOCTYPE html>
<html class="html" lang="es-ES">
  <head>

  <meta charset="utf-8">
  <title>inicio</title>
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/general.css">
  <script src="<?php echo URL; ?>public/js/jquery-1.11.2.js">      
  </script>
  <script language="javascript" type="text/javascript">
  function cambiar(id,color)
  {
    document.getElementById(id).style.backgroundColor=color;
  }
  function limpiar() {
          document.getElementById('tabla').innerHTML='';
   }
   $(function() {
  var Accordion = function(el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;

    // Variables privadas
    var links = this.el.find('.link');
    // Evento
    links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
  }

  Accordion.prototype.dropdown = function(e) {
    var $el = e.data.el;
      $this = $(this),
      $next = $this.next();

    $next.slideToggle();
    $this.parent().toggleClass('open');

    if (!e.data.multiple) {
      $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
    };
  } 

  var accordion = new Accordion($('#accordion'), false);
});
  </script>

  </head>
  <body >

  


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
        <ul id="accordion" class="accordion">
    <li>
      <div class="link"><i class="fa fa-paint-brush"></i>Diseño web<i class="fa fa-chevron-down"></i></div>
      <ul class="submenu">
        <li><a href="#">Photoshop</a></li>
        <li><a href="#">HTML</a></li>
        <li><a href="#">CSS</a></li>
        <li><a href="#">Maquetacion web</a></li>
      </ul>
    </li>
    <li class="default open">
      <div class="link"><i class="fa fa-code"></i>Desarrollo front-end<i class="fa fa-chevron-down"></i></div>
      <ul class="submenu">
        <li><a href="#">Javascript</a></li>
        <li><a href="#">jQuery</a></li>
        <li><a href="#">Frameworks javascript</a></li>
      </ul>
    </li>
    <li>
      <div class="link"><i class="fa fa-mobile"></i>Diseño responsive<i class="fa fa-chevron-down"></i></div>
      <ul class="submenu">
        <li><a href="#">Tablets</a></li>
        <li><a href="#">Dispositivos mobiles</a></li>
        <li><a href="#">Medios de escritorio</a></li>
        <li><a href="#">Otros dispositivos</a></li>
      </ul>
    </li>
    <li><div class="link"><i class="fa fa-globe"></i>Posicionamiento web<i class="fa fa-chevron-down"></i></div>
      <ul class="submenu">
        <li><a href="#">Google</a></li>
        <li><a href="#">Bing</a></li>
        <li><a href="#">Yahoo</a></li>
        <li><a href="#">Otros buscadores</a></li>
      </ul>
    </li>
  </ul>
      </div>
      <!--- -------------------        -->
      <div class= subastas id="tuPapa"  >
            <form id="miFormulario"  name="filtrado" method="post" action="">
                <input class="barrabusqueda" name="string" type="text" placeHolder="buscar producto" required/> 
                <input class="botonbusqueda" id="buttonBuscar" name="botonBuscar" type="submit" value="Buscar" required/>
                <div id="pitoperez" name="tablaProductos">

                 <script> $('#buttonBuscar').click(function(e)
                           {
                              </script>
                              <?php 
                                 require_once("consultas.php");
                                 $stringABuscar=$_POST["string"];
                                 $sql="select * from producto where nombre like '%$stringABuscar%' or descripcion like '%$stringABuscar%' ";
                                
                                 $res=select($sql);

                              ?> 
                                 <table  align="center" width="700" height="150" font-size="100%" id="tabla">
                                  <tr style=" background-color:#666666; color:#FFFFFF; font-weight:bold;height:100">

                                 <td width="10" align="center" valign="top">
                                       <font size="4">id</font> 
                                   </td>
                                 <td width="30" align="center" valign="top">
                                            <font size="4">nombre</font>
                                 </td>
                                 <td width="200" align="center" valign="top">
                                           <font size="4"> descripcion</font>
                                </td>
                                    <td width="30" align="center" valign="top">
                                            <font size="4">estado</font>
                                   </td>
                                    <td width="5" align="center" valign="top">
                                            <font size="4">cant</font>
                                   </td> 
                                   <td width="10" align="center" valign="top">
                                            <font size="4">fechaIni</font>
                                   </td> 
                                   <td width="10" align="center" valign="top">
                                            <font size="4">fechaFin</font>
                                   </td> 
                                   <td width="128" align="center" valign="top">
                                            <font size="4">imagen</font>
                                   </td> 

                                 </tr>
                                <?php

                                 while ($reg=mysql_fetch_array($res))
                                  {
                                    ?>
                                <tr id="<?php echo $reg["idProducto"];?>" style="background-color:#f0f0f0" onmousemove="cambiar('<?php echo $reg["idProducto"];?>','#cccccc')" onmouseout="cambiar('<?php echo $reg["idProducto"];?>','#f0f0f0')">
                                  <td width="10" align="center" valign="middle">
                                    <div align="justify">
                                        <font size="4"> <?php echo $reg["idProducto"];?></font>
                                    </div>
                                  </td>
                                  <td width="30" align="center" valign="middle">
                                    <div align="justify">
                                        <font size="4"> <?php echo chao_tilde($reg["nombre"]);?></font>
                                    </div>
                                  </td>
                                  <td width="200" align="center" valign="middle">
                                           <font size="4"><?php echo $reg["descripcion"];?></font>
                                  </td>
                                   <td width="30" align="center" valign="middle">
                                         <font size="4"> <?php echo $reg["estado"];?></font>
                                  </td>
                                  <td width="5" align="center" valign="middle">
                                         <font size="4"> <?php echo $reg["cantidad"];?></font>
                                  </td>
                                  <td width="10" align="center" valign="middle">
                                          <font size="2"><?php echo $reg["fechaIni"];?></font>
                                  </td>
                                  <td width="10" align="center" valign="middle">
                                          <font size="2"><?php echo $reg["fechaFin"];?></font>
                                  </td>
                                    <td width="128" align="center">
                                         <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $reg['imagen'] ).'" width="128" height="128" border="0"/>';?>
                                  </td>
                                  
                                </tr>
                              <?php
                               }
                              ?>
                          </table>
                         
                                 
                               
                               <script>
   
                            });
                                  

                </script> 
            </div> 
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
<
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
      var telefono = $('form[name=signUp] input[name=telefono]')[0].value;
      
      $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>User/signUp",
          data: {mail: mail, password: password, nomyap: nomyap, dni: dni, direccion: direccion, telefono:telefono}
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
while 

  ($reg=mysql_fetch_array($res))
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
