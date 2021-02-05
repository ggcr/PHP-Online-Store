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

function getLoginCredentialsDB($conn, $email)
{
    $sql = "SELECT id, email, password FROM Usuari WHERE email = :email";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue('email', $email);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getALLDB($conn, $id)
{
    $sql = "SELECT * FROM Usuari WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue('id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function updateUser($conn,$email,$name,$password,$poblacio,$cp,$adreca,$imatge_name,$id)
{
    $sql ="UPDATE Usuari SET email=:email, password=:password, nom=:nom,poblacio=:poblacio, cp=:cp, adreca=:adreca,image_name=:image_name WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue('nom', $name);
    $stmt->bindValue('email', $email);
    $stmt->bindValue('password', password_hash($password, PASSWORD_DEFAULT));
    $stmt->bindValue('poblacio', $poblacio);
    $stmt->bindValue('cp', $cp);
    $stmt->bindValue('adreca', $adreca);
    $stmt->bindValue('id', $id);
    $stmt->bindValue('image_name', $imatge_name);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}