<section class="log">
    <header>
        <h3> ¿No tienes cuenta? Crea una.</h3>
    </header>
    <p> Por favor rellene las casillas con los datos requeridos. </p>
    <form method="post" action="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=register">
        Nombre:<br /> <input type="text" name="nom" pattern="[A-Za-z\s]*$">
        <?php if(isset($isName) ==true)
        {
                if($isName == false)
            {
                echo "<span style='color:darkred;'>Nombre inválido</span>";
            }
        }
        ?>
        <br>
        Email:<br /> <input type="email" name="email" />
        <?php if(isset($isEmail) ==true)
        {
            if($isEmail == false)
            {
                echo "<span style='color:darkred ;'>Email inválido</span>";
            }
        }
        ?>
        <br>
        Contraseña:<br /> <input type="password" name="password" pattern="[A-Za-z0-9-]+" />
        <?php if(isset($isPassword) ==true)
        {
            if($isPassword == false)
            {
                echo "<span style='color:darkred;'>Contraseña inválida</span>";
            }
        }
        ?>
        <br>
        Población:<br /> <input type="text" name="poblacio" maxlength="30" />
        <?php if(isset($isPoblacio) ==true)
        {
            if($isPoblacio == false)
            {
                echo "<span style='color:darkred;'>Población inválida</span>";
            }
        }
        ?>
        <br>
        Dirección:<br /> <input type="text" name="adreca" maxlength="30" />
        <?php if(isset($isAdreca) ==true)
        {
            if($isAdreca == false)
            {
                echo "<span style='color:darkred;'>Dirección inválida</span>";
            }
        }
        ?>
        <br />
        Código Postal:<br /> <input type="text" name="cp" pattern="\d{5}$" maxlength="5" />
        <?php if(isset($isCP) ==true)
        {
            if($isCP == false)
            {
                echo "<span style='color:darkred;'>CP inválido</span>";
            }
        }
        ?>
        <br />
        <input class="register-button" type="submit" value="Registrar-se" />
    </form>
</section>