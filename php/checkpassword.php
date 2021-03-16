<?php

session_start();

include "./config.php";

$userpassword = $_POST['userpassword'];
$useremail = $_SESSION['useremail'];


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

    //session variables
    // $_SESSION['student-id'] = $sid;
    // $_SESSION['authenticator-id'] = $aid;
    $_SESSION['useremail'] = $useremail;
    $_SESSION['userpassword'] = $userpassword;

    if(!isset($semail)){
        $semail = "";
        // echo("No S-email");
    }
    if (!isset($aemail)) {
        $aemail = "";
        // echo("No A-email");
    }
    if (!isset($spassword)) {
        $spassword = "";
        // echo("No S-email");
    }


    if ($useremail == ($semail || $aemail)) {
        // account available
        if ($userpassword == $spassword) {
            // It's Student
            echo json_encode(true); // Send the user to student-dashboardv3.php
            // echo json_encode('<script> window.location.href = "../pages/student-dashboardv3.php" </script>'); // Send the user to student-dashboardv3.php            
        } else if ($userpassword == $apassword) {
            // It's Authenticator
            echo json_encode(true); // Send the user to authenticator-dashboardv3.php
            // echo json_encode('<script> window.location.href = "../pages/authenticator-dashboardv3.php" </script>'); // Send the user to authenticator-dashboardv3.php            
        } else {
            //Incorrect password
            echo json_encode('Incorrect password'); // Send the user to authenticator-dashboardv3.php
        }
    } else {
        // account not available
        echo json_encode('Sorry, Some errors occured');
    }

} catch (PDOException $exception) {
    die('ERROR: ' . $exception->getMessage());
    echo "Not working";
}





?>