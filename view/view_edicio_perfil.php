<section class="log">
    <header>
        <h1> Actualiza el perfil:</h1>
    </header>
    <form method="post" action="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=edicio" enctype="multipart/form-data">
        Nombre:<br /> <input type="text" name="nom" pattern="[A-Za-z\s]*$"value=<?php echo $user['nom']?> /><br>
        Email:<br /> <input type="email" name="email" value=<?php echo  $user['email']?> />
        <?php if(isset($isemail) ==true)
        {
            if($isemail == false)
            {
                echo "<span style='color:darkred ;'>Email inválido</span>";
            }
        }
        ?>
        <br>
        Contraseña Previa:<br /> <input type="password" name="oldpassword" pattern="[A-Za-z0-9-]+" />
        <?php if(isset($password_match) ==true)
        {
            if($password_match == false)
            {
                echo "<span style='color:darkred ;'>La contraseña anterior es incorrecta</span>";
            }
        }
        ?>
        <br>
        Nueva Contraseña:<br /> <input type="password" name="newpassword" pattern="[A-Za-z0-9-]+" /><br>
        Población:<br /> <input type="text" name="poblacio" maxlength="30"value=<?php echo  $user['poblacio']?> /><br>
        Dirección:<br /> <input type="text" name="adreca" maxlength="30" value=<?php echo  $user['adreca']?> /><br>
        Código Postal:<br /> <input type="text" name="cp" pattern="\d{5}$" maxlength="5"value=<?php echo  $user['cp']?> /><br>
        Foto de Perfil:<br /> <input type="file" id="imatge" accept="image/*" name="profile_image"/><br>
        <br>
        <?php if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image'])):?>
            <img src="<?php echo $UPLOADS_PUBLIC_PATH.$user['image_name'] ?> "width="300" height="300"/>
        <?php endif; ?>
        <br />
        <input class="register-button" type="submit" value="Guardar cambios" />
    </form>
</section>
