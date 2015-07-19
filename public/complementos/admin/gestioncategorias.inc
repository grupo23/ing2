<?php 
$sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE idPadre=0");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="agregarpadreysub">
  <div><h3>Agregar Categorias padre</h3></div>

      <div class="agregarcategoriapadre">

      <div class="fila">
      <div class="columna">
        <form id="formAgregarCategoria"  name="formAgregarCategoria" action="../controllers/consultas del administrador/botonAgregarCategoria.php" method="post" >
            <input name="nombreCategoria" type="text"  placeholder="escriba un nombre" required/>
            <input id="botonAgregarCategoria" name="botonAgregarCategoria" type="submit" value="Agregar"/>
        </form>
      </div>
      </div>
      </div> <!-- fin agregar categoria padre -->

<div><h3>Agregar SubCategoria</h3></div>

      <div class="agregarsubcategoria">

<div class="fila">
<div class="columna">
        <form id="formAgregarSubCategoria"  name="formAgregarSubCategoria" action="../controllers/consultas del administrador/botonAgregarSubCategoria.php" method="post" >
                <select  id="miCombo" class="miCombo" name="idPadrecategoria" required/> 
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
            <input name="nombreCategoria" type="text" placeholder="escriba un nombre" required/>
            <input id="botonAgregarSubCategoria" name="botonAgregarSubCategoria" type="submit" value="Agregar"/>
        </form>
     
      </div>
      </div>
      </div>  <!-- fin agregar subcategoria -->
</div>

<div class="tablagen">
     
<div class="modificareliminar">

<?php

foreach($result as $fila)
{
    echo "<h3>modificar y eliminar Categorias padre</h3>";

      ?>
      <div class="fila">

      <div class="columna" >
        <form id="formModificarCategoria"  name="formModificarCategoria" action="../controllers/consultas del administrador/botonModificarCategoria.php" method="post" >
            <input name="nombreCategoria" type="text" value="<?php echo $fila["nombre"];?>" placeholder="escriba un nombre" required/>
            <input name="idCategoria" type="hidden" value="<?php echo $fila["idCategoria"];?>" required/>
            <input name="idPadre" type="hidden" value="<?php echo $fila["idPadre"];?>" required/>
            <input id="botonModificarCategoria" name="botonModificarCategoria" type="submit" value="Modificar"/>
        </form>
      </div>

      <div class="columna">
        <form id="formEliminarCategoria"  name="formEliminarCategoria" action="../controllers/consultas del administrador/botonEliminarCategoria.php" method="post">
            <input name="idCategoria" type="hidden" value="<?php echo $fila["idCategoria"];?>" required/>
            <input id="botonEliminarCategoria" name="botonEliminarCategoria" type="submit" value="Eliminar"/>
        </form>
      </div>

      </div>

      <?php
            $iden = $fila["idCategoria"];
            $sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE idPadre=$iden");
            $sth->execute();
            $hijos = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(isset($hijos[0]))
            {
                ?> <div class="tablagen2"> <div><h3>modificar y eliminar categorias hijas</h3></div> <?php
                foreach($hijos as $filahija)
                {
                    ?>

      <div class="fila">



      <div class="columna" >
        <form id="formModificarCategoriahija"  name="formModificarCategoriahija" action="../controllers/consultas del administrador/botonModificarCategoria.php" method="post">
            <input name="nombreCategoria" type="text" value="<?php echo $filahija["nombre"];?>" placeholder="escriba un nombre" required/>
            <input name="idCategoria" type="hidden" value="<?php echo $filahija["idCategoria"];?>"/>
            <input name="idPadre" type="hidden" value="<?php echo $filahija["idPadre"];?>" />
            <input id="botonModificarCategoriahija" name="botonModificarCategoriahija" type="submit" value="Modificar"/>
        </form>
      </div>


      <div class="columna">
        <form id="formEliminarCategoriahija"  name="formEliminarCategoriahija" action="../controllers/consultas del administrador/botonEliminarCategoriahija.php" method="post">
            <input name="idCategoria" type="hidden" value="<?php echo $filahija["idCategoria"];?>" required/>
            <input id="botonEliminarCategoriahija" name="botonEliminarCategoriahija" type="submit" value="Eliminar"/>
        </form>
      </div>
      
      </div> <!-- fin apartado de hijas -->

                  <?php

                }// fin del for
                  ?>  </div>  <!-- fin tablagen2 -->  <?php 
            }// fin if de modificar y eliminar hijos
            
}
      ?>
      </div> <!-- fin div modificar eliminar -->


      
</div>  <!-- fin tablagen -->
