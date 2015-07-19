<div class="formWrapper " >
    <div>
        <form id="formularioverOfertas" action="controllers/responderPregunta.php" name="formularioverOfertas" >
            <div class="formGral">
                <div class="formTitle" >Mis Notificaciones<br><br></div>
                
                <h3><span>Usted posse la siguiente cantidad de ofertas: <?php echo $cantOferta; ?></span></h3><br>
                <h3><span>Usted posse la siguiente cantidad de preguntas: <?php echo $cantPregunta; ?></span></h3><br>
                <h3><span>Usted posse la siguiente cantidad de respuestas no vistas: <?php echo $cantRespuesta; ?></span></h3><br>
                <h3><span>Usted ha sido seleccionado ganador: <?php echo $cantGanador; ?></span></h3><br>

            </div>
        </form>
        <a href="javascript:history.back(-1);" ><img class="volver" src="pictures/sistema/volver.png"></a>
    </div>
</div>