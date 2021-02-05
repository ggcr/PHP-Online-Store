<?php

require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__.'/../model/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = connectaBD();

    $email = $_POST["email"];
    $pass = $_POST["clau"];
    $ret = getLoginCredentialsDB($conn, $email);

    if(empty($ret) == true) {
        $valid = false;
    }
    else if (password_verify($pass, $ret[0]['password'])) {
        $valid = true;
        $_SESSION['user_id'] = $ret[0]['id'];
        $_SESSION['cart'] = array();
        header("Location: http://tdiw-j5.deic-docencia.uab.cat/index.php");
        die();
    } else {
        $valid = false;
    }
}

include __DIR__.'/../view/view_login.php';