<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Beasiswa</title>
</head>
<body>
    <h1>FORM BEASISWA</h1>
    <form method="post" action="action_beasiswa.php">
         <table>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" placeholder="Masukkan NIM" name="nim" id="nim"></td>
            </tr>
           
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" placeholder="Masukkan Nama" name="nama" id="nama"></td>
            </tr>
           
            <tr>
                <td>IPK</td>
                <td>:</td>
                <td><input type="number" step="0.01" placeholder="Masukkan IPK" name="ipk" id="ipk"></td>
            </tr>
           
            <tr>
                <td>Tingkat Ekonomi</td>
                <td>:</td>
                <td><select name="ekonomi" id="ekonomi">
                    <option value="1">Mampu</option>
                    <option value="0">Tidak Mampu</option>
                </select></td>
            </tr>
           
            <tr>
                <td colspan="3" align="right"><input type="submit" name="submit" value="Submit"></td>
            </tr>
         </table>

    </form>
</body>
</html>