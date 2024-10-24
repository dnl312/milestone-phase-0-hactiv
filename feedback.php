<?php 
session_start();
include "koneksi.php";

if(isset($_POST['update-feedback'])){
    $feedback_id =$_POST['feedback_id'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "UPDATE FEEDBACK SET MESSAGE='$message' WHERE id='$feedback_id'";

    if($koneksi->query($query)){
        $_SESSION['result']="Feedback Updated";
        header("Location: loadFeedback.php");

        exit();
    }else{
        $_SESSION['result']="Feedback Update Failed"; 
        echo "gagal" . mysqli_error($koneksi);
    }
    $koneksi->Close();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO FEEDBACK (EMAIL, MESSAGE) VALUES('$email','$message')";
    
    if($koneksi->query($query)){
        $_SESSION['result']="Feedback Sent"; 
        header("Location: loadFeedback.php");

        
        exit();
    }else{
        $_SESSION['result']="Feedback Sent Failed";   
        echo "gagal" . mysqli_error($koneksi);
    }

    $koneksi->Close();
}
    
?>