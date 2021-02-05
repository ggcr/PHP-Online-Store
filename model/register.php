<?php

function registerToDb($conn, $name, $email, $password, $poblacio, $cp, $adreca)
{
    $sql = "INSERT INTO Usuari (nom, email, password, poblacio, cp, adreca) VALUES (:nom, :email, :password, :poblacio, :cp, :adreca)";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue('nom', $name);
    $stmt->bindValue('email', $email);
    $stmt->bindValue('password', password_hash($password, PASSWORD_DEFAULT));
    $stmt->bindValue('poblacio', $poblacio);
    $stmt->bindValue('cp', $cp);
    $stmt->bindValue('adreca', $adreca);
    $stmt->execute();
}