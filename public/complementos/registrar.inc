<div class="formWrapper">
    <div class="formTitle">Registro</div>
    <form id="signUpForm" action="controllers/register.php" name="signUp" method="post">
        <input class="recuadro" name="mail" type="email" placeholder="ejemplo@ejemplo.com" required/>
        <input class="recuadro" name="password" type="password" placeholder="Password" required/>
        <input class="recuadro" name="nomyap" type="text" placeholder="nombre y apellido" required/>
        <input class="recuadro" name="dni" type="number" placeholder="Dni" required/>
        <input class="recuadro" name="direccion" type="text" placeholder="Direccion" required/>
        <input class="recuadro" name="telefono" type="number" placeholder="Telefono" required/>
        <input class="signUpBtn" id="signUpBtn" name="singUpBtn" type="submit" value="Registrarme" required/>
            <div class="smallText">
                <span>¿Si estas registrado?<br>
                    <a class="button" href="javascript:history.back(-1)"> Volver </a> 
                </span>
            </div>
    </form>
</div>