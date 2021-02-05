<div id="nav">
    <div class="left">
        <a href="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=register">REGISTRO</a>
    </div>
    <div class="logo">
        <a href="http://tdiw-j5.deic-docencia.uab.cat/index.php"><img height="40" src="img/logo.png" /></a>
    </div>
    <div class="right">
        <img id = "shopIcon" class="right-user" height="21" src="img/shopping-bag2.svg" />
        <div class="dropdown2" id ="cabas">
            <?php include __DIR__.'/view_cabas.php'; ?>
        </div>
        <img id = "user" class="right-user" height="21" src="img/user.png" />
        <div class="dropdown">
            <ul>
                <?php
                if(isset($_SESSION['user_id']) == true) {
                ?>
                <li><a href="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=edicio">MI CUENTA</a></li>
                <li><a href="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=pedidos">MIS PEDIDOS</a></li>
                <li><a href="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=logout">CERRAR SESIÓN</a></li>
                <?php } else { ?>
                <li><a href="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=login">LOGIN</a></li>
                <?php } ?>
            </ul>
        </div>
        <a href="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=search"><img height="20" src="img/lupa.png" /></a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#user").click(function(){
            $(".dropdown").slideToggle();
        });
    });

    $(document).ready(function () {
        $("#shopIcon").click(function(){
            $(".dropdown2").toggle();
        });
    });

</script>
