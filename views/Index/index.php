<!DOCTYPE html>
<html class="html" lang="es-ES">
    <head>

        <meta charset="utf-8">
        <title>inicio</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/general.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/styles.css" />
        <script src="<?php echo URL; ?>public/js/jquery-1.11.2.js"></script>
        <script src="<?php echo URL; ?>public/js/busquedas.js" type="text/javascript"></script> 
    </head>
    <body>


<div id="container">

        <!-- header -->
        <div class="cabecera">
            <img class="logosubasta" src="images/bestnid.png">
            <img class="bestnid"src="images/bestnid logo.png">  
        </div>


        <?php if (!Session::exist()) { ?>

            <div id= "cuerpo">
                <div class= "bloqueCategorias">
                    <!-- categorias -->




<!--*************************************************************************-->






<div id='cssmenu'>
<ul>
<?php


$dbh = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
$sth = $dbh->prepare("SELECT * FROM categoria WHERE idPadre=0");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $fila)
{

      ?>
     <li><a href='#' onclick="capturandocategoria(<?php echo $fila["idCategoria"];?>)"><span><?php echo $fila["nombre"];?></span></a>           

      <?php
            $iden = $fila["idCategoria"];
            $sth = $dbh->prepare("SELECT * FROM categoria WHERE idPadre=$iden");
            $sth->execute();
            $hijos = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(isset($hijos[0]))
            {
                ?> <ul> <?php
                foreach($hijos as $filahija)
                {

                    ?>

            <li><a href='#' onclick="capturandocategoria(<?php echo $filahija["idCategoria"];?>)"><?php echo $filahija["nombre"];?></a></li>

            


                  <?php

                }// fin del for
                  ?>  </ul>  <?php 
            }// fin if de subcategorias
 ?>     </li>   <?php   
}
      ?>
</ul>
</div>








<!--*************************************************************************-->


                </div>
                <div class= "subastas">

<!--*************************************************************************-->



  <div class="busquedas">

        <form id="buscar" name="buscar" >
            <input class="barrabusqueda" name="barrabusqueda" type="text" placeholder="Escriba lo que busca" />
            <input class="botonbusqueda" name="botonbusqueda" type="submit" value="buscar" required/>
        </form>
      
  </div>


  <script type="text/javascript">

                $('#signInBtn').click(function (e)
                {

                    signIn();
                });
                    

                function buscar()
                {

                    var cadena = $('form[name=buscar] input[name=barrabusqueda]')[0].value;

                    $.ajax({
                        type: "POST",
                        url: "<?php echo URL; ?>Producto/buscar",
                        data: {cadena: cadena}
                    });
                }

  </script>



<!--*************************************************************************-->

                </div>

                <div class= "regylog">
                    <!-- login -->
                    <div class="formWrapper">
                        <div class="formTitle">Entrar</div>
                        <form id="signInForm" action="<?php echo URL; ?>User/signIn" name="signIn" method="post">

                            <input class="recuadro" name="mail" type="email" placeholder="Correo Electronico" required/>
                            <input class="recuadro" name="password" type="password" placeholder="Contraseña" required/>

                            <input class="signInBtn" id="signInBtn" name="signInBtn" type="submit" value="Entrar" required/>
                            <div class="smallText">
                                <span>¿No estas registrado?<br>
                                    <div class="button" id="signUpButton">Registrate Aqui</div>
                                </span>
                                <span>¿Olvidaste tu password?<br>
                                    <div class="button" id="recoveryPassButton">Recuperar Password</div>
                                </span>
                            </div>
                        </form>
                    </div>

                    <!-- registracion -->
                    <div class="formWrapper hidden">
                        <div class="formTitle">Registro</div>
                        <form id="signUpForm" action="<?php echo URL; ?>User/signUp" name="signUp" method="post">

                            <input class="recuadro" name="mail" type="email" placeholder="ejemplo@ejemplo.com" required/>
                            <input class="recuadro" name="password" type="password" placeholder="Password" required/>
                            <input class="recuadro" name="nomyap" type="text" placeholder="nombre y apellido" required/>
                            <input class="recuadro" name="dni" type="number" placeholder="Dni" required/>
                            <input class="recuadro" name="direccion" type="text" placeholder="Direccion" required/>
                            <input class="recuadro" name="telefono" type="text" placeholder="Telefono" required/>

                            <input class="signUpBtn" id="signUpBtn" name="singUpBtn" type="submit" value="Registrarme" required/>
                            <div class="smallText">
                                <span>¿Si estas registrado?<br>
                                    <div class="button" id="signInButton">Volver</div>
                                </span>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Recuperar clave -->
                    <div class="formWrapper hidden" style="display: none"> 
                        <div class="formTitle">Recuperar contraseña</div>
                        <form id="recoveryPassForm" action="<?php echo URL; ?>User/recoveryPass" name="recoveryPass" method="post">

                            <input class="recuadro" name="mail" type="email" placeholder="email" required/>

                            <input class="recoveryPassBtn" id="recoveryPassBtn" name="recoveryPassBtn" type="submit" value="Enviar contraseña" required/>
                            <div class="smallText">
                                <span>¿recordaste tu contraseña?<br>
                                    <div class="button" id="signInButton2">Volver</div>
                                </span>
                            </div>
                        </form>
                    </div>
                </div> 

            </div>  

            <script>
                $(function ()
                {
                    $('#signUpButton').click(function ()
                    {
                        $("form[name=signUp]").parent().fadeToggle();
                        $("form[name=signIn]").parent().hide();
                        $("form[name=recoveryPass]").parent().hide();
                    });
                    $('#signInButton').click(function ()
                    {
                        $("form[name=signUp]").parent().hide();
                        $("form[name=signIn]").parent().fadeToggle();
                        $("form[name=recoveryPass]").parent().hide();
                    });
                    $('#recoveryPassButton').click(function ()
                    {
                        $("form[name=signUp]").parent().hide();
                        $("form[name=signIn]").parent().hide();
                        $("form[name=recoveryPass]").parent().fadeToggle();
                    });
                    $('#signInButton2').click(function ()
                    {
                        $("form[name=signUp]").parent().hide();
                        $("form[name=signIn]").parent().fadeToggle();
                        $("form[name=recoveryPass]").parent().hide();
                    });


                    $('#signUpBtn').click(function (e)
                    {

                        signUp();
                    });

                    $('#signInBtn').click(function (e)
                    {

                        signIn();
                    });
                    
                    $('#recoveryPassBtn').click(function (e)
                    {

                        recoveryPass();
                    });

                });

                function signUp()
                {
                    var mail = $('form[name=signUp] input[name=mail]')[0].value;
                    var password = $('form[name=signUp] input[name=password]')[0].value;
                    var nomyap = $('form[name=signUp] input[name=nomyap]').value;
                    var dni = $('form[name=signUp] input[name=dni]')[0].value;
                    var direccion = $('form[name=signUp] input[name=direccion]')[0].value;
                    var telefono = $('form[name=signUp] input[name=telefono]')[0].value;

                    $.ajax({
                        type: "POST",
                        url: "<?php echo URL; ?>User/signUp",
                        data: {mail: mail, password: password, nomyap: nomyap, dni: dni, direccion: direccion, telefono: telefono}
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

                function recoveryPass()
                {
                    var mail = $('form[name=recoveryPassForm] input[name=mail]')[0].value;

                    $.ajax({
                        type: "POST",
                        url: "<?php echo URL; ?>User/recoveryPass",
                        data: {mail: mail}
                    });
                }
            </script>

            <?php
        } else {

            if (Session::getValue('TIPO') == 1) 
            {//opciones para usuario logueado
                //print_r($this->userData());
                ?>
                <span class="correo"><?php echo Session::getValue('MAIL'); ?></span>
                        <button id="closeSessionBtn">Cerrar Session</button>
                <div class="formWrapper modificaryeliminar">
                    <div class="botoncerrar">
                        
                        <div class="formTitle">Actualizar</div>
                        <form name="formulariomodificar" action="<?php echo URL; ?>User/update" method="post">
                        <input class="recuadro" name="idUsuario" type="hidden" value="<?php echo Session::getValue('ID'); ?>" required/>
                        <input class="recuadro" name="mail" type="email" value="<?php echo Session::getValue('MAIL'); ?>" placeholder="correo electronico" required/>
                        <input class="recuadro" name="password" type="password" value="<?php echo Session::getValue('PASS'); ?>" placeholder="Password" required/>
                        <input class="recuadro" name="nomyap" type="text" value="<?php echo Session::getValue('NOMBRE'); ?>" placeholder="nombre y apellido" required/>
                        <input class="recuadro" name="dni" type="number" value="<?php echo Session::getValue('DNI'); ?>" placeholder="dni" required/>
                        <input class="recuadro" name="direccion" type="text" value="<?php echo Session::getValue('DIR'); ?>" placeholder="direccion" required/>
                        <input class="recuadro" name="telefono" type="number" value="<?php echo Session::getValue('TEL'); ?>" placeholder="telefono" required/>
                        <input class="recuadro" name="imagen"  type="file"  enctype="multipart/form-data" placeholder="imagen" />
                        <input class="botonactualizar" id="botonactualizar" name="botonactualizar" type="submit" value="modificar" required/>
                        </form>
                        <form name="formularioEliminar" action="<?php echo URL; ?>User/delete" method="post">
                            <input class="recuadro" name="idUsuario" type="hidden" value="<?php echo Session::getValue('ID'); ?>" required/>
                            <input class="botondardebaja" id="botondardebaja" name="botondardebaja" type="submit" value="eliminar" required/>
                        </form>


                    </div>
                </div>


                <script type="text/javascript">
                    $('#botonactualizar').click(function (e)
                    {
                        update();
                    });
                    $('#botondardebaja').click(function (e)
                    {
                        eliminar();
                    });
                            function update();
                            {

                                    var idUsuario = $('form[name=formulariomodificar] input[name=idUsuario]')[0].value;
                                    var mail = $('form[name=formulariomodificar] input[name=mail]')[0].value;
                                    var password = $('form[name=formulariomodificar] input[name=password]')[0].value;
                                    var nomyap = $('form[name=formulariomodificar] input[name=nomyap]')[0].value;
                                    var dni = $('form[name=formulariomodificar] input[name=dni]')[0].value;
                                    var direccion = $('form[name=formulariomodificar] input[name=direccion]')[0].value;
                                    var telefono = $('form[name=formulariomodificar] input[name=telefono]')[0].value;
                                    $.ajax({
                                    type: "POST",
                                            url: "<?php echo URL; ?>User/update",
                                            data: {idUsuario: idUsuario, mail: mail, password: password, nomyap: nomyap, dni: dni, direccion: direccion, telefono: telefono}
                                    });
                            }
                            
                           function updateImagen();
                           {
                            var idUsuario = $('form[name=formulariomodificar] input[name=idUsuario]').value;
                            var imagen  = $('form[name=formulariomodificar] input[name=imagen]').value
                            $.ajax({
                               type: "POST",
                               url: "<?php echo URL; ?>User/updateImagen",
                               data: {idUsuario: idUsuario, imagen:imagen}
                             });
                            }


                       function eliminar()
                       {
                           var idUsuario = $('form[name=formularioEliminar] input[name=idUsuario]')[0].value;

                           $.ajax({
                               type: "POST",
                               url: "<?php echo URL; ?>User/delete",
                               data: {idUsuario: idUsuario}
                           });
                       }

                </script>
            </script>
        <?php
    }
    if (Session::getValue('TIPO') == 0) 
    {//opciones para administrador//insert into usuario values (null,'admin@admin.com',1234,'admin',999,0,'av. siempre viva',8003333,null,null)
        ?>
            <div class="formadmin">
                <div class="botoncerrar">
                    <span class="correo"><?php echo Session::getValue('MAIL'); ?></span>
                    <button id="closeSessionBtn">Cerrar Session</button>
                </div>

            </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php $saltos="" ?>

<div class="tablagen">

<h3>modificar y eliminar Categorias padre</h3>
<div class="modificareliminar">
<?php


$dbh = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
$sth = $dbh->prepare("SELECT * FROM categoria WHERE idPadre=0");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $fila)
{
    $saltos=$saltos."<br>";
      ?>
      <div class="fila">

      <div class="columna" >
        <form id="formModificarCategoria"  name="formModificarCategoria" action="<?php echo URL; ?>Categoria/botonModificarCategoria" method="post" >
            <input name="nombreCategoria" type="text" value="<?php echo $fila["nombre"];?>" placeholder="escriba un nombre" required/>
            <input name="idCategoria" type="hidden" value="<?php echo $fila["idCategoria"];?>"/>
            <input name="idPadre" type="hidden" value="<?php echo $fila["idPadre"];?>" />
            <input id="botonModificarCategoria" name="botonModificarCategoria" type="submit" value="Modificar"/>
        </form>
      </div>

      <script type="text/javascript">
      $('#botonModificarCategoria').click(function(e)
      {
        botonModificarCategoria();
      });

      function botonModificarCategoria();
      {
        
        var idCategoria = $('form[name=formModificarCategoria] input[name=idCategoria]').value;
        var idPadre = $('form[name=formModificarCategoria] input[name=idPadre]').value;
        var nombreCategoria = $('form[name=formModificarCategoria] input[name=nombreCategoria]').value;

        $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>Categoria/botonModificarCategoria",
          data: {idCategoria: idCategoria, idPadre: idPadre, nombreCategoria: nombreCategoria}
        });


      }
      </script>

      <div class="columna">
        <form id="formEliminarCategoria"  name="formEliminarCategoria" action="<?php echo URL; ?>Categoria/botonEliminarCategoria" method="post">
            <input name="idCategoria" type="hidden" value="<?php echo $fila["idCategoria"];?>"/>
            <input id="botonEliminarCategoria" name="botonEliminarCategoria" type="submit" value="Eliminar"/>
        </form>
      </div>

      <script type="text/javascript">
        $('#botonEliminarCategoria').click(function(e)
        {
          botonEliminarCategoria();
        });
    

      function botonEliminarCategoria()
      {
        var idCategoria= $('form[name=formEliminarCategoria] input[name=idCategoria]')[0].value;
        $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>Categoria/botonEliminarCategoria",
          data:{idCategoria: idCategoria}
        });
      }
      </script>

      </div>

      <?php
            $iden = $fila["idCategoria"];
            $sth = $dbh->prepare("SELECT * FROM categoria WHERE idPadre=$iden");
            $sth->execute();
            $hijos = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(isset($hijos[0]))
            {
                ?> <div class="tablagen2"> <div><h3>modificar y eliminar categorias hijas</h3></div> <?php
                foreach($hijos as $filahija)
                {
                    $saltos=$saltos."<br>";
                    ?>

      <div class="fila">



      <div class="columna" >
        <form id="formModificarCategoriahija"  name="formModificarCategoriahija" action="<?php echo URL; ?>Categoria/botonModificarCategoria" method="post">
            <input name="nombreCategoria" type="text" value="<?php echo $filahija["nombre"];?>" placeholder="escriba un nombre" required/>
            <input name="idCategoria" type="hidden" value="<?php echo $filahija["idCategoria"];?>"/>
            <input name="idPadre" type="hidden" value="<?php echo $filahija["idPadre"];?>" />
            <input id="botonModificarCategoriahija" name="botonModificarCategoriahija" type="submit" value="Modificar"/>
        </form>
      </div>

      <script type="text/javascript">
        $('#botonModificarCategoriahija').click(function(e)
      {
        botonModificarCategoriahija();
      });

      function botonModificarCategoriahija();
      {
        var nombreCategoria= $('form[name=formModificarCategoriahija] input[name=nombreCategoria]')[0].value;
        var idCategoria = $('form[name=formModificarCategoriahija] input[name=idCategoria]')[0].value;
        var idPadre = $('form[name=formModificarCategoriahija] input[name=idPadre]')[0].value;
      

        $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>Categoria/botonModificarCategoria",
          data: {idCategoria: idCategoria, idPadre: idPadre, nombreCategoria: nombreCategoria}
        });


      }
      </script>

      <div class="columna">
        <form id="formEliminarCategoriahija"  name="formEliminarCategoriahija" action="<?php echo URL; ?>Categoria/botonEliminarCategoriahija" method="post">
            <input name="idCategoria" type="hidden" value="<?php echo $filahija["idCategoria"];?>"/>
            <input id="botonEliminarCategoriahija" name="botonEliminarCategoriahija" type="submit" value="Eliminar"/>
        </form>
      </div>
      <script type="text/javascript">
        $('#botonEliminarCategoriahija').click(function(e)
        {
          botonEliminarCategoriahija();
        });
    

      function botonEliminarCategoriahija()
      {
        var idCategoria= $('form[name=formEliminarCategoriahija] input[name=idCategoria]')[0].value;
        $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>Categoria/botonEliminarCategoriahija",
          data:{idCategoria: idCategoria}
        });
      }
      </script>
      
      </div> <!-- fin apartado de hijas -->

                  <?php

                }// fin del for
                  ?>  </div>  <!-- fin tablagen2 -->  <?php 
            }// fin if de modificar y eliminar hijos
            
}
      ?>
      </div> <!-- fin div modificar eliminar -->


      <div><h3>Agregar Categorias padre</h3></div>

      <div class="agregarcategoriapadre">

      <div class="fila">
      <div class="columna">
        <form id="formAgregarCategoria"  name="formAgregarCategoria" action="<?php echo URL; ?>Categoria/botonAgregarCategoria" method="post" >
            <input name="nombreCategoria" type="text"  placeholder="escriba un nombre" required/>
            <input id="botonAgregarCategoria" name="botonAgregarCategoria" type="submit" value="Agregar"/>
        </form>
      </div>

      <script type="text/javascript">

        $('#botonAgregarCategoria').click(function(e)
      {
        botonAgregarCategoria();
      });

      function botonAgregarCategoria();
      {
        var nombreCategoria= $('form[name=formAgregarCategoria] input[name=nombreCategoria]')[0].value;
      

        $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>Categoria/botonAgregarCategoria",
          data: {nombreCategoria: nombreCategoria}
        });


      }

      </script>

      </div>

      </div> <!-- fin agregar categoria padre -->

<div><h3>Agregar SubCategoria</h3></div>

      <div class="agregarsubcategoria">

<div class="fila">
<div class="columna">
        <form id="formAgregarSubCategoria"  name="formAgregarSubCategoria" action="<?php echo URL; ?>Categoria/botonAgregarSubCategoria" method="post" >
                <select id="miCombo" class="miCombo" name="idPadre"> 
                <option value="0">Seleccione una categoria padre</option>  
                    <?php
                    foreach($result as $fila)
                    {
                    ?>

                        <option value="<?php echo $fila["idCategoria"]; ?>"><?php echo $fila["nombre"]; ?></option>

                    <?php
                    }
                    ?>
                </select> 
            <input name="nombreNueva" type="text" placeholder="escriba un nombre" required/>
            <input class="contenedor" id="contenedor" name="idPadrecategoria" type="hidden" />
            <input id="botonAgregarSubCategoria" name="botonAgregarSubCategoria" type="submit" value="Agregar"/>
        </form>
        <script type="text/javascript">


       $("#miCombo").change(function () {
    var str;
    $( "#miCombo option:selected" ).each(function() {
      str = $( this ).value();
    });
    $( "input[name=idPadrecategoria]" ).val(str);
    }).change(); 


      $('#botonAgregarSubCategoria').click(function(e)
      {
        botonAgregarSubCategoria();
      });

      function botonAgregarSubCategoria();
      {
        var nombreCategoria= $('form[name=formAgregarCategoria] input[name=nombreCategoria]')[0].value;
        var idPadrecategoria= $('form[name=formAgregarCategoria] input[name=idPadrecategoria]')[0].value;

        $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>Categoria/botonAgregarSubCategoria",
          data: {nombreCategoria: nombreCategoria , idPadrecategoria: idPadrecategoria}
        });


      }


      </script>
      </div>
      </div>
      </div>  <!-- fin agregar subcategoria -->
</div>  <!-- fin tablagen -->
<?php echo $saltos ?>

    <?php    
    }// cerrando bloque administrador
        ?>

                    <script>
                        $(function ()
                        {
                            $('#closeSessionBtn').click(function ()
                            {
                                document.location = "<?php echo URL; ?>User/destroySession";
                            });
                        });
                    </script>
<?php }//cerrando bloque else general ?>


</div>
                <div class= pie>
                    <!-- pie de pagina -->
                </div>

    </body>
</html>
