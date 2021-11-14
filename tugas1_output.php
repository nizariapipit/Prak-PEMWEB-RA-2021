<h2> OUTPUT </h2>
<?php
$bil1 = $_POST["bil1"];
$bil2 = $_POST["bil2"];
$operator = $_POST["operator"];

fungsi($bil1, $bil2, $operator);

function fungsi($a, $b, $c){
    if($c == 1){
        echo 'PENJUMLAHAN'; echo '<br>';
        echo 'Operator +'; echo '<br>';
        echo 'Hasil : ', $a+ $b;
    }elseif($c == 2){
        echo 'PENGURANGAN'; echo '<br>';
        echo 'Operator -'; echo '<br>';
        echo 'Hasil : ', $a - $b;
    }elseif($c == 3){
        echo 'PEMBAGIAN'; echo '<br>';
        echo 'Operator /'; echo '<br>';
        echo 'Hasil : ', $a / $b;
    }elseif($c == 4){
        echo 'PERKALIAN'; echo '<br>';
        echo 'Operator *'; echo '<br>';
        echo 'Hasil : ', $a * $b;
    }elseif($c == 5){
        echo 'MODULUS'; echo '<br>';
        echo 'Operator %'; echo '<br>';
        echo 'Hasil : ', $a % $b;
    }else{
        echo 'Pilihan Tidak Ada!';
    }
}
?>