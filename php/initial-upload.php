<?php

session_start();

include "./config.php";
$student_id = $_SESSION['student-id'];

$file = $_FILES['testing']['name'];
$location = "../document-uploads/initial/";
$file_tmp = $_FILES['testing']['tmp_name'];
$newfilename = "$student_id.pdf";

try{
    move_uploaded_file($file_tmp,$location.$newfilename);
    echo "uploaded";
}

catch(PDOException $exception){
    echo $exception->getMessage();
}


?>