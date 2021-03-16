<?php
session_start();
include "./config.php";

//$auth = $_SESSION['auth'];
// $aid = $_SESSION['authenticator-id'];
$authid = $_SESSION['authid'];

if (isset($_SESSION['authenticator-id'])) {
    $aid = $_SESSION['authenticator-id'];
    $_SESSION['authenticator-id'] = $aid;

    // echo("AID <br/>");
    // echo($aid);
}
if (isset($_SESSION['student-id'])) {
    $sid = $_SESSION['student-id'];
    $_SESSION['student-id'] = $sid;

    // echo("SID <br/>");
    // echo($sid);
}

try{
    echo '<script> alert("Authenticator Selected \n Wait Till Authenticator Accepts"); window.location.href = "../pages/student-dashboardv3.php" </script>';

}

catch(PDOException $exception){
    $exception -> getMessage();
}


?>