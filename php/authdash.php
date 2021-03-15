<?php
session_start();


if(isset($_POST['activestud'])){
    echo "1";
    // echo '<script> window.location.href = "../pages/active-stud-change.php" </script>';
}else if(isset($_POST['pending'])){
    echo "2";
    // echo '<script> window.location.href = "../pages/pending-students.php" </script>';
}else if(isset($_POST['meeting'])){
    echo "3";
    // echo '<script> swal("Heres the title!", "...and heres the text!"); window.location.href = "../pages/authdash.php" </script>';
}else if(isset($_POST['discuss'])){
    echo "4";
    // echo '<script> swal("Heres the title!", "...and heres the text!"); window.location.href = "../pages/authdash.php" </script>';
}else if(isset($_POST['logout'])){
    session_destroy();
    echo "5";
    // echo '<script> alert("You Have Been Signed Out"); window.location.href = "../index.php" </script>';        
}



?>