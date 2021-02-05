<?php

function getProductes($conn, $categoria_id)
{
    $sql = "SELECT id, nom, categoria_id, imgRoute, descripcio, preu FROM Producte WHERE categoria_id = :categoria_id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue('categoria_id', $categoria_id);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProducte($conn, $prod_id)
{
    $sql = "SELECT id, nom, categoria_id, imgRoute, descripcio, preu FROM Producte WHERE id = :prod_id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue('prod_id', $prod_id);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function cercarProducte($conn, $cerca)
{

    $sql = "SELECT id, nom, categoria_id, imgRoute, descripcio, preu FROM Producte WHERE nom LIKE :cerca OR descripcio LIKE :cerca";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue('cerca', $cerca);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}