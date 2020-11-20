<?php
    function Hpanjang($huruf){
        $panjang=0;
        for ($i=0 ; $i < strlen($huruf) ; $i++) {
            if($huruf[$i] != " "){
                $panjang++;
            }
        }
        return $panjang;
    }
?>