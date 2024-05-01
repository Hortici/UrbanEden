<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="registracija.php" method="post">
            <?php
            if (isset($_POST["submit"])) {
                $Ime = $_POST["ime"];
                $Email = $_POST["email"];
                $Lozinka = $_POST["lozinka"];
                $Lozinka2 = $_POST["lozinka2"];

                $LozinkaHash = password_hash($Lozinka, CRYPT_BLOWFISH);

                $error = array();
                if (empty($Ime) or empty($Email) or empty($Lozinka) or empty($Lozinka2)) {
                    array_push($error, "Treba unijeti sva polja");
                }
                if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    array_push($error, "Email nije dobar");
                }
                if (strlen($Lozinka) < 8) {
                    array_push($error, "Lozinka treba biti barem 8 znakova");
                }
                if ($Lozinka !== $Lozinka2) {
                    array_push($error, "Lozinke se ne podudaraju");
                }

                require_once "connect.php";
                $sql = "SELECT * FROM korisnici WHERE email = '$Email'";
                if (isset($connected)) {
                    $rezultat = mysqli_query($connected, $sql);
                }
                $rowCount = mysqli_num_rows($rezultat);
                if ($rowCount > 0) {
                    array_push($error, "Email vec postoji");
                }
                if (count($error) > 0) {
                    foreach ($error as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    $sql = "INSERT INTO korisnici (ime, email, password) VALUES (?,?,?)";
                    $stmt = mysqli_stmt_init($connected);
                    $prepare = mysqli_stmt_prepare($stmt, $sql);
                    if ($prepare) {
                        mysqli_stmt_bind_param($stmt, "sss", $Ime, $Email, $LozinkaHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'> Registriran si!</div>";
                    } else {
                        die("Registracija nije uspjela");
                    }
                }
            }
            ?>
            <div class="mb-3">
                <label for="ime" class="col-form-label col-sm-2">
                    Ime:
                </label>
                <div class="col-sm-10">
                    <input type="text" name="ime" class="form-control" id="ime">
                </div>

                <label for="email" class="col-form-label col-sm-2">
                    Email:
                </label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email">
                </div>

                <label for="lozinka" class="col-form-label col-sm-2">
                    Lozinka:
                </label>
                <div class="col-sm-10">
                    <input type="password" name="lozinka" class="form-control" id="lozinka">
                </div>
                <div class="mb-3">
                    <label for="lozinka2" class="col-form-label col-sm-2">
                        Lozinka2:
                    </label>
                    <div class="col-sm-10">
                        <input type="password" name="lozinka2" class="form-control" id="lozinka2">
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Registriraj se</button>
                <a class="btn btn-primary" href="login.php">Login</a>
            </div>
        </form>
    </div>
</body>

</html>