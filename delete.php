<?php
session_start();
include "koneksi.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="delete from feedback where id= $id";

    if($koneksi->query($sql)){
        $_SESSION['result']="Feedback Deleted";
        header("Location: loadFeedback.php"); 
        
        exit();
    }else{
        $_SESSION['result']="Feedback Delete Failed";
        echo "gagal" . mysqli_error($koneksi);
    }
    
    $koneksi->Close();
}
?>