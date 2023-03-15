<?php

    //Import library yang diinstall menggunakan composer.
    require_once("./vendor/autoload.php");
    $factory = new RandomLib\Factory;
    $generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM));
    $token = $generator->generateString(10);

    //Membuat File JSON
    $filejsoon = './data/data_karyawan.json';
    $dataKaryawan = array();

    $dataJson = file_get_contents($filejsoon);
    $dataKaryawan = json_decode($dataJson,true);


    //Aksi form setelah ditekan tombol Simpan
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
            "gajiPokok"=>$gajiPokok,
            "token"=>$token
        );

        array_push($dataKaryawan,$dataBaru);
        $dataToJson = json_encode($dataKaryawan,JSON_PRETTY_PRINT);
        file_put_contents($filejsoon,$dataToJson);
    }

    //Array Declaration
    $agama = array("Islam", "Kristen", "Hindu","Budha");
    $jKelamin = array("Pria", "Wanita");
    $gol = array("I", "II", "III");

    //Function Declaration
    function getTunjangan($gol){
        $tunj = 0;
        if($gol=='I'){
            $tunj = 1000000;
        }else if($gol=='II'){
            $tunj = 2000000;
        }else if($gol=='III'){
            $tunj = 3000000;
        }
        return $tunj;
    }

    function getPajak($gaji,$tunjangan){
        return ($gaji+$tunjangan)*0.05;
    }
    function getJenisKelamin($kode){
        if($kode=="0"){
            return "Pria";
        }else if($kode=="1"){
            return "Wanita";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VSGA - Tugas Akhir</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <section class="py-5">
        <div class="container-fluid p-5" style="border: 1;">
            <div class="row mb-5">
                <img src="./gambar/140x140Text.png" alt="" height="60px">
                <h1>Input Data Gaji Karyawan</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- FORM -->
                    <form action="" method="get">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Masukkan NIK Dengan Benar</small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Masukkan Nama</small>                
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="agama" id="agama">
                                <?php 
                                    $i = 1;                
                                    foreach($agama as $agm){ ?>
                                        <option value="<?php echo $i?>"><?php echo $agm?></option>
                                <?php
                                    $i++; 
                                    }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenisKelamin" id="jenisKelamin">
                            <?php 
                                    $i = 0;                
                                    foreach($jKelamin as $jenisK){ ?>
                                        <option value="<?php echo $i?>"><?php echo $jenisK?></option>
                                <?php
                                    $i++; 
                                    }?>
                            </select>            
                        </div>
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <select class="form-control" name="golongan" id="golongan">
                            <?php               
                                foreach($gol as $gols){ ?>
                                    <option value="<?php echo $gols?>"><?php echo $gols?></option>
                                <?php
                                    }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gajiPokok">Gaji Pokok</label>
                            <input type="text" name="gajiPokok" id="gajiPokok" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Masukkan Gaji Pokok</small>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Simpan Data" id="btnSave" name="btnSave">
                    </form>
                    <!-- END OF FORM -->
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
                            <th>Token</th>
                        </tr>
    <?php 
        foreach($dataKaryawan as $karyawan){
            
            $tunj = getTunjangan($karyawan['golongan']);
            $pajak = getPajak($karyawan['gajiPokok'],$tunj);
            $total = $karyawan['gajiPokok']+$tunj-$pajak;
            $jenisKelamin1 = getJenisKelamin($karyawan['jenisKelamin']);
            ?>
            <tr>
                <td><?php echo $karyawan['nik'];?></td>
                <td><?php echo $karyawan['nama'];?></td>
                <td><?php echo $jenisKelamin1?></td>
                <td><?php echo $karyawan['agama'];?></td>
                <td><?php echo $karyawan['golongan'];?></td>
                <td><?php echo number_format($tunj);?></td>
                <td>Rp. <?php echo number_format($pajak);?></td>
                <td>Rp. <?php echo number_format($karyawan['gajiPokok']);?></td>
                <td>Rp. <?php echo number_format($total);?></td>
                <td><?php echo $karyawan['token']?></td>
            </tr>
            <?php
        }
    ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>