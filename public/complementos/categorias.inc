<div class= "bloqueCategorias">
                    <!-- categorias -->
<!--*************************************************************************-->
<div class="menu">
<ul>
<?php


$sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE idPadre=0");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $fila)
{
            $iden = $fila["idCategoria"];
            $sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE idPadre=$iden");
            $sth->execute();
            $hijos = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(isset($hijos[0]))
            {
?> <li class='has-sub' ><a href="filtroCategoriaPadre.php?idCategoria=<?php echo $fila["idCategoria"];?>&cnombre=<?php echo $fila["nombre"];?>"><span><?php echo $fila["nombre"];?></span></a> <?php 
            }
            else
            {
?> <li class='has-sub' ><a href="filtroCategoriaHijo.php?idCategoria=<?php echo $fila["idCategoria"];?>&cnombre=<?php echo $fila["nombre"];?>"><span><?php echo $fila["nombre"];?></span></a>  <?php 
            }
      ?>
                
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