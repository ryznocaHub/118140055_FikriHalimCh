<?php
    include "koneksi.php";
    
    $nim=$_POST["isi"];

    $sql="delete from mahasiswa where nim= '$nim'" ;

    $hasil=mysqli_query($koneksi,$sql);
?>