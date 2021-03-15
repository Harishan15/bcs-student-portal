<?php
include "../php/config.php";
session_start();

$aid = $_SESSION['authenticator-id'];

$query = 'DELETE FROM authenticator WHERE a_id = :aid';
$stmt = $con->prepare($query);
$stmt->execute(['aid'=>$aid]);
echo '<script> alert("Authenticator Has been Rejected"); window.location.href = "../pages/admin-panel-authenticators.php" </script>';
?>


