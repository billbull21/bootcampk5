<?php 

function countVowels($kalimat)
{   
    echo $kalimat. '=';
    $a = substr_count($kalimat, "a"); //hitung jumlah huruf "a"
    $i = substr_count($kalimat, "i"); //hitung jumlah huruf "i"
    $u = substr_count($kalimat, "u"); //hitung jumlah huruf "u"
    $e = substr_count($kalimat, "e"); //hitung jumlah huruf "e"
    $o = substr_count($kalimat, "o"); //hitung jumlah huruf "o"

    $vocal = $a + $i + $u + $e + $o; //hitung total jumlah huruf vocal  

    return $vocal;
}

echo countVowels("ronaldo");


?>