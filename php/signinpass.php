<?php

include "./config.php";
session_start();

$userpassword = $_POST['userpassword'];
$useremail = $_SESSION['useremail'];
// $aid = $_SESSION['authenticator-id'];
// $sid = $_SESSION['student-id'];

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

// checking the password of the student
$query1 = "SELECT s_password FROM student WHERE s_email = ?";
$stmt1 = $con->prepare($query1);
$stmt1->bindParam(1, $useremail);
$stmt1->execute();
if ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    $spassword = $row1['s_password'];
}

// checking the password of the authenticator
$query2 = "SELECT a_password FROM authenticator WHERE a_email = ?";
$stmt2 = $con->prepare($query2);
$stmt2->bindParam(1, $useremail);
$stmt2->execute();
if ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $apassword = $row2['a_password'];
}

$query1 = "SELECT s_email FROM student WHERE s_password = ?";
$stmt1 = $con->prepare($query1);
$stmt1->bindParam(1, $userpassword);
$stmt1->execute();
if ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    $semail = $row1['s_email'];
}

$query2 = "SELECT a_email FROM authenticator WHERE a_password = ?";
$stmt2 = $con->prepare($query2);
$stmt2->bindParam(1, $userpassword);
$stmt2->execute();
if ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $aemail = $row2['a_email'];
}


if(!isset($semail)){
    $semail = "";
}
if (!isset($aemail)) {
    $aemail = "";
}
if (!isset($spassword)) {
    $spassword = "";
}

try{
    // Password Checking
    if ($useremail == ($semail || $aemail)) {
        // account available
        if ($userpassword == $spassword) {
            // It's Student
            echo "1";
            // echo '<script> window.location.href = "../pages/student-dashboardv3.php" </script>'; // Send the user to student-dashboardv3.php
        } else if ($userpassword == $apassword) {
            // It's Authenticator
            echo "2";
            // echo '<script> window.location.href = "../pages/authenticator-dashboardv3.php" </script>'; // Send the user to authenticator-dashboardv3.php
        } else {
            //Incorrect password
            echo "3";
            // echo '<script> alert("Password is Incorrect"); window.location.href = "../pages/signinpass.php" </script>';
        }
    } else {
        // account not available
        echo "4";
        // echo json_encode('Sorry, Some errors occured');
    }

    // if($userpassword == NULL){
    //     echo '<script> alert("Password cannot be empty"); window.location.href = "../pages/signinpass.php" </script>';
    // }else{
    //     if($userpassword == $spassword){
    //         // header("Location: ../pages/studdash.php");
    //         echo '<script> window.location.href = "../pages/student-dashboardv3.php" </script>';
    //     }else if($userpassword == $apassword){
    //         echo '<script> window.location.href = "../pages/authenticator-dashboardv3.php" </script>';
    //     }else{
    //         echo '<script> alert("Password is Incorrect"); window.location.href = "../pages/signinpass.php" </script>';
    //     }
    // }  
}
// show error
catch(PDOException $e){
    echo 'Some Error occured';
}


?>