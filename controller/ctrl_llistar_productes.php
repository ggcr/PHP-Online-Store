<?php

$categoria_id = isset($_GET['categoria_id']) ? $_GET['categoria_id'] :  null;

require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__.'/../model/productes.php';

$conn = connectaBD();
$productes = getProductes($conn, $categoria_id);

include __DIR__.'/../view/view_productes.php';