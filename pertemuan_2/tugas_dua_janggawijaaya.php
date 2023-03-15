<?php 
    //Ini adalah prosedur
    function penjumlahanProcedure(){
        $a = 10;
        $b=2;
        echo "Jumlah $a + $b = ".($a+$b);
    }
    function penguranganProcedure(){
        $a = 10;
        $b=2;
        echo "Pengurangan $a - $b = ".($a-$b);
    }
    function pengkaliProcedure(){
        $a = 10;
        $b=2;
        echo "Perkalian $a x $b = ".($a*$b);
    }
    function pembagiProcedure(){
        $a = 10;
        $b=2;
        echo "Pembagian $a / $b = ".($a/$b);
    }

    //Ini adalah fungsi
    function penjumlahan($a,$b){
        return $a+$b;
    }
    function pengurangan($a,$b){
        return $a-$b;
    }
    function pembagian($a,$b){
        return $a/$b;
    }
    function perkalian($a,$b){
        return $a*$b;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>NAMA : J ANGGA WIJAYA</p>
    <h1>Prosedur</h1>
    <p><?php echo penjumlahanProcedure()?></p>
    <p><?php echo penguranganProcedure()?></p>
    <p><?php echo pengkaliProcedure()?></p>
    <p><?php echo pembagiProcedure()?></p><br>
    <h1>Fungsi</h1>
    <p>Hasil penjumlahan 10 + 2 = <?php echo penjumlahan(10,2)?></p>
    <p>Hasil pengurangan 10 - 2 = <?php echo pengurangan(10,2)?></p>
    <p>Hasil perkalian 10 * 2 = <?php echo perkalian(10,2)?></p>
    <p>Hasil pembagian 10 / 2 = <?php echo pembagian(10,2)?></p>
</body>
</html>