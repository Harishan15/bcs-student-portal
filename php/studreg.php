<?php
    include "./config.php";
    session_start();

    $nicnum = $_POST['nicnum'];
    $regnumber = $_POST['regnumber'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $contactnum = $_POST['contactnum'];

     if(isset($_POST['gender']))
    {
        $gender = $_POST['gender'];
    } 

    if ($gender==1){
        $gender_d = 'male';
    } else {
        $gender_d = 'female';
    }

    $file = $_FILES['sdp']['name'];
    $location = "../profile-pics/student-pp/";
    $file_tmp = $_FILES['sdp']['tmp_name'];
    $newfilename = "$nicnum.jpg";
    $newfilepath = "$location$nicnum.jpg";

    $imageName = $_SESSION['image-name'];

    try{
        $connection = new PDO("mysql:host=$servername;dbname=$dbname;",$username,$password);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO student(s_nic,s_sname,s_fname,s_phone,s_email,matrix_no,gender) VALUES(:nicnum,:surname,:firstname,:contactnum,:email,:regnumber,:gender)';
        $stmt = $connection -> prepare($sql);
        $stmt -> execute(['nicnum'=>$nicnum,'surname'=>$surname,'firstname'=>$firstname,'contactnum'=>$contactnum,'email'=>$email,'regnumber'=>$regnumber,'gender'=>$gender_d]);
        // move_uploaded_file($file_tmp,$location.$newfilename);
        copy($imageName, $newfilepath);

        echo '<script> window.location.href = "../index.php" </script>';

    }

    catch(PDOException $e){
        echo "die";
    }

?>