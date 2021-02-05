<?php


$prod_id = isset($_GET['prod_id']) ? $_GET['prod_id'] : null;
$display = isset($_GET['display']) ? $_GET['display'] : null;

require_once __DIR__ . '/../model/connectaDb.php';
require_once __DIR__ . '/../model/productes.php';
require_once __DIR__ . '/../model/comanda.php';


include __DIR__.'/../view/view_header.php';
