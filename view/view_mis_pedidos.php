<section class="log">
    <header>
        <h1>Mis pedidos</h1>
    </header>
    <div id = "comandesGlobal">
        <?php $i = 0; foreach ($comandes as $comanda):  ?>
        <div class="comandaSquare">
            <h3>Pedido # <?php echo $i+1; ?></h3>
            <h6>Pedido realizado en la fecha <?php echo $comanda['data_creacio']?> </h6>
            <div class = "productesPedido">
                <?php foreach ($productes[$i] as $producte): ?>
                <div style="overflow: hidden;">
                        <p style="float:left;" ><?php echo $producte['nom_producte'] ?>&emsp;x<?php echo $producte['quantitat'] ?></p>
                        <p style="float:right;" ><?php echo $producte['preu_total'] ?> €</p>
                </div>
                <?php endforeach; ?>
            </div>
            <p>Import Total: <?php echo $comanda['import_total']?> €</p>
            <?php $i++; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>