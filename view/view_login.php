<section class="log">
        <header>
            <h3> Haz login:</h3>
        </header>
        <p> Rellene las casillas con los datos requeridos por favor </p>
        <?php
        if(isset($valid) == true) {
            if($valid == false)
            {

                echo "<h3 style='color:darkred' >LOGIN INCORRECTO</h3>";
            }
        } ?>
        <form method="post" action="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=login">
            Email:<br /> <input type="email" name="email" /><br>
            Contraseña:<br /> <input type="password" name="clau" pattern="[A-Za-z0-9-]+" /><br>
            <input class="login-button" type="submit" value="Login" />
        </form>
</section>