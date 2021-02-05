<h2>Cesta</h2>
<div id = "cabasProds">
    <ul>
        <?php
        $i = 0; if(isset($_SESSION['user_id']) == true && empty($_SESSION['cart']) == false) { foreach ($_SESSION['cart'] as $producte):  ?>
            <li>

                <p ><?php echo $producte['nom'] ?>&emsp;x<?php echo $producte['quant'] ?></p>
                <p ><?php echo $producte['preu_total'] ?> €</p>
            </li>
        <?php $i++; if($i > 10) { echo "I més..."; break; } endforeach; } else if(isset($_SESSION['user_id'])) { ?>
            <li>
                <p >Tu cesta está vacia</p>
            </li>
        <?php } else { ?>
        <li>
            <p>Tienes que hacer Login para acceder a esta funcionalidad</p>
        </li>
        <?php } ?>
    </ul>
</div>
<a href="http://tdiw-j5.deic-docencia.uab.cat/index.php?action=pagina_cabas">Ver cesta</a>