
<div id="container-productes">
    <?php foreach ($productes as $producte): ?>
        <div class="producte" id="prod<?php echo $producte['id'] ?>">
            <a>
                <img width="230"  height="340" src="/../img/<?php echo $producte['imgRoute'] ?>" />
                <h3><?php echo $producte['nom'] ?></h3>
                <p><?php echo $producte['preu'] ?> €</p>
            </a>
        </div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#prod<?php echo $producte['id'] ?>").click(function () {
            $('#container-productes').remove();
            $('body').load('index.php?action=producte&prod_id=<?php echo $producte['id'] ?>', function () {
                console.log("Load completed!");
            });
        });
    });

    $(document).ready(function () {
        var display = $('#cabas').css("display");
        $('#cabas').empty();
        $('#cabas').load('index.php?action=cabas&display=' + display, function () {
            console.log("Cabas Loaded!");
        });
    });
</script>
<?php endforeach; ?>
</div>
