<?php
    function faktorial($angka){
        $hasil = 1;
        while ($angka > 1) {
            $hasil = $hasil * $angka;
            $angka--; 
        }
        return $hasil;
    }
?>