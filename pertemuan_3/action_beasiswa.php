

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengisian Form Beasiswa</title>
</head>
<body>
<?php 
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $ipk = $_POST['ipk'];
    $ekonomi = $_POST['ekonomi'];
    echo $nim."<br>";
    echo $nama."<br>";
    echo $ipk."<br>";
    // echo $ekonomi."<br>";
    if(isset($_POST['submit'])){
        if($ipk>3.00 && $ekonomi=="0"){
            echo "<b>Selamat, $nama anda berhak mendapatkan beasiswa.</b>";
        }else{
            echo "<b> $nama, mohon maaf anda belum layak untuk menerima beasiswa.</b>";
        }
    }
?>
</body>
</html>