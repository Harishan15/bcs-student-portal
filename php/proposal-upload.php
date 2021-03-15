<?php

session_start();

include "./config.php";

//session variables
$useremail = $_SESSION['useremail'];
$sid = $_SESSION['student-id'];
$date = date("Y/m/d");

//inputs from the form
$project_title = $_POST['p_title'];
$project_level = $_POST['p_level'];
$submonth = $_POST['sub_month'];
$subyear = $_POST['sub_year'];
$attempt = $_POST['attempt'];

//file upload config
$file = $_FILES['upload']['name'];
$location = "../document-uploads/proposals/";
$file_tmp = $_FILES['upload']['tmp_name'];
$newfilename = "$sid.pdf";

$_SESSION['propfilename'] = $newfilename;

try{

    //insert into project table
    $sql = 'INSERT INTO project(p_title,p_level,submonth,subyear,attempt) VALUES(:p_title,:p_level,:submonth,:subyear,:attempt)';
    $stmt = $con -> prepare($sql);
    $stmt -> execute(['p_title'=>$project_title,'p_level'=>$project_level,'submonth'=>$submonth,'subyear'=>$subyear,'attempt'=>$attempt]);
    move_uploaded_file($file_tmp,$location.$newfilename);
    //insert into student_document table
    $sql = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path,bcs_approval) VALUES(:d_id,:p_id,:s_id,:sub_date,:doc_path,:bcs_approval)';
    $stmt = $con -> prepare($sql);

    //getting the last ID
    $query8 = "SELECT * FROM project WHERE p_id=(SELECT MAX(p_id) FROM project)";
    $stmt8 = $con->prepare($query8);
    $stmt8->execute();
    $row8 = $stmt8->fetch(PDO::FETCH_ASSOC);
    $prid = $row8['p_id'];
    $d_id = 1;
    $stmt -> execute(['d_id'=>$d_id,'p_id'=>$prid,'s_id'=>$sid,'sub_date'=>$date,'doc_path'=>$location.$newfilename,'bcs_approval'=>1]);
    echo '<script> alert("Proposal Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';

}

catch(PDOException $exception){
    echo $exception->getMessage();
}

    $_SESSION['project-id'] = $prid;



?>