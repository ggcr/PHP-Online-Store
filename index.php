<?php

session_start();

$action = isset($_GET['action']) ? $_GET['action'] :  null;
$UPLOADS_PUBLIC_PATH='/fitxers/';
switch($action) {
    case 'categories':
        require __DIR__ . '/resources/rsrc_llistar_categories.php' ;
        break;
    case 'productes':
        require __DIR__ . '/resources/rsrc_llistar_productes.php' ;
        break;
    case 'producte':
        require __DIR__ . '/resources/rsrc_detall_producte.php' ;
        break;
    case 'login':
        require __DIR__ . '/resources/rsrc_login.php' ;
        break;
    case 'logout':
        require __DIR__ . '/controller/ctrl_logout.php' ;
        require __DIR__ . '/resources/rsrc_llistar_categories.php' ;
        break;
    case 'register':
        require __DIR__ . '/resources/rsrc_register.php' ;
        break;
    case 'search':
        require __DIR__ . '/resources/rsrc_search.php' ;
        break;
    case 'cabas':
        require __DIR__ . '/resources/rsrc_cabas.php' ;
        break;
    case 'pagina_cabas':
        require __DIR__ . '/resources/rsrc_pagina_cabas.php' ;
        break;
    case 'confirmacio':
        require __DIR__ . '/resources/rsrc_confirmacio.php' ;
        break;
    case 'pedidos':
        require __DIR__ . '/resources/rsrc_mis_pedidos.php' ;
        break;
    case 'edicio':
        require __DIR__ . '/resources/rsrc_edicio_perfil.php' ;
        break;
    default:
        require __DIR__ . '/resources/rsrc_llistar_categories.php' ;
        break;
}


