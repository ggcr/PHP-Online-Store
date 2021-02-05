<?php

require_once __DIR__ . '/../model/connectaDb.php';
require_once __DIR__ . '/../model/productes.php';
require __DIR__.'/../view/view_search.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $cerca = '%' . $_POST["buscador"] . '%';
    $conn = connectaBD();
    $productes = cercarProducte($conn, $cerca);

    include __DIR__ . '/../view/view_productes.php';
}
