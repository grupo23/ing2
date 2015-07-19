<div class="formWrapper">
    <div class="formTitle">Entrar</div>
    <form id="signIn" action="controllers/login.php" name="signIn" method="post">
        <input class="recuadro" name="mail" type="email" placeholder="Correo Electronico" required/>
        <input class="recuadro" name="password" type="password" placeholder="Contraseña" required/>
        <input class="signInBtn" id="signInBtn" name="signInBtn" type="submit" value="Entrar" required/>
    </form>
            <div class="smallText">
                <span>¿No estas registrado?<br>
                <a class="button" href="registrarse.php">Registrate Aqui</a>
                </span>
                <span>¿Olvidaste tu password?<br>
                <a class="button" href="recuperarpass.php">Recuperar Password</a>
                </span>
            </div>
</div>
