<section class="log" id="cabasPage">
    <header>
        <?php if(isset($err) == true) { ?>
        <h2>Tienes que hacer Login para acceder a esta funcionalidad </h2>
        <?php } else { ?>
        <h3> Cesta </h3>
        <?php } ?>
    </header>
    <ul>
    <?php
    if(isset($_SESSION['user_id']) == true) { foreach ($_SESSION['cart'] as $producte): ?>
        <li>
            <span>
                <p id="prodCabasNom"><?php echo $producte['nom'] ?>&emsp;x<?php echo $producte['quant'] ?></p>

            <p id="prodCabasPreu"><?php echo $producte['preu_total'] ?> €</p>
            </span>
        </li>
    <?php endforeach; ?>
    </ul>
    <div>
        <p id="totalCabas">Total: <?php echo $total ?> €</p>
        <button class="buy-button" id="finalitzar-compra">Finalizar compra</button>
        <button class="buy-button" id="buidar-button">Vaciar Cesta</button>
    </div>
    <?php } ?>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $("#finalitzar-compra").click(function () {
            $('body').empty();
            $('body').load('index.php?action=confirmacio', function () {
                console.log("Load completed!");
            });
        });
    });

    $(document).ready(function () {
        $("#buidar-button").click(function () {
            $('body').empty();
            $('body').load('index.php?action=pagina_cabas&buidar=true', function () {
                console.log("Load completed!");
            });
        });
    });
</script>