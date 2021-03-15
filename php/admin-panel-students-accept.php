<?php
include "../php/config.php";
session_start();
$useremail = $_SESSION['useremail'];
$aid = $_SESSION['authenticator-id'];



$sid = $_SESSION['student-id'];

$query = 'UPDATE student SET s_status = 1 WHERE s_id = :sid';
$stmt = $con->prepare($query);
$stmt->execute(['sid'=>$sid]);
echo '<script> alert("Student Has Been Approved"); window.location.href = "../pages/admin-panel-students.php" </script>';
?>


