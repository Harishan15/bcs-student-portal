<?php
include "../php/config.php";
session_start();
// $useremail = $_SESSION['useremail'];
// $aid = $_SESSION['authenticator-id'];



$aid = $_SESSION['authenticator-id'];

$query = 'UPDATE authenticator SET a_status = 1 WHERE a_id = :aid';
$stmt = $con->prepare($query);
$stmt->execute(['aid'=>$aid]);
echo '<script> alert("Authenticator Has Been Approved"); window.location.href = "../pages/admin-panel-authenticators.php" </script>';
?>


