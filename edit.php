<?php
    include "koneksi.php";
    
    $nim=$_POST["nim"];
    $nama=$_POST["nama"];
    $prodi=$_POST["prodi"];
    $angkatan=$_POST["angkatan"];

    $sql="update mahasiswa set nim='$nim', nama='$nama', prodi='$prodi', angkatan= '$angkatan' where nim= '$nim'" ;

    $hasil=mysqli_query($koneksi,$sql);
?>