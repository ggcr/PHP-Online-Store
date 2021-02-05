<?php

require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__ . '/../model/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $name =  $_POST["nom"];
    $isName = ctype_alpha(str_replace(' ', '', $name));
    $name= htmlentities($name,ENT_QUOTES|ENT_HTML5,'UTF-8');
    $email =  $_POST["email"];
    $isEmail = filter_var($email,FILTER_VALIDATE_EMAIL)!==false;
    $password =  $_POST["password"];
    $isPassword = ctype_alnum($password);
    $poblacio =  $_POST["poblacio"];
    $isPoblacio = ctype_alnum(str_replace(' ', '', $poblacio)) and strlen($poblacio)<30;
    $poblacio= htmlentities($poblacio,ENT_QUOTES|ENT_HTML5,'UTF-8');
    $cp =  $_POST["cp"];
    $isCP = ctype_digit($cp) and strlen($cp)==5 ;
    $cp= htmlentities($cp,ENT_QUOTES|ENT_HTML5,'UTF-8');
    $adreca =  $_POST["adreca"];
    $isAdreca = ctype_alnum(str_replace(' ', '', $adreca)) and strlen($adreca)<30;
    $adreca= htmlentities($adreca,ENT_QUOTES|ENT_HTML5,'UTF-8');


    if ($isName and $isEmail and $isAdreca and $isPassword and $isPoblacio and $isCP)
    {
        $conn = connectaBD();
        $ret = registerToDb($conn, $name, $email, $password, $poblacio, $cp, $adreca);
        require __DIR__.'/../view/view_registre_resultat.php';
        return;
    }



}

require __DIR__.'/../view/view_registre.php';
