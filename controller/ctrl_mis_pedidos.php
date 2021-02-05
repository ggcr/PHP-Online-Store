<?php

require_once __DIR__ . '/../model/connectaDb.php';
require_once __DIR__ . '/../model/comanda.php';

if (isset($_SESSION['user_id']) == true) {
    $conn = connectaBD();

    $comandes = getAllComandesUser($conn);
    $productes = getAllProdsComanda($conn, $comandes);
}

include __DIR__ . '/../view/view_mis_pedidos.php';
