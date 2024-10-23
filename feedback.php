<?php 
include "koneksi.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $hobi = $_POST['hobi'];

    $query = "INSERT INTO MS_USER (NAMA, JENIS_KELAMIN, ALAMAT, HOBBY) VALUES('$nama','$jk','$alamat','$hobi')";
    
    if($koneksi->query($query)){
        header("Location: form.html");
        exit();
    }else{
        echo "gagal" . mysqli_error($koneksi);
    }

    $koneksi->Close();
}
    
?>