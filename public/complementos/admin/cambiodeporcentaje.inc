
    <script type="text/javascript">
         function vaciarInput(id){
         	  document.getElementById(id).value="";
         }
      </script>
    <?php 
       $sth = $conexionPDO->prepare("SELECT * FROM porcentaje ");
       $sth->execute();
       $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
      
     ?>
      <div class="cambioporcentaje">
       porcentaje actual:<span><?php echo $result[0]["valor"]?> </span>
      <form name="formChangePercent" action="../controllers/consultas del administrador/cambiarPorcentaje.php" method="post">
              modificar porcentaje:<input id="percent" name="porcentaje" type="number" min="1" max="100" required ><br>     
              <input type="submit" value="confirmar cambio de porcentaje">
            </form>
      </div>