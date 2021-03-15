<?php

session_start();

include "./config.php";

//session variables
$useremail = $_SESSION['useremail'];
$sid = $_SESSION['student-id'];
$date = date("Y/m/d");

//inputs from the form
// $project_title = $_POST['p_title'];
// $project_level = $_POST['p_level'];
// $submonth = $_POST['sub_month'];
// $subyear = $_POST['sub_year'];
$attempt = $_POST['attempt'];

//file upload config
$file = $_FILES['re-upload']['name'];
$location = "../document-uploads/proposals/";
$file_tmp = $_FILES['re-upload']['tmp_name'];
$newfilename = "$sid.pdf";

$_SESSION['propfilename'] = $newfilename;

try{

    //insert into project table
    // $sql = 'UPDATE project SET attempt = :attempt WHERE s_id = :sid';
    // $stmt = $con -> prepare($sql);
    // $stmt -> execute(['attempt'=>$attempt,'sid'=>$sid]);
    move_uploaded_file($file_tmp,$location.$newfilename);
    //insert into student_document table
    $sql = 'UPDATE student_document SET sub_date = :sub_date AND doc_path = :doc_path WHERE s_id = :sid AND d_id = 1';
    $stmt = $con -> prepare($sql);
    $stmt -> execute(['sub_date'=>$date,'doc_path'=>$location.$newfilename,'sid'=>$sid]);

    $sql1 = 'UPDATE student_authenticator SET approval = 1 WHERE s_id = :sid AND d_id = :did';
    $stmt1 = $con -> prepare($sql1);
    $stmt1 -> execute(['sid'=>$sid,'did'=>1]);

    // //getting the last ID
    // $query8 = "SELECT * FROM project WHERE p_id=(SELECT MAX(p_id) FROM project)";
    // $stmt8 = $con->prepare($query8);
    // $stmt8->execute();
    // $row8 = $stmt8->fetch(PDO::FETCH_ASSOC);
    // $prid = $row8['p_id'];
    // $d_id = 1;
    
    echo '<script> alert("Proposal Re-Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';

}

catch(PDOException $exception){
    echo $exception->getMessage();
}

    // $_SESSION['project-id'] = $prid;



?>