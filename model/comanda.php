<?php

function getComandaUser($conn) {
    $sql = "SELECT id, data_creacio, num_elements, import_total, usuari_id FROM Comanda WHERE usuari_id = :user_id
            ORDER BY data_creacio DESC LIMIT 1";

    $stmt = $conn->prepare($sql);

    if(isset($_SESSION['user_id'])) {
        $stmt->bindValue('user_id', $_SESSION['user_id']);
    }
    else {
        $stmt->bindValue('user_id', null);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllComandesUser($conn) {
    $sql = "SELECT id, data_creacio, num_elements, import_total, usuari_id FROM Comanda WHERE usuari_id = :user_id
            ORDER BY data_creacio DESC";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue('user_id', $_SESSION['user_id']);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllProdsComanda($conn, $comandes) {
    $prods = array();
    foreach ($comandes as $comanda) {
        $sql = "SELECT nom_producte, quantitat, preu_unitari, preu_total, comanda_id, producte_id FROM linia_comanda WHERE comanda_id = :comanda_id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue('comanda_id', $comanda['id']);

        $stmt->execute();
        array_push($prods,$stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    return $prods;
}

function crearComanda($conn, $n_elements, $total) {
    $sql = "INSERT INTO Comanda (data_creacio, num_elements, import_total, usuari_id) VALUES (:data_creacio, :num_elements, :import_total, :usuari_id)";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue('data_creacio', date("Y-m-d H:i:s"));
    $stmt->bindValue('num_elements', $n_elements);
    $stmt->bindValue('import_total', $total);

    if(isset($_SESSION['user_id'])) {
        $stmt->bindValue('usuari_id', $_SESSION['user_id']);
    }

    if($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function guardarItemsComanda($conn, $comandaUser) {
    foreach ($_SESSION['cart'] as $producte) {
        $sql = "INSERT INTO linia_comanda (nom_producte, quantitat, preu_unitari, preu_total, comanda_id, producte_id) VALUES (:nom_producte, :quantitat, :preu_unitari, :preu_total, :comanda_id, :producte_id)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue('nom_producte', $producte['nom']);
        $stmt->bindValue('quantitat', $producte['quant']);
        $stmt->bindValue('preu_unitari', $producte['preu_uni']);
        $stmt->bindValue('preu_total', $producte['preu_total']);
        $stmt->bindValue('comanda_id', $comandaUser[0]['id']);
        $stmt->bindValue('producte_id', $producte['id']);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

function guardarProducteCabas($conn, $producte, $comandaUser)
{
    $sql = "INSERT INTO linia_comanda (nom_producte, quantitat, preu_unitari, preu_total, comanda_id, producte_id) VALUES (:nom_producte, :quantitat, :preu_unitari, :preu_total, :comanda_id, :producte_id)";

    $stmt = $conn->prepare($sql);

    $quantitat = 1;

    $stmt->bindValue('nom_producte', $producte[0]['nom']);
    $stmt->bindValue('quantitat', $quantitat);
    $stmt->bindValue('preu_unitari', $producte[0]['preu']);
    $stmt->bindValue('preu_total', $producte[0]['preu'] * $quantitat);
    $stmt->bindValue('comanda_id', $comandaUser[0]['id']);
    $stmt->bindValue('producte_id', $producte[0]['id']);

    $stmt->execute();
}

function cercarProducteCabasRepetit($producte, $prod_quant) {
    $arrlength = count($_SESSION['cart']);

    for($i = 0; $i < $arrlength; $i++) {
        if($_SESSION['cart'][$i]['id'] == $producte[0]['id']) {
            $_SESSION['cart'][$i]['quant'] = $_SESSION['cart'][$i]['quant'] + $prod_quant;
            $_SESSION['cart'][$i]['preu_total'] = $_SESSION['cart'][$i]['quant'] * $_SESSION['cart'][$i]['preu_uni'];
            return true;
        }
    }
    return false;
}

function guardarProducteCabasSesion($producte, $prod_quant)
{
    array_push($_SESSION['cart'], array(
        'id' => $producte[0]['id'],
        'nom' => $producte[0]['nom'],
        'quant' => $prod_quant,
        'preu_uni'  => $producte[0]['preu'],
        'preu_total' => $producte[0]['preu'] * $prod_quant
    ));
}

function countCartElements() {
    return count($_SESSION['cart']);
}

function calcularTotalCabas()
{
    $total = 0;
    foreach ($_SESSION['cart'] as $producte) {
        $total += $producte['preu_total'];
    }
    return $total;
}

function buidaCabas()
{
    $_SESSION['cart'] = array();
}

function updateQuantCabas($prod_pos, $prod_quant) {
    $_SESSION['cart'][$prod_pos]['quant'] = $prod_quant;
    $_SESSION['cart'][$prod_pos]['preu_total'] = $_SESSION['cart'][$prod_pos]['preu_uni'] * $prod_quant;
}

function deleteProd($prod_pos) {
    unset ($_SESSION["cart"][$prod_pos]);
}

