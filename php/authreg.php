<?php
    include "./config.php";
    session_start();

    $nicnum = $_POST['nicnum'];
    $title = $_POST['title'];
    $firstname = $_POST['fname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $contactnum = $_POST['contactnum'];
    $employer = $_POST['employer'];
    $highestqual = $_POST['highestqual'];
    $designation = $_POST['designation'];
    $experience = $_POST['exp'];

    $file = $_FILES['adp']['name'];
    $location = "../profile-pics/authenticator-pp/";
    $file_tmp = $_FILES['adp']['tmp_name'];
    $newfilename = "$nicnum.jpg";
    $newfilepath = "$location$nicnum.jpg";

    $_SESSION['anic'] = $nicnum;
    $imageName = $_SESSION['image-name'];

    try{
        $connection = new PDO("mysql:host=$servername;dbname=$dbname;",$username,$password);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO authenticator(a_nic,a_sname,a_fname,a_phone,a_email,title,designation,employer,h_qual,experience) 
                VALUES(:nicnum,:surname,:firstname,:contactnum,:email,:title,:designation,:employer,:h_qual,:experience)';
        $stmt = $connection -> prepare($sql);
        $stmt -> execute(['nicnum'=>$nicnum,'surname'=>$surname,'firstname'=>$firstname,'contactnum'=>$contactnum,'email'=>$email,'title'=>$title,'designation'=>$designation,'employer'=>$employer,'h_qual'=>$highestqual,'experience'=>$experience]);
        // move_uploaded_file($file_tmp,$location.$newfilename);      
        copy($imageName, $newfilepath);

        echo '<script> window.location.href = "../index.php" </script>';
    }

    catch(PDOException $e){
        echo "die";
    }

?>