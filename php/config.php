<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'bcs_student_portal';

    try {
        $con = new PDO("mysql:host={$servername};dbname={$dbname}", $username, $password);
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
      
    // show error
    catch(PDOException $exception){
        echo "Connection error: " . $exception->getMessage();
    }
?>