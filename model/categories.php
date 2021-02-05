<?php

function getCategories($conn)
{
    $sql = "SELECT id, nom, img, descripcio FROM Categoria";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function validarDades($categories)
{
    $i = 0;
    foreach ($categories as $categoria) {
        $categories[$i]['id'] = htmlentities($categoria['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $categories[$i]['nom'] = htmlentities($categoria['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $categories[$i]['img'] = htmlentities($categoria['img'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $categories[$i]['descripcio'] = htmlentities($categoria['descripcio'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        ++$i;
    }
}