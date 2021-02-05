
<?php foreach ($producte as $producte): ?>
<section>

    <div id="paginaProducto">
        <div style="grid-area:imgProducto">
            <img width="370" height="600" src="/../img/<?php echo $producte['imgRoute'] ?>" />
        </div>
        <div style="grid-area: review" id="review">
            <h3><?php echo $producte['nom'] ?></h3>
            <p id="review">
                <?php echo $producte['descripcio'] ?>
            </p>
            <h2><?php echo $producte['preu'] ?> €</h2>
                <input type="number" id="quant" name="quant" step="1" value="1" min="1">
                <button class="buy-button" id="buy-button">Añadir a la cesta</button>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $("#buy-button").click(function () {
            var display = $('#cabas').css("display");
            var prod_quant = $('#quant').val();;
            console.log(display);
            $('#cabas').empty();
            $('#cabas').load('index.php?action=cabas&prod_id=<?php echo $producte['id'] ?>&prod_quant='+ prod_quant +'&display=' + display, function () {
                    console.log("Cabas Loaded!");
                });
            });
        });
</script>
<?php endforeach; ?>


