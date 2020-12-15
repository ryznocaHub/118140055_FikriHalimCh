<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "belajar_ajax";

    $koneksi = mysqli_connect($host,$user,$password,$db);
    if (!$koneksi) {
        die("Koneksi gagal : ". mysqli_connect_error());
    }
?>