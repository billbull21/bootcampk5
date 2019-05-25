<?php

function ganti_kata($string, $old, $new) {

    $total = strlen($string);
    $strArrs = str_split($string);

    for ($i=0; $i < $total; $i++) {
        $data = strpos($string, $old, $i);
        $strArrs[$data] = $new;
        echo $strArrs[$i];
    }
}


ganti_kata("surabaya", "a", "o");

?>