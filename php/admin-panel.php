<?php

session_start();
include "./config.php";

if(isset($_POST['student-approve'])){
    echo '<script> window.location.href = "../pages/admin-panel-students.php" </script>';
}else if(isset($_POST['authenticator-approve'])){
    echo '<script> window.location.href = "../pages/admin-panel-authenticators.php" </script>';
}else if(isset($_POST['logout'])){
    session_destroy();
    echo '<script> alert("You Have Been Signed Out"); window.location.href = "../admin-signin.php" </script>';
}


?>