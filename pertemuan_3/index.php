<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kalkulator</title>
</head>
<body>
    <form method="get">
        <label for="angka1">Angka Pertama</label>&nbsp;:
        <input type="number" name="angka1" id="angka1"><br><br>
        <label for="angka2">Angka Kedua </label>&nbsp;&nbsp;:
        <input type="number" name="angka2" id="angka2"> <br><br>
        <input type="submit" name="btnHitung" id="btnHitung" value="Tambah">
        <input type="submit" name="btnHitung" id="btnHitung" value="Kali">
        <input type="submit" name="btnHitung" id="btnHitung" value="Kurang">
        <input type="submit" name="btnHitung" id="btnHitung" value="Bagi">
    </form>
    <?php 
        include "function_matematika.php";
        if(isset($_GET['btnHitung'])){
            $angka1 = $_GET['angka1'];
            $angka2 = $_GET['angka2'];
    ?>
            <p>Kamu berhasil menginput angka <?php echo $angka1." & ".$angka2;
            if($_GET['btnHitung']=="Tambah"){?></p>

            <p>Hasil Penjumlahan = <?php echo penjumlahan($angka1,$angka2);
            }else if($_GET['btnHitung']=="Kurang"){?></p>

            <p>Hasil Pengurangan = <?php echo pengurangan($angka1,$angka2);
            }else if($_GET['btnHitung']=="Kali"){?></p>

            <p>Hasil Perkalian   = <?php echo perkalian($angka1,$angka2);
            }else if($_GET['btnHitung']=="Bagi"){?></p>

            <p>Hasil Pembagian   = <?php echo pembagian($angka1,$angka2);
            }?></p>
    <?php
        }
    
    ?>
</body>
</html>