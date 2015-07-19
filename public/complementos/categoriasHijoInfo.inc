<div class= "bloqueCategorias">
                    <!-- categorias -->
<!--*************************************************************************-->

<div class="menu2">
  <ul>
    <li class='has-sub'>
      <a href="index.php"><span>regresar!!</span></a>
    </li>
  </ul>
</div>
<div class="menu">
<ul>
<?php


$sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE idCategoria='".$_GET["idCategoria"]."'");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $fila)
{
      ?>
     <li class='has-sub' ><a href="#"><span><?php echo $fila["nombre"];?></span></a>           
      <?php
          /*  $iden = $fila["idCategoria"];
            $sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE idPadre=$iden");
            $sth->execute();
            $hijos = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(isset($hijos[0]))
            {
                ?> <ul> <?php
                foreach($hijos as $filahija)
                {
                    ?>
            <li><a href='#' onclick="capturandocategoria(<?php echo $filahija["idCategoria"];?>)"><span><?php echo $filahija["nombre"];?></span></a></li>
                  <?php
                }// fin del for
                  ?>  </ul>  <?php 
            }*/// fin if de subcategorias
 ?>     </li>   <?php   
}
      ?>
</ul>
</div> 
<!--*************************************************************************-->
                </div><!-- fin bloque categorias-->
<!--*************************************************************************-->