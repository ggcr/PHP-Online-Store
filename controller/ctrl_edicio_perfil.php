<?php

require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__.'/../model/user.php';
$conn=connectaBD();
$user=getALLDB($conn, $_SESSION['user_id'])[0];

$UPLOADS_FULL_PATH='/home/TDIW/tdiw-j5/public_html/fitxers/';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if ( $_POST["newpassword"]!=null) {
        if (password_verify($_POST["oldpassword"], $user['password']))
        {
            
            $password = $_POST["newpassword"];
        }
        else
        {
            include __DIR__.'/../view/view_edicio_incorrecte.php';
            return;
        }
    }
    else
        {
            $password=$user['password'];
        }

    $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $name =  $_POST["nom"];
    $name= htmlentities($name,ENT_QUOTES|ENT_HTML5,'UTF-8');
    $poblacio =  $_POST["poblacio"];
    $poblacio= htmlentities($poblacio,ENT_QUOTES|ENT_HTML5,'UTF-8');
    $cp =  $_POST["cp"];
    $cp= htmlentities($cp,ENT_QUOTES|ENT_HTML5,'UTF-8');
    $adreca =  $_POST["adreca"];
    $adreca= htmlentities($adreca,ENT_QUOTES|ENT_HTML5,'UTF-8');
    $imatgeName="";


    if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image']))
    {

        $imatgeName=$_SESSION['user_id'] . ".png";
        $imatgePath=sprintf('%s%s',$UPLOADS_FULL_PATH,$imatgeName);
        move_uploaded_file($_FILES['profile_image']['tmp_name'],$imatgePath);


    }


    updateUser($conn,$email,$name,$password,$poblacio,$cp,$adreca,$imatgeName,$_SESSION['user_id']);
    $user=getALLDB($conn, $_SESSION['user_id'])[0];
    include __DIR__.'/../view/view_edicio_correcte.php';
    return;
}
include __DIR__.'/../view/view_edicio_perfil.php';
