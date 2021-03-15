<?php
include "../php/config.php";
session_start();
$sid = $_SESSION['student-id'];

if(isset($_POST['btn-1-accept'])){
    $query1 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt1 = $con->prepare($query1);
    $stmt1->execute(['sid'=>$sid,'did'=>1]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-1-reject'])){
    $query2 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt2 = $con->prepare($query2);
    $stmt2->execute(['sid'=>$sid,'did'=>1]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-2-accept'])){
    $query3 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt3 = $con->prepare($query3);
    $stmt3->execute(['sid'=>$sid,'did'=>2]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-2-reject'])){
    $query4 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt4 = $con->prepare($query4);
    $stmt4->execute(['sid'=>$sid,'did'=>2]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-3-accept'])){
    $query5 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt5 = $con->prepare($query5);
    $stmt5->execute(['sid'=>$sid,'did'=>3]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-3-reject'])){
    $query6 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt6 = $con->prepare($query6);
    $stmt6->execute(['sid'=>$sid,'did'=>3]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-4-accept'])){
    $query7 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt7 = $con->prepare($query7);
    $stmt7->execute(['sid'=>$sid,'did'=>4]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-4-reject'])){
    $query8 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt8 = $con->prepare($query8);
    $stmt8->execute(['sid'=>$sid,'did'=>4]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-5-accept'])){
    $query9 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt9 = $con->prepare($query9);
    $stmt9->execute(['sid'=>$sid,'did'=>5]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-5-reject'])){
    $query10 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt10 = $con->prepare($query10);
    $stmt10->execute(['sid'=>$sid,'did'=>5]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-6-accept'])){
    $query11 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt11 = $con->prepare($query11);
    $stmt11->execute(['sid'=>$sid,'did'=>6]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-6-reject'])){
    $query12 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt12 = $con->prepare($query12);
    $stmt12->execute(['sid'=>$sid,'did'=>6]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-7-accept'])){
    $query13 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt13 = $con->prepare($query13);
    $stmt13->execute(['sid'=>$sid,'did'=>7]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-7-reject'])){
    $query14 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt14 = $con->prepare($query14);
    $stmt14->execute(['sid'=>$sid,'did'=>7]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-8-accept'])){
    $query15 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt15 = $con->prepare($query15);
    $stmt15->execute(['sid'=>$sid,'did'=>8]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-8-reject'])){
    $query16 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt16 = $con->prepare($query16);
    $stmt16->execute(['sid'=>$sid,'did'=>8]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-9-accept'])){
    $query17 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt17 = $con->prepare($query17);
    $stmt17->execute(['sid'=>$sid,'did'=>9]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-9-reject'])){
    $query18 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt18 = $con->prepare($query18);
    $stmt18->execute(['sid'=>$sid,'did'=>9]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-10-accept'])){
    $query19 ='UPDATE student_authenticator SET approval = 2 WHERE s_id = :sid AND d_id = :did';
    $stmt19 = $con->prepare($query19);
    $stmt19->execute(['sid'=>$sid,'did'=>10]);
    echo '<script> alert("Document is Accepted"); window.location.href = "../pages/active-stud-change.php" </script>';


}else if(isset($_POST['btn-10-reject'])){
    $query20 ='UPDATE student_authenticator SET approval = 0 WHERE s_id = :sid AND d_id = :did';
    $stmt20 = $con->prepare($query20);
    $stmt20->execute(['sid'=>$sid,'did'=>10]);
    echo '<script> alert("Student will be Notified"); window.location.href = "../pages/active-stud-change.php" </script>';

}












?>