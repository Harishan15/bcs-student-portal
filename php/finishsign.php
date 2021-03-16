<?php
session_start();
include "./config.php";
$useremail = $_SESSION['useremail'];


$newpassword = $_POST['newpassword'];
$confirmpassword = $_POST['confirmpassword'];


$query1 = "SELECT s_email FROM student WHERE s_email = ?";
$stmt1 = $con->prepare($query1);
$stmt1->bindParam(1, $useremail);
$stmt1->execute();
if ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    $semail = $row1['s_email'];
}

$query2 = "SELECT a_email FROM authenticator WHERE a_email = ?";
$stmt2 = $con->prepare($query2);
$stmt2->bindParam(1, $useremail);
$stmt2->execute();
if ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $aemail = $row2['a_email'];
}

if(!isset($semail)){
    $semail = "";
} elseif (!isset($aemail)) {
    $aemail = "";
}

try{
    if($semail == $useremail and $newpassword == $confirmpassword){
            $query3 = 'UPDATE student SET s_password = ? WHERE s_email = ?';
            $stmt3 = $con -> prepare($query3);
            $stmt3->bindParam(1,$confirmpassword);
            $stmt3->bindParam(2,$useremail);
            $stmt3->execute();
            echo "1";
            // echo '<script> alert("Password Updated"); window.location.href = "../pages/signinpass.php" </script>';
    }else if($aemail == $useremail and $newpassword == $confirmpassword){
            $query4 = 'UPDATE authenticator SET a_password = ? WHERE a_email = ?';
            $stmt4 = $con -> prepare($query4);
            $stmt4->bindParam(1,$confirmpassword);
            $stmt4->bindParam(2,$useremail);
            $stmt4->execute();
            echo "2";
            // echo '<script> alert("Password Updated"); window.location.href = "../pages/signinpass.php" </script>';
        } else {
            echo "3";
            // echo "Sorry, try next time";
        }
    }  

catch(PDOException $e){
    echo "error";
}

?>