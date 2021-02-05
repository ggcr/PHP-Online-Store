<section>
    <img class="backgroundIMG" height="400" src="/img/fondo.png" alt="Coffee background" />
</section>
<div id="container-categoria">
    <?php foreach ($categories as $categoria): ?>
    <div class="categoria" id="categoria<?php echo $categoria['id'] ?>">
        <a>
            <img width="320" height="500" src="/../img/<?php echo $categoria['img'] ?>" alt="Coffee background"/>
            <h3><?php echo $categoria['nom'] ?></h3>
            <p><?php echo $categoria['descripcio'] ?></p>
        </a>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#categoria<?php echo $categoria['id'] ?>").click(function () {
                $('#container-categoria').remove();
                $('body').load('index.php?action=productes&categoria_id=<?php echo $categoria['id'] ?>', function () {
                    console.log("Load completed!");
                });
            });
        });
    </script>
    <?php endforeach; ?>

</div>
