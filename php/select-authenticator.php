<?php
session_start();
include "./config.php";

//$auth = $_SESSION['auth'];
$aid = $_SESSION['authenticator-id'];
$authid = $_SESSION['authid'];

try{
    echo '<script> alert("Authenticator Selected \n Wait Till Authenticator Accepts"); window.location.href = "../pages/student-dashboardv3.php" </script>';

}

catch(PDOException $exception){
    $exception -> getMessage();
}


?>