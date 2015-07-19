<?php 
$sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE idPadre=0");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="formWrapper">
                <form id="registrarProductos" name="registrarProductos" action="controllers/registrarProductos.php" enctype="multipart/form-data" method="post">
                    <div class="formTitle">Registrar producto</div>
                    <input class="recuadro" name="idProducto" type="hidden" value="" placeholder="Titulo del anuncio" required/>
                    <input class="recuadro" name="nombre" type="text" value="" placeholder="Titulo del anuncio" required/>
                    <textarea class="recuadro" class="formWrappertext" name="descripcion" type="text" placeholder="Dé una breve descripcion" required></textarea>

                    <select name="idCategoria" required/> 
                    <option value="0">Seleccione una categoria</option>  
                    <?php
                    foreach($result as $fila)
                    {
                    ?>
                        <optgroup label="<?php echo $fila["nombre"]; ?>">
                    <?php
                        $cat=$fila["idCategoria"];
                        $sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE idPadre=$cat");
                        $sth->execute();
                        $hijos = $sth->fetchAll(PDO::FETCH_ASSOC);
                        foreach($hijos as $h)
                        {
                            ?>
                        <option value="<?php echo $h["idCategoria"]; ?>"><?php echo $h["nombre"]; ?></option>
                            <?php
                        }
                    }
                    ?>
                    </select> 

                    <input class="recuadro" name="cantidad" type="number" value="" min="1" placeholder="Cantidad" required/>
                    <div>
                        <div>Indique el lapso de tiempo</div>
                        
                        <input class="recuadro" name="fechafin" type="number" value="" min="15" max="30" placeholder="ingrese un numero entre 15 y 30 dias" required/>
                    </div>
                    <input class="recuadro" name="imagenProd" type="file"/>
                    <input class="recuadro" name="tipoImagen" value="image/jpeg" type="hidden"/>
                    <input id="botonregistrarNuevoprod" name="botonregistrarNuevoprod" type="submit" value="Terminar Registro" required/>
                    <input id="cancelButton" name="cancelButton" type="button" value="Volver" required/>
                </form>
</div>