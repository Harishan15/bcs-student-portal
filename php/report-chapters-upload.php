<?php
session_start();
include "./config.php";
$student_id = $_SESSION['student-id'];
//$project_id = $_SESSION['project-id'];
$date = date("Y/m/d");

$query55 = 'SELECT a_id,p_id FROM student_authenticator WHERE s_id = ?';
$stmt55 = $con -> prepare($query55);
$stmt55->bindParam(1,$student_id);
$stmt55->execute();
$row55 = $stmt55->fetch(PDO::FETCH_ASSOC);
$aid = $row55['a_id'];
$project_id = $row55['p_id'];

$rc = $_SESSION['row-count'];

try{
    if(isset($_FILES['initial']['name'])&&isset($_POST['submitbtn'])&&is_uploaded_file($_FILES['initial']['tmp_name'])){
        $file_initial = $_FILES['initial']['name'];
        $location_initial = "../document-uploads/initial/";
        $file_tmp_initial = $_FILES['initial']['tmp_name'];
        $newfilename_initial = "$student_id.pdf";

        $sql1 = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path) VALUES(:d_id1,:p_id1,:s_id1,:sub_date1,:doc_path1)';
        $sql11 = 'INSERT INTO student_authenticator(d_id,p_id,s_id,a_id,approval) VALUES(:d_id11,:p_id11,:s_id11,:a_id11,:approval11)';
        // change
        $sql111 = 'UPDATE student_document SET sub_date = :subdate WHERE d_id = :did AND s_id = :sid';
        $sql1111 = 'UPDATE student_authenticator SET approval = 1 WHERE d_id = :did AND s_id = :sid';
        // change

        $stmt1 = $con -> prepare($sql1);
        $stmt11 = $con -> prepare($sql11);
        // change
        $stmt111 = $con -> prepare($sql111);
        $stmt1111 = $con -> prepare($sql1111);
        // change

        $initialid = 2;
        
        if($rc==1){
        move_uploaded_file($file_tmp_initial,$location_initial.$newfilename_initial);
        $stmt1 -> execute(['d_id1'=>$initialid ,'p_id1'=>$project_id,'s_id1'=>$student_id,'sub_date1'=>$date,'doc_path1'=>$location_initial.$newfilename_initial]);
        $stmt11 -> execute(['d_id11'=>$initialid,'p_id11'=>$project_id,'s_id11'=>$student_id,'a_id11'=>$aid,'approval11'=>1]);
        echo '<script> alert("Initial Section Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }else if($rc==2){
        move_uploaded_file($file_tmp_initial,$location_initial.$newfilename_initial);
        $stmt111 -> execute(['subdate'=>$date,'did'=>$initialid,'sid'=>$student_id]);
        $stmt1111 -> execute(['did'=>$initialid,'sid'=>$student_id]);
        echo '<script> alert("Initial Re Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }
        
        
    }else if(isset($_FILES['intro-1']['name']) && isset($_POST['submitbtn'])&&is_uploaded_file($_FILES['intro-1']['tmp_name'])){
        $file_intro1 = $_FILES['intro-1']['name'];
        $location_intro1 = "../document-uploads/intro-1/";
        $file_tmp_intro1 = $_FILES['intro-1']['tmp_name'];
        $newfilename_intro1 = "$student_id.pdf";

        $sql2 = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path) VALUES(:d_id2,:p_id2,:s_id2,:sub_date2,:doc_path2)';
        $sql22 = 'INSERT INTO student_authenticator(d_id,p_id,s_id,a_id,approval) VALUES(:d_id22,:p_id22,:s_id22,:a_id22,:approval22)';
        // change
        $sql222 = 'UPDATE student_document SET sub_date = :subdate WHERE d_id = :did AND s_id = :sid';
        $sql2222 = 'UPDATE student_authenticator SET approval = 1 WHERE d_id = :did AND s_id = :sid';
        // change

        $stmt2 = $con -> prepare($sql2);
        $stmt22 = $con -> prepare($sql22);
        // change
        $stmt222 = $con -> prepare($sql222);
        $stmt2222 = $con -> prepare($sql2222);
        // change
        $introid = 3;
       
        if($rc==2){
        move_uploaded_file($file_tmp_intro1,$location_intro1.$newfilename_intro1);
        $stmt2 -> execute(['d_id2'=>$introid ,'p_id2'=>$project_id,'s_id2'=>$student_id,'sub_date2'=>$date,'doc_path2'=>$location_intro1.$newfilename_intro1]);
        $stmt22 -> execute(['d_id22'=>$introid,'p_id22'=>$project_id,'s_id22'=>$student_id,'a_id22'=>$aid,'approval22'=>1]);
        echo '<script> alert("Introduction Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }else if($rc==3){
        move_uploaded_file($file_tmp_intro1,$location_intro1.$newfilename_intro1);
        $stmt222 -> execute(['subdate'=>$date,'did'=>$introid,'sid'=>$student_id]);
        $stmt2222 -> execute(['did'=>$introid,'sid'=>$student_id]);
        echo '<script> alert("Introduction Re Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }
        
    }else if(isset($_FILES['analyze-2']['name'])&&isset($_POST['submitbtn'])&&is_uploaded_file($_FILES['analyze-2']['tmp_name'])){
        $file_analyze2 = $_FILES['analyze-2']['name'];
        $location_analyze2 = "../document-uploads/analyze-2/";
        $file_tmp_analyze2 = $_FILES['analyze-2']['tmp_name'];
        $newfilename_analyze2 = "$student_id.pdf";

        $sql3 = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path) VALUES(:d_id3,:p_id3,:s_id3,:sub_date3,:doc_path3)';
        $sql33 = 'INSERT INTO student_authenticator(d_id,p_id,s_id,a_id,approval) VALUES(:d_id33,:p_id33,:s_id33,:a_id33,:approval33)';
        // change
        $sql333 = 'UPDATE student_document SET sub_date = :subdate WHERE d_id = :did AND s_id = :sid';
        $sql3333 = 'UPDATE student_authenticator SET approval = 1 WHERE d_id = :did AND s_id = :sid';
        // change

        $stmt3 = $con -> prepare($sql3);
        $stmt33 = $con -> prepare($sql33);
        // change
        $stmt333 = $con -> prepare($sql333);
        $stmt3333 = $con -> prepare($sql3333);
        // change
     
        $analyzeid = 4;
        
        if($rc==3){
        move_uploaded_file($file_tmp_analyze2,$location_analyze2.$newfilename_analyze2);
        $stmt3 -> execute(['d_id3'=>$analyzeid ,'p_id3'=>$project_id,'s_id3'=>$student_id,'sub_date3'=>$date,'doc_path3'=>$location_analyze2.$newfilename_analyze2]);
        $stmt33 -> execute(['d_id33'=>$analyzeid,'p_id33'=>$project_id,'s_id33'=>$student_id,'a_id33'=>$aid,'approval33'=>1]);
        echo '<script> alert("Analyze Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }else if($rc==4){
        move_uploaded_file($file_tmp_analyze2,$location_analyze2.$newfilename_analyze2);
        $stmt333 -> execute(['subdate'=>$date,'did'=>$analyzeid,'sid'=>$student_id]);
        $stmt3333 -> execute(['did'=>$analyzeid,'sid'=>$student_id]);
        echo '<script> alert("Analyze Re Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }
     
    }else if(isset($_FILES['design-3']['name'])&&isset($_POST['submitbtn'])&&is_uploaded_file($_FILES['design-3']['tmp_name'])){
        $file_design3 = $_FILES['design-3']['name'];
        $location_design3 = "../document-uploads/design-3/";
        $file_tmp_design3 = $_FILES['design-3']['tmp_name'];
        $newfilename_design3 = "$student_id.pdf";

        $sql4 = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path) VALUES(:d_id4,:p_id4,:s_id4,:sub_date4,:doc_path4)';
        $sql44 = 'INSERT INTO student_authenticator(d_id,p_id,s_id,a_id,approval) VALUES(:d_id44,:p_id44,:s_id44,:a_id44,:approval44)';
        // change
        $sql444 = 'UPDATE student_document SET sub_date = :subdate WHERE d_id = :did AND s_id = :sid';
        $sql4444 = 'UPDATE student_authenticator SET approval = 1 WHERE d_id = :did AND s_id = :sid';
        // change

        $stmt4 = $con -> prepare($sql4);
        $stmt44 = $con -> prepare($sql44);
        // change
        $stmt444 = $con -> prepare($sql444);
        $stmt4444 = $con -> prepare($sql4444);
        // change
        $designid = 5;
        
        if($rc==4){
        move_uploaded_file($file_tmp_design3,$location_design3.$newfilename_design3);
        $stmt4 -> execute(['d_id4'=>$designid ,'p_id4'=>$project_id,'s_id4'=>$student_id,'sub_date4'=>$date,'doc_path4'=>$location_design3.$newfilename_design3]);
        $stmt44 -> execute(['d_id44'=>$designid,'p_id44'=>$project_id,'s_id44'=>$student_id,'a_id44'=>$aid,'approval44'=>1]);
        echo '<script> alert("Design Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }else if($rc==5){
        move_uploaded_file($file_tmp_design3,$location_design3.$newfilename_design3);
        $stmt444 -> execute(['subdate'=>$date,'did'=>$designid,'sid'=>$student_id]);
        $stmt4444 -> execute(['did'=>$designid,'sid'=>$student_id]);
        echo '<script> alert("Design Re Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }
      
    }else if(isset($_FILES['implement-4']['name'])&&isset($_POST['submitbtn'])&&is_uploaded_file($_FILES['implement-4']['tmp_name'])){
        $file_implement4 = $_FILES['implement-4']['name'];
        $location_implement4 = "../document-uploads/implement-4/";
        $file_tmp_implement4 = $_FILES['implement-4']['tmp_name'];
        $newfilename_implement4 = "$student_id.pdf";

        $sql5 = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path) VALUES(:d_id5,:p_id5,:s_id5,:sub_date5,:doc_path5)';
        $sql55 = 'INSERT INTO student_authenticator(d_id,p_id,s_id,a_id,approval) VALUES(:d_id55,:p_id55,:s_id55,:a_id55,:approval55)';
        // change
        $sql555 = 'UPDATE student_document SET sub_date = :subdate WHERE d_id = :did AND s_id = :sid';
        $sql5555 = 'UPDATE student_authenticator SET approval = 1 WHERE d_id = :did AND s_id = :sid';
        // change

        $stmt5 = $con -> prepare($sql5);
        $stmt55 = $con -> prepare($sql55);
        // change
        $stmt555 = $con -> prepare($sql555);
        $stmt5555 = $con -> prepare($sql5555);
        // change
        $implementid = 6;
        
        if($rc==5){
        move_uploaded_file($file_tmp_implement4,$location_implement4.$newfilename_implement4);
        $stmt5 -> execute(['d_id5'=>$implementid ,'p_id5'=>$project_id,'s_id5'=>$student_id,'sub_date5'=>$date,'doc_path5'=>$location_implement4.$newfilename_implement4]);
        $stmt55 -> execute(['d_id55'=>$implementid,'p_id55'=>$project_id,'s_id55'=>$student_id,'a_id55'=>$aid,'approval55'=>1]);
        echo '<script> alert("Implement Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }else if($rc==6){
        move_uploaded_file($file_tmp_implement4,$location_implement4.$newfilename_implement4);
        $stmt555 -> execute(['subdate'=>$date,'did'=>$implementid,'sid'=>$student_id]);
        $stmt5555 -> execute(['did'=>$implementid,'sid'=>$student_id]);
        echo '<script> alert("Implement Re Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }
    
    }else if(isset($_FILES['testing-5']['name'])&&isset($_POST['submitbtn'])&&is_uploaded_file($_FILES['testing-5']['tmp_name'])){
        $file_testing5 = $_FILES['testing-5']['name'];
        $location_testing5 = "../document-uploads/testing-5/";
        $file_tmp_testing5 = $_FILES['testing-5']['tmp_name'];
        $newfilename_testing5 = "$student_id.pdf";

        $sql6 = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path) VALUES(:d_id6,:p_id6,:s_id6,:sub_date6,:doc_path6)';
        $sql66 = 'INSERT INTO student_authenticator(d_id,p_id,s_id,a_id,approval) VALUES(:d_id66,:p_id66,:s_id66,:a_id66,:approval66)';
        // change
        $sql666 = 'UPDATE student_document SET sub_date = :subdate WHERE d_id = :did AND s_id = :sid';
        $sql6666 = 'UPDATE student_authenticator SET approval = 1 WHERE d_id = :did AND s_id = :sid';
        // change

        $stmt6 = $con -> prepare($sql6);
        $stmt66 = $con -> prepare($sql66);
        // change
        $stmt666 = $con -> prepare($sql666);
        $stmt6666 = $con -> prepare($sql6666);
        // change

        $testingid = 7;
        
        if($rc==6){
        move_uploaded_file($file_tmp_testing5,$location_testing5.$newfilename_testing5);
        $stmt6 -> execute(['d_id6'=>$testingid ,'p_id6'=>$project_id,'s_id6'=>$student_id,'sub_date6'=>$date,'doc_path6'=>$location_testing5.$newfilename_testing5]);
        $stmt66 -> execute(['d_id66'=>$testingid,'p_id66'=>$project_id,'s_id66'=>$student_id,'a_id66'=>$aid,'approval66'=>1]);
        echo '<script> alert("Testing Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }else if($rc==7){
        move_uploaded_file($file_tmp_testing5,$location_testing5.$newfilename_testing5);
        $stmt666 -> execute(['subdate'=>$date,'did'=>$testingid,'sid'=>$student_id]);
        $stmt6666 -> execute(['did'=>$testingid,'sid'=>$student_id]);
        echo '<script> alert("Testing Re Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }
 
    }else if(isset($_FILES['critical-6']['name'])&&isset($_POST['submitbtn'])&&is_uploaded_file($_FILES['critical-6']['tmp_name'])){
        $file_critical6 = $_FILES['critical-6']['name'];
        $location_critical6 = "../document-uploads/critical-6/";
        $file_tmp_critical6 = $_FILES['critical-6']['tmp_name'];
        $newfilename_critical6 = "$student_id.pdf";

        $sql7 = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path) VALUES(:d_id7,:p_id7,:s_id7,:sub_date7,:doc_path7)';
        $sql77 = 'INSERT INTO student_authenticator(d_id,p_id,s_id,a_id,approval) VALUES(:d_id77,:p_id77,:s_id77,:a_id77,:approval77)';
        // change
        $sql777 = 'UPDATE student_document SET sub_date = :subdate WHERE d_id = :did AND s_id = :sid';
        $sql7777 = 'UPDATE student_authenticator SET approval = 1 WHERE d_id = :did AND s_id = :sid';
        // change

        $stmt7 = $con -> prepare($sql7);
        $stmt77 = $con -> prepare($sql77);
        // change
        $stmt777 = $con -> prepare($sql777);
        $stmt7777 = $con -> prepare($sql7777);
        // change
        $criticalid = 8;
        
        if($rc==7){
        move_uploaded_file($file_tmp_critical6,$location_critical6.$newfilename_critical6);
        $stmt7 -> execute(['d_id7'=>$criticalid ,'p_id7'=>$project_id,'s_id7'=>$student_id,'sub_date7'=>$date,'doc_path7'=>$location_critical6.$newfilename_critical6]);
        $stmt77 -> execute(['d_id77'=>$criticalid,'p_id77'=>$project_id,'s_id77'=>$student_id,'a_id77'=>$aid,'approval77'=>1]);
        echo '<script> alert("Critical Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }else if($rc==8){
        move_uploaded_file($file_tmp_critical6,$location_critical6.$newfilename_critical6);
        $stmt777 -> execute(['subdate'=>$date,'did'=>$criticalid,'sid'=>$student_id]);
        $stmt7777 -> execute(['did'=>$criticalid,'sid'=>$student_id]);
        echo '<script> alert("Critical Re Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }
    
    }else if(isset($_FILES['finalsection']['name'])&&isset($_POST['submitbtn'])&&is_uploaded_file($_FILES['finalsection']['tmp_name'])){
        $file_finalsection = $_FILES['finalsection']['name'];
        $location_finalsection = "../document-uploads/finalsection/";
        $file_tmp_finalsection = $_FILES['finalsection']['tmp_name'];
        $newfilename_finalsection = "$student_id.pdf";

        $sql8 = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path) VALUES(:d_id8,:p_id8,:s_id8,:sub_date8,:doc_path8)';
        $sql88 = 'INSERT INTO student_authenticator(d_id,p_id,s_id,a_id,approval) VALUES(:d_id88,:p_id88,:s_id88,:a_id88,:approval88)';
        // change
        $sql888 = 'UPDATE student_document SET sub_date = :subdate WHERE d_id = :did AND s_id = :sid';
        $sql8888 = 'UPDATE student_authenticator SET approval = 1 WHERE d_id = :did AND s_id = :sid';
        // change

        $stmt8 = $con -> prepare($sql8);
        $stmt88 = $con -> prepare($sql88);
        // change
        $stmt888 = $con -> prepare($sql888);
        $stmt8888 = $con -> prepare($sql8888);
        // change

        $finalsectionid = 9;
        
        if($rc==8){
        move_uploaded_file($file_tmp_finalsection,$location_finalsection.$newfilename_finalsection);
        $stmt8 -> execute(['d_id8'=>$finalsectionid ,'p_id8'=>$project_id,'s_id8'=>$student_id,'sub_date8'=>$date,'doc_path8'=>$location_finalsection.$newfilename_finalsection]);
        $stmt88 -> execute(['d_id88'=>$finalsectionid,'p_id88'=>$project_id,'s_id88'=>$student_id,'a_id88'=>$aid,'approval88'=>1]);
        echo '<script> alert("Final Section Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }else if($rc==9){
        move_uploaded_file($file_tmp_finalsection,$location_finalsection.$newfilename_finalsection);
        $stmt888 -> execute(['subdate'=>$date,'did'=>$finalsectionid,'sid'=>$student_id]);
        $stmt8888 -> execute(['did'=>$finalsectionid,'sid'=>$student_id]);
        echo '<script> alert("Final Section Re Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }
  
    }else if(isset($_FILES['finalreport']['name'])&&isset($_POST['submitbtn'])&&is_uploaded_file($_FILES['finalreport']['tmp_name'])){
        $file_finalreport = $_FILES['finalreport']['name'];
        $location_finalreport = "../document-uploads/finalreport/";
        $file_tmp_finalreport = $_FILES['finalreport']['tmp_name'];
        $newfilename_finalreport = "$student_id.pdf";

        $sql9 = 'INSERT INTO student_document(d_id,p_id,s_id,sub_date,doc_path) VALUES(:d_id9,:p_id9,:s_id9,:sub_date9,:doc_path9)';
        $sql99 = 'INSERT INTO student_authenticator(d_id,p_id,s_id,a_id,approval) VALUES(:d_id88,:p_id99,:s_id99,:a_id99,:approval99)';
        // change
        $sql999 = 'UPDATE student_document SET sub_date = :subdate WHERE d_id = :did AND s_id = :sid';
        $sql9999 = 'UPDATE student_authenticator SET approval = 1 WHERE d_id = :did AND s_id = :sid';
        // change

        $stmt9 = $con -> prepare($sql9);
        $stmt99 = $con -> prepare($sql99);
        // change
        $stmt999 = $con -> prepare($sql999);
        $stmt9999 = $con -> prepare($sql9999);
        // change

        $finalreportid = 10;

        if($rc==9){
        move_uploaded_file($file_tmp_finalreport,$location_finalreport.$newfilename_finalreport);
        $stmt9 -> execute(['d_id9'=>$finalreportid ,'p_id9'=>$project_id,'s_id9'=>$student_id,'sub_date9'=>$date,'doc_path9'=>$location_finalreport.$newfilename_finalreport]);
        $stmt99 -> execute(['d_id88'=>$finalreportid,'p_id99'=>$project_id,'s_id99'=>$student_id,'a_id99'=>$aid,'approval99'=>1]);
        echo '<script> alert("Final Report Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }else if($rc==10){
        move_uploaded_file($file_tmp_finalreport,$location_finalreport.$newfilename_finalreport);
        $stmt999 -> execute(['subdate'=>$date,'did'=>$finalreportid,'sid'=>$student_id]);
        $stmt9999 -> execute(['did'=>$finalreportid,'sid'=>$student_id]);
        echo '<script> alert("Final-Report Re Uploaded!!"); window.location.href = "../pages/student-dashboardv3.php" </script>';
        die();
        }
    
    }else{
        echo '<script> alert("Pls Upload the document and continue!!"); window.location.href = "../pages/report-chapters-upload.php" </script>';
    }
}

catch(PDOException $exception){
    echo $exception->getMessage();
}


?>