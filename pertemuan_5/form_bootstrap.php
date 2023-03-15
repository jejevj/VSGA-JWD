<?php

    $filejsoon = './assets/data/data_karyawan.json';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VSGA - Form Bootstrap</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
    <section class="py-5">
        <div class="container rounded" style="border: 1;">
            <div class="text-center mb-5">
            
            <h1>Input Data Gaji Karyawan</h1></div>
            <div class="row">
            <div class="col-md-4">
            <form action="#" method="get">
            <div class="form-group">
                
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Masukkan NIK Dengan Benar</small>
                
            </div>
            </form>
            <div class="form-group">
                
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Masukkan Nama</small>
                
            </div>
            <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="form-control" name="agama" id="agama">
                        <option value="1">Islam</option>
                    <option value="2">Kristen</option>
                        <option value="3">Hindu</option>
                        <option value="4">Buddha</option>
                    </select>
            </div>
            <div class="form-group">
                
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenisKelamin" id="jenisKelamin">
                        <option value="0">Pria</option>
                        <option value="1">Wanita</option>
                    </select>
                
            </div>
            <div class="form-group">
                
                    <label for="golongan">Golongan</label>
                    <select class="form-control" name="golongan" id="golongan">
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">II</option>
                    </select>
                
            </div>
            <div class="form-group">
                    <label for="gajiPokok">Gaji Pokok</label>
                    <input type="text" name="gajiPokok" id="gajiPokok" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Masukkan Gaji Pokok</small>
            </div>
            <input type="submit" class="btn btn-primary" value="btnSave" id="btnSave" name="btnSave">
            </form>
            </div>
            <div class="col-md-8">
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
            </div>
        </div>
    </section>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>