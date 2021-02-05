<?php

$prod_id = isset($_GET['prod_id']) ? $_GET['prod_id'] :  null;

require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__.'/../model/productes.php';

$conn = connectaBD();
$producte = getProducte($conn, $prod_id);

include __DIR__.'/../view/view_detall_producte.php';
