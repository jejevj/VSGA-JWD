<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan VSGA | Form Karyawan</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<?php
    $listAgama = ["Kristen", "Hindu", "Islam", "Budha"];
    sort($listAgama); // mengurutkan array dari yang terkecil
    
    //rsort($listAgama); 
    //mengurutkan array dari terbesar
    $listGolongan = ["I", "II", "III"];

    $filejsoon = 'data_karyawan.json';
    $dataKaryawan = array();

    $dataJson = file_get_contents($filejsoon);
    $dataKaryawan = json_decode($dataJson,true);

    if(isset($_GET['btnSave'])){
        $nik = $_GET['nik'];
        $nama = $_GET['nama'];
        $jenisKelamin = $_GET['jenisKelamin'];
        $agama = $_GET['agama'];
        $golongan = $_GET['golongan'];
        $gajiPokok = $_GET['gajiPokok'];

        $dataBaru = array(
            "nik"=>$nik,
            "nama"=>$nama,
            "jenisKelamin"=>$jenisKelamin,
            "agama"=>$agama,
            "golongan"=>$golongan,
            "gajiPokok"=>$gajiPokok
        );
        array_push($dataKaryawan,$dataBaru);

        $dataToJson = json_encode($dataKaryawan,JSON_PRETTY_PRINT);

        
        file_put_contents($filejsoon,$dataToJson);
    }


?>
<!-- <style>
    p{
        color: #D84F2A;
    }
    .baris{
        color: blue;
    }
</style> -->
<body>

<div class="container">
    
    <h1>Form Karyawan</h1>
    <p>Silahkan isi form</p>
    <form action="#" method="get">
    <table>
        <tr>
            <td>Nik</td>
            <td>:</td>
            <td>
                <input type="text" name="nik" id="nik">
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>
                <input type="text" name="nama" id="nama">
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <select name="jenisKelamin" id="jenisKelamin">
                    <option value="0">Pria</option>
                    <option value="1">Wanitia</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
                <select name="agama" id="agama">
                    <?php 
                    //cara1
                    foreach ($listAgama as $agama) {
                        echo "<option value='$agama'>$agama</option>";
                    }

                    //cara2
                    // for ($index = 0; $index < count($listAgama); $index++) {
                    //    echo "<option value='$listAgama[$index]'>$listAgama[$index]</option>";
                    //} 
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Golongan</td>
            <td>:</td>
            <td>
                <select name="golongan" id="golongan">
                    <?php

                    foreach ($listGolongan as $golongan) {
                        echo "<option value='$golongan'>$golongan</option>";
                    }

                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Gaji Pokok</td>
            <td>:</td>
            <td><input type="number" name="gajiPokok" id="gajiPokok"></td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <input type="submit" class="btn btn-primary" value="Save" name="btnSave" id="btnSave">
            </td>
        </tr>
    </table>
    </form>
    <br>
    <hr>
    <br>
    <table class="table table-striped">
        <tr>
        <th>NIK</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Golongan</th>
        <th>Tunjangan</th>
        <th>Pajak</th>
        <th>Gaji Pokok</th>
        <th>Total Gaji</th>
        </tr>
    <?php 
        $tunj = 0;
        $pajak = 0;
        $total =0;
        foreach($dataKaryawan as $karyawan){
            ?>
            <tr>
                <td><?php echo $karyawan['nik'];?></td>
                <td><?php echo $karyawan['nama'];?></td>
                <td><?php 
                    if($karyawan['jenisKelamin']=="0"){
                        echo "Pria";
                    }else if($karyawan['jenisKelamin']=="1"){
                        echo "Wanita";
                    }
                ?></td>
                <td><?php echo $karyawan['agama'];?></td>
                <td><?php echo $karyawan['golongan'];?></td>
                <td><?php 
                    if($karyawan['golongan']=='I'){
                        $tunj = 1000000;
                    }else if($karyawan['golongan']=='II'){
                        $tunj = 2000000;
                    }else if($karyawan['golongan']=='III'){
                        $tunj = 3000000;
                    }
                    echo number_format($tunj);
                ?></td>
                <td><?php 
                    $pajak = ($karyawan['gajiPokok']+$tunj)*0.05;
                    echo "Rp. ".number_format($pajak);
                ?></td>
                <td>Rp. <?php echo number_format($karyawan['gajiPokok']);?></td>
                <td>Rp. <?php 
                    $total = $karyawan['gajiPokok']+$tunj-$pajak;
                    echo number_format($total);
                ?></td>
            </tr>
            <?php
        }
    ?>
    
    </table>
    
</div>  
<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>