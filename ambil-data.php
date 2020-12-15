<?php
    include "koneksi.php";
    
    $nim = $_GET['nim'];

    // $sql = "select * from mahasiswa where nim ='$id'";

    $hasil = mysqli_query($koneksi,"select * from mahasiswa where nim ='$nim'");

    if($hasil){
        $baris = mysqli_fetch_array($hasil);
        echo json_encode($baris);
    }
?>