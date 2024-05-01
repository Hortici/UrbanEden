<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <?php
        if(isset($_POST["login"])){
            $Email = $_POST["email"];
            $Lozinka = $_POST["lozinka"];

            require_once "connect.php";

            $sql = "SELECT * FROM korisnici WHERE email = '$Email'";
            if (isset($connected)) {
                $rezultat = mysqli_query($connected, $sql);
            }
            $korisnik = mysqli_fetch_array($rezultat, MYSQLI_ASSOC);
            if($korisnik){
                if(password_verify($Lozinka, $korisnik["password"])){
                    //session_start();
                    //$_SESSION["korsinik"] = "loggedin";

                    /* registracija i login page
                        <?php
                            session_start();
                            if(isset($_SESSION["korsinik"])){
                                header(""Location: index.php);
                            }
                        ?>
                    */
                    /* index page
                        <?php
                            session_start();
                            if(!isset($_SESSION["korsinik"])){
                                header(""Location: login.php);
                            }
                        ?>
                    */
                    /* index page
                        <a href="logout.php" class="btn btn-warning">Log out</a>
                    */


                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Lozinka nije tocna</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email ne postoji</div>";
            }
        }
        
        ?>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="email" class="col-form-label col-sm-2">
                    Email:
                </label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="lozinka" class="col-form-label col-sm-2">
                        Lozinka:
                    </label>
                    <div class="col-sm-10">
                        <input type="password" name="lozinka" class="form-control" id="lozinka">
                    </div>
                </div>

                <button type="submit" name="login" class="btn btn-primary">Prijavi se</button>
                <a class="btn btn-primary" href="registracija.php">Registriraj se</a>
            </div>
        </form>
    </div>
</body>

</html>