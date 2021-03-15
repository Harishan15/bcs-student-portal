<?php

session_start();

include "./config.php";

$adminemail = $_POST['adminemail'];
$adminpassword = $_POST['adminpassword'];

$_SESSION['adminemail'] = $adminemail;

$query1 = 'SELECT a_password from authenticator WHERE a_email = :aemail';
$stmt1 = $con->prepare($query1);
$stmt1->execute(['aemail'=>$adminemail]);
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$password = $row1['a_password'];

try {
    if($adminpassword == NULL){
        echo "Type the Password";
    }else if($adminemail == NULL){
        echo "Type the Email";
    }else if($adminpassword == $password){
        echo '<script> window.location.href = "../pages/admin-panel.php" </script>';
    }else{
        echo "ERROR";
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}



?>