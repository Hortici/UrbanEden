<?php
require 'connect.php';
if(isset($_POST['submit'])){
    $ime = $_POST['ime'];
    $razina = $_POST['razina'];
    if($_FILES['ikonica']['error'] == 4){
        echo "<script> alert('Slika ne postoji')</script>";
    }
    else{
        $fileName = $_FILES['ikonica']['name'];
        $fileSize = $_FILES['ikonica']['size'];
        $tmpName = $_FILES['ikonica']['tmp_name'];

        $validExtension = ['png', 'svg'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if(!in_array($imageExtension, $validExtension)){
            echo "<script> alert('Nepodrzana ekstenzija slike')</script>";
        }
        else if($fileSize > 2097152){
            echo "<script> alert('Slika prevelika')</script>";
        }
        else{
            $newImageName = uniqid('', true) . '.' . $imageExtension;


            if(isset($connected)){
                move_uploaded_file($tmpName, 'assets/vegetableIcons/' . $newImageName);
                $sql = "INSERT INTO biljke_info (ime, razina, ikonica_biljke) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($connected);
                $prepare = mysqli_stmt_prepare($stmt, $sql);
                if ($prepare) {
                    mysqli_stmt_bind_param($stmt, "sss", $ime, $razina, $newImageName);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'> Biljka uploadana!</div>";
                } else {
                    /*Unos podatak nije bio uspješan*/
                    die("Doslo je do greske");
                }
            }

        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Unos informacija o biljki u bazu</h1>
<form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
    <label for="ime">Ime biljke: </label>
    <input type="text" name="ime" id="ime" required><br>
    <!--
    <label for="latIme">Latinsko ime biljke: </label>
    <input type="text" name="latIme" id="latIme" required><br>
    <label for="sjetva">Sjetva: </label>
    <input type="text" name="sjetva" id="sjetva" required><br>
    <label for="mjesto">Mjesto: </label>
    <input type="text" name="mjesto" id="mjesto" required><br>
    <label for="razmakURedCm">Razmak u redu u cm: </label>
    <input type="text" name="razmakURedCm" id="razmakURedCm" required><br>
    <label for="razmakURedCm">Razmak u redu u cm: </label>
    <input type="text" name="razmakURedCm" id="razmakURedCm" required><br>
    <label for="razmakIzRedCm">Razmak izmedu redova u cm: </label>
    <input type="text" name="razmakIzRedCm" id="razmakIzRedCm" required><br>
    <label for="zalijevanjeDani">Zalijevanje(broj dana): </label>
    <input type="text" name="zalijevanjeDani" id="zalijevanjeDani" required><br>
    <label for="gnojenjeDani">Gnojenje(broj dana): </label>
    <input type="text" name="gnojenjeDani" id="gnojenjeDani" required><br>
    <label for="okapanjeDani">Okapanje(broj dana): </label>
    <input type="text" name="okapanjeDani" id="okapanjeDani" required><br>
    <label for="rezanjeDani">Rezanje(broj dana): </label>
    <input type="text" name="rezanjeDani" id="rezanjeDani" required><br>
    <label for="dSusjedi">Dobri susjedni: </label>
    <input type="text" name="dSusjedi" id="dSusjedi" required><br>
    <label for="lSusjedi">Losi susjedni: </label>
    <input type="text" name="lSusjedi" id="lSusjedi" required><br>
    <label for="svijetlo">Svijetlo: </label>
    <input type="text" name="svijetlo" id="svijetlo" required><br>
    <label for="berbaDani">Berba(broj dana): </label>
    <input type="text" name="berbaDani" id="berbaDani" required><br>
    <label for="opis">Opis: </label>
    <input type="text" name="opis" id="opis" required><br>
    <label for="zdravlje">Zdravlje: </label>
    <input type="text" name="zdravlje" id="zdravlje" required><br>
    <label for="zdravljeSlika">Zdravlje slika: </label>
    <input type="file" name="zdravljeSlika" id="zdravljeSlika" accept=".jpg, jepg, .png, .svg" value="" required><br>
    <label for="berba">Berba: </label>
    <input type="text" name="berba" id="berba" required><br>
    <label for="voda">Voda: </label>
    <input type="text" name="voda" id="voda" required><br>
    <label for="tlo">Tlo: </label>
    <input type="text" name="tlo" id="tlo" required><br>
    <label for="plodored">Plodored: </label>
    <input type="text" name="plodored" id="plodored" required><br>
    <label for="okapanje">Okapanje: </label>
    <input type="text" name="okapanje" id="okapanje" required><br>
    <label for="gnojidba">Gnojidba: </label>
    <input type="text" name="gnojidba" id="gnojidba" required><br>
    <label for="sjetvaSadnja">Sjetva i sadnja: </label>
    <input type="text" name="sjetvaSadnja" id="sjetvaSadnja" required><br>
    <label for="njega">Njega: </label>
    <input type="text" name="njega" id="njega" required><br>
    <label for="otrovnost">Otrovnost: </label>
    <input type="text" name="otrovnost" id="otrovnost" required><br>
    -->
    <label for="ime">Razina: </label>
    <input type="text" name="razina" id="razina" required><br>
    <label for="ikonica">Ikonica biljke: </label>
    <input type="file" name="ikonica" id="ikonica" accept=".png, .svg" value=""><br>

    <button type="submit" name="submit">Submit</button>
</form>

<h1>Unos clanka u bazu</h1>
</body>
</html>