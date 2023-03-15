<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2 -  J Angga Wijaya</title>
</head>
<body>
    <h3>====================CETAK BILANGAN GANJIL GENAP 1-100====================</h3>
    <?php 
    $no = 1;
    while($no<=100){
        if($no%2===0){
            echo "$no adalah Bilangan Genap<br>";
        }else{
            echo "$no adalah Bilangan Ganjil<br>";
        }
        $no++;
    }
    ?>
</body>
</html>