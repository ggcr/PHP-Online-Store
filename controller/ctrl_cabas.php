<?php

$prod_id = isset($_GET['prod_id']) ? $_GET['prod_id'] :  null;
$prod_quant = isset($_GET['prod_quant']) ? $_GET['prod_quant'] :  null;

$update = isset($_GET['update']) ? $_GET['update'] :  null;
$delete = isset($_GET['delete']) ? $_GET['delete'] :  null;
$prod_pos = isset($_GET['prod_pos']) ? $_GET['prod_pos'] :  null;

$display = isset($_GET['display']) ? $_GET['display'] :  null;

$buidar = isset($_GET['buidar']) ? $_GET['buidar'] :  null;

require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__.'/../model/productes.php';
require_once __DIR__.'/../model/comanda.php';


if(isset($_SESSION['user_id']) == true) {
    $conn = connectaBD();

    if($buidar != NULL) {
        buidaCabas();
    }

    if($update == true) {
        updateQuantCabas($prod_pos, $prod_quant);
    }

    if($delete == true) {
        deleteProd($prod_pos);
    }

    if ($prod_id != NULL) {
        $producte = getProducte($conn, $prod_id);
        $ret = cercarProducteCabasRepetit($producte, $prod_quant);
        if ($ret == false) {
            guardarProducteCabasSesion($producte, $prod_quant);
        }
    }

    if(isset($display) == false) {
        $total = calcularTotalCabas();
        include __DIR__ . '/../view/view_paginaCabas.php';
    } else {
        include __DIR__ . '/../view/view_cabas.php';
    }
}
else {
    if(isset($display) == false) {
        $err = "Has de fer Login";
        $total = 0;
        include __DIR__ . '/../view/view_paginaCabas.php';
    } else {
    include __DIR__ . '/../view/view_cabas.php';
}
}