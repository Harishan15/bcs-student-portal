<?php
include "../php/config.php";
session_start();

$sid = $_SESSION['student-id'];

$query = 'DELETE FROM student WHERE s_id = :sid';
$stmt = $con->prepare($query);
$stmt->execute(['sid'=>$sid]);
echo '<script> alert("Student Has been Rejected"); window.location.href = "../pages/admin-panel-students.php" </script>';




?>


