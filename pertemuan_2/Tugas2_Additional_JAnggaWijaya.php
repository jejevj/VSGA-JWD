<?php 
    $nilai = 70;
    $grade ="";
    if($nilai>=81){
        $grade = "A";
    }else if($nilai>=71 && $nilai<=80){
        $grade = "B";
    }else if($nilai>=55 && $nilai<=70){
        $grade = "C";
    }else if($nilai>=40 && $nilai<=54){
        $grade = "D";
    }else if($nilai<40){
        $grade = "D";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Tambahan 2</title>
</head>
<body>
    <p>Nama : J ANGGA WIJAYA</p>
    <p>Nilai UAS Anda <?php echo $nilai?>, Grade = <?php echo $grade?></p>
</body>
</html>