<?php
session_start();
include "./config.php";

$useremail = $_SESSION['useremail'];
$sid = $_SESSION['student-id'];

$query2 = "SELECT p_id FROM student_document WHERE s_id = ?";
$stmt2 = $con->prepare($query2);
$stmt2->bindParam(1, $sid);
$stmt2->execute();
if ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $pid = $row2['p_id'];
}

$query1 = "SELECT s_fname,s_nic FROM student WHERE s_email = ?";
$stmt1 = $con->prepare($query1);
$stmt1->bindParam(1, $useremail);
$stmt1->execute();
if ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    $sfname = $row1['s_fname'];
    $snic = $row1['s_nic'];
}

$query3 = "SELECT a_id,approval FROM student_authenticator WHERE s_id = :sid AND d_id = :did";
$stmt3 = $con->prepare($query3);
$stmt3->execute(['sid' => $sid, 'did' => 1]);
if ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
    $aid = $row3['a_id'];
    $approval = $row3['approval'];
}

$query4 = 'SELECT bcs_approval FROM student_document WHERE s_id = :sid AND d_id = :did';
$stmt4 = $con->prepare($query4);
$stmt4->execute(['sid' => $sid, 'did' => 1]);
if ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
    $bcs_approval = $row4['bcs_approval'];
}

$query5 = 'SELECT auth_approval FROM student_authenticator WHERE s_id = :sid AND a_id = :aid';
$stmt5 = $con->prepare($query5);
if($isTouch = isset($aid)){
    $stmt5->execute(['sid' => $sid, 'aid' => $aid]);
}
if ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) {
    $auth_approval = $row5['auth_approval'];
}


// 

// if (!isset($bcs_approval)) {
//     $bcs_approval = "";
// }

// if (!isset($approval)) {
//     $approval = "";
// }



if (isset($_POST['authenticator'])) {
    if (!isset($pid) and !isset($aid)) {
        echo "1";
        // echo "<script> Swal.fire({ icon: 'info', title: 'First Upload your Proposal', showConfirmButton: true,}) </script>";
    } else if (!isset($aid)) {
        echo "2";
        // echo '<script>window.location.href = "../pages/select-authenticator.php";</script>';
    } else if ($auth_approval == 0) {
        echo "3";
        // echo "<script> Swal.fire({ icon: 'info', title: 'Wait till authenticator approves', showConfirmButton: true,}) </script>";
    } else if ($auth_approval == 1) {
        echo "4";
        // echo '<script>window.location.href = "../pages/authenticator-profile.php";</script>';
    }
} else if (isset($_POST['project'])) {
    if (!isset($pid)) {
        echo "4.5";
    } else {
        if (isset($pid) and !isset($approval)) {
            echo "5";
            // echo "<script> Swal.fire({ icon: 'info', title: 'Proposal is Already uploaded, Now select an Authenticator', showConfirmButton: true,}) </script>";
        } else if (isset($pid) or $bcs_approval == 0 or $approval == 0) {
            echo "6";
            // echo '<script>window.location.href = "../pages/proposal-upload.php";</script>';
        } else if ($approval == 1 and $bcs_approval == 1) {
            echo "7";
            // echo "<script> Swal.fire({ icon: 'info', title: 'Wait till Authenticator approves your proposal', showConfirmButton: true,}) </script>";
        } else if ($bcs_approval == 1 and $approval == 2) {
            echo "8";
            // echo "<script> Swal.fire({ icon: 'info', title: 'Wait till BCS approves your proposal', showConfirmButton: true,}) </script>";
        } else if ($bcs_approval == 2 and $approval == 2) {
            echo "9";
            // echo '<script>window.location.href = "../pages/report-chapters-upload.php";</script>';
        } else if (isset($pid) and $aid == NULL) {
            echo "10";
            // echo "<script> Swal.fire({ icon: 'info', title: 'Select an Authenticator', showConfirmButton: true,}) </script>";
        }
    }
} else if (isset($_POST['discuss'])) {
    echo "11";
    // echo "<script> Swal.fire({ icon: 'info', title: 'The feature is still not available', showConfirmButton: true,}) </script>";
} else if (isset($_POST['meeting'])) {
    echo "12";
    // echo "<script> Swal.fire({ icon: 'info', title: 'The feature is still not available', showConfirmButton: true,}) </script>";
} else if (isset($_POST['logout'])) {
    session_destroy();
    echo "13";
    // echo "<script> Swal.fire({ icon: 'info', title: 'Signing out', showConfirmButton: false,}), setTimeout(function(){window.location.href = '../index.php';},1500);</script>";
} 





?>