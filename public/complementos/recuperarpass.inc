<div class="formWrapper">
    <div class="formTitle">Recuperar Contrase&ntilde;a</div>
    <form id="recoveryPassForm" action="controllers/recuperarpass.php" name="recoveryPass" method="post">
        <input class="recuadro" name="mail" type="email" placeholder="ejemplo@ejemplo.com" required/>
        <input id="recoveryPassBtn" name="recoveryPassBtn" type="submit" value="Enviar contrase&ntilde;a" required/>
        <div class="smallText">
          <span>Se enviara una nueva contrase&ntilde;a a tu correo<br>
          <a class="button" href="conectarse.php"> Volver </a>
          </span>
        </div>
    </form>
      
</div>
