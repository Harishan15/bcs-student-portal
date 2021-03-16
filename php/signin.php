<?php

session_start();

include "./config.php";

$useremail = $_POST['useremail'];
$useremail = strtolower($useremail);
$_SESSION['useremail'] = $useremail;

try {
    // checking the email of the student
    $query1 = "SELECT s_email FROM student WHERE s_email = ?";
    $stmt1 = $con->prepare($query1);
    $stmt1->bindParam(1, $useremail);
    $stmt1->execute();
    if ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        $semail = $row1['s_email'];
        $semail = strtolower($semail); // changing to lowercase
    }

    // checking the email of the authenticator
    $query2 = "SELECT a_email FROM authenticator WHERE a_email = ?";
    $stmt2 = $con->prepare($query2);
    $stmt2->bindParam(1, $useremail);
    $stmt2->execute();
    if ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $aemail = $row2['a_email'];
        $aemail = strtolower($aemail); // changing to lowercase
    }

    // checking the status of the student
    $query3 = "SELECT s_status FROM student WHERE s_email = ?";
    $stmt3 = $con->prepare($query3);
    $stmt3->bindParam(1, $useremail);
    $stmt3->execute();
    if ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        $sstatus = $row3['s_status'];
    }

    // checking the status of the authenticator
    $query4 = "SELECT a_status FROM authenticator WHERE a_email = ?";
    $stmt4 = $con->prepare($query4);
    $stmt4->bindParam(1, $useremail);
    $stmt4->execute();
    if ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
        $astatus = $row4['a_status'];
    }

    // checking the password of the student
    $query5 = "SELECT s_password FROM student WHERE s_email = ?";
    $stmt5 = $con->prepare($query5);
    $stmt5->bindParam(1, $useremail);
    $stmt5->execute();
    if ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) {
        $spassword = $row5['s_password'];
    }

   // checking the password of the authenticator
    $query6 = "SELECT a_password FROM authenticator WHERE a_email = ?";
    $stmt6 = $con->prepare($query6);
    $stmt6->bindParam(1, $useremail);
    $stmt6->execute();
    if ($row6 = $stmt6->fetch(PDO::FETCH_ASSOC)) {
        $apassword = $row6['a_password'];
    }

    //getting the student id
    $query7 = "SELECT s_id,s_fname FROM student WHERE s_email = ?";
    $stmt7 = $con->prepare($query7);
    $stmt7->bindParam(1, $useremail);
    $stmt7->execute();
    if ($row7 = $stmt7->fetch(PDO::FETCH_ASSOC)) {
        $sid = $row7['s_id'];
        $sfirstname = $row7['s_fname'];
        $_SESSION['student-id'] = $sid;
        $_SESSION['sfname'] = $sfirstname;

    }

    //getting the student id
    $query8 = "SELECT a_id,a_fname FROM authenticator WHERE a_email = ?";
    $stmt8 = $con->prepare($query8);
    $stmt8->bindParam(1, $useremail);
    $stmt8->execute();
    if ($row8 = $stmt8->fetch(PDO::FETCH_ASSOC)) {
        $aid = $row8['a_id'];
        $afirstname = $row8['a_fname'];
        $_SESSION['authenticator-id'] = $aid;
        $_SESSION['afname'] = $afirstname;

    }

    //session variables
    $_SESSION['useremail'] = $useremail;

    if(!isset($semail)){
        $semail = "";
    } elseif (!isset($aemail)) {
        $aemail = "";
    }

    if ($useremail == ($semail || $aemail)) {
        // account available
        if ($useremail == $semail) {
            // Student's account
            if ($sstatus == 1) {
                //Admin approved
                if ($spassword == !NULL) {
                    //Password available
                    echo "1";
                    // echo '<script> window.location.href = "../pages/signinpass.php" </script>'; // Send the user to signinpass.php
                } else {
                    //Password not available
                    echo "2";
                    // echo '<script> window.location.href = "../pages/finishsign.php" </script>'; // Send the user to finishsignup.php
                }
            } else {
                //Admin not approved
                echo "3";
                // echo '<script> alert("Wait for the Admin Approval"); window.location.href = "../index.php" </script>'; // "Wait for admins approval"
            }
        } else if ($useremail == $aemail) {
            // Authenticator's account
            if ($astatus == 1) {
                //Admin approved
                if ($apassword == !NULL) {
                    //Password available
                    echo "4";
                    // echo '<script> window.location.href = "../pages/signinpass.php" </script>'; // Send the user to signinpass.php
                } else {
                    //Password not available
                    echo "5";
                    // echo '<script> window.location.href = "../pages/finishsign.php" </script>'; // Send the user to finishsignup.php
                }
            } else {
                //Admin not approved
                echo "6";
                // echo '<script> alert("Wait for the Admin Approval"); window.location.href = "../index.php" </script>'; // "Wait for admins approval"
            }
        }
    } else {
        // account not available
        echo "7";
        // echo '<script> alert("Account not available"); window.location.href = "../index.php" </script>'; // "Wait for admins approval"
    }
    
    
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}

?>