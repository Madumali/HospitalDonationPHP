<?php

session_start();
require_once('model/DBController.php');
require_once('model/Login/LoginCheck.php');
$_SESSION = array();

if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-86400,'/');
    session_destroy();

    header('Location:/HospitalDonation/view/loginSystem/userlog.php?logout=yes');
}


?>



