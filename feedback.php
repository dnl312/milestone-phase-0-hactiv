<?php 
include "koneksi.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO FEEDBACK (EMAIL, MESSAGE) VALUES('$email','$message')";
    
    if($koneksi->query($query)){
        header("Location: form.html");
        exit();
    }else{
        echo "gagal" . mysqli_error($koneksi);
    }

    $koneksi->Close();
}
    
?>