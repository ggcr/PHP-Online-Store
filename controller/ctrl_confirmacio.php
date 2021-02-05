<?php
require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__.'/../model/comanda.php';

$ret = false;
if(isset($_SESSION['user_id']) == true && empty($_SESSION['cart']) == false) {
    $ret = true;

    $conn = connectaBD();

    $n_elements = countCartElements();
    $total = calcularTotalCabas();
    $comandaUser = crearComanda($conn, $n_elements, $total);

    $comandaUser = getComandaUser($conn);
    $liniaComandaUser = guardarItemsComanda($conn, $comandaUser);

    if($liniaComandaUser == true && $comandaUser == true) {
        $ret = true;
    } else {
        $ret = false;
    }
    buidaCabas();
}

include __DIR__.'/../view/view_confirmacioComanda.php';
