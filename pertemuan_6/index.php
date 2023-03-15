<?php 
    require_once "vendor/autoload.php";

    use Carbon\Carbon;
    $factory = new RandomLib\Factory;
    $generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Library PHP - Composer</title>
</head>
<body>
    <h1>Random Password Generator</h1>
    <?php 
        echo $generator->generateString(32,"abdcefgh786")."<br>";
        printf("Now: %s", Carbon::now());
    ?>
</body>
</html>