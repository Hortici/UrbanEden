<?php
session_start();
if(isset($_SESSION["korisnik"])){
    header("Location: pages/home.php");
    $linkLogo = 'home.php';
}else{
    $linkLogo = 'index.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Urban Eden</title>

  <!--Link za  CSS-->
  <link rel="stylesheet" href="style.css">
  <!--Font Awesome Link-->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!--Link za korištenje Bootstrapa-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Link za korištenje Bootstrap ikona, Boostrap Icon Font-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>

  <!--Link za Bootstrap js module-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</head>



<body>

  <!--Header, Logo & Nav-->
  <header>
    <div class="container-fluid w-75 px-0" id="home">
      <!--Navbar sekcija-->
      <nav class="navbar navbar-expand-lg">
        <!--Logo i link za home stranicu-->
        <a class="navbar-brand" href="index.php">
          <h1 id="logo">UrbanEden</h1>
        </a>
        <!--Nav Toggle gumb-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--End Nav Toggle Button-->
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
          
          <!--Komponente navigacije, rađene bootstrapom-->
          <ul class="nav nav-pills justify-content-center align-items-center">
            <!--Gumb za prijavu / registraciju korisnika-->
            <li class="nav-item"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#LoginExampleModal"><a>Prijavi se</a></button></li>
            <!--Gumb za otvaranje postavki profila-->
            <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#LoginExampleModal"><a><i class="bi bi-person-fill fs-2"></i></a></button></li>
          </ul>
        </div>

      </nav>


    </div>
  </header>
<!-- Glavni dio stranice -->
  <main class="w-75 justify-content-center mx-auto">

      <?php
      if(isset($_POST["login"])){
          $email = $_POST["email"];
          $lozinka = $_POST["password"];

          echo $email;
          echo $lozinka;

          require_once "connect.php";

          $sql = "SELECT * FROM korisnici WHERE email = '$email'";
          if (isset($connected)) {
              $rezultat = mysqli_query($connected, $sql);
          }
          $korisnik = mysqli_fetch_array($rezultat, MYSQLI_ASSOC);
          if($korisnik){
              if(password_verify($lozinka, $korisnik["password"])){

                  $_SESSION["korisnik"] = $korisnik["ime"];

                  /* index page
                      <a href="logout.php" class="btn btn-warning">Log out</a>
                  */

                  header("Location: pages/home.php");
                  die();
              }else{
                  echo "<div class='alert alert-danger'>Lozinka nije tocna</div>";
              }
          }else{
              echo "<div class='alert alert-danger'>Email ne postoji</div>";
          }
      }
      ?>


  <!-- "Modal" od boostrapa za prijavu korisnika-->
  <div class="modal fade" id="LoginExampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Prijavi se</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="index.php" method="post">
            <div class="mb-3">
              <label for="email" class="col-form-label col-sm-2">
                Email:
              </label>
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email">
              </div>
              <div class="mb-3">
                <label for="password" class="col-form-label col-sm-2">
                  Lozinka:
                </label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="password">
                </div>
              </div>
            </div>
              <div class="modal-footer">
                <!-- Gumbi za biranje forme - Prijave / Registracije -->
                  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#RegisterExampleModal">Registriraj se</button>
                  <button type="submit" name="login" class="btn btn-primary">Prijavi se</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Kraj modalnog dijela prijave korisnika -->

      <?php
      if (isset($_POST["registracija"])) {
          $ime2 = $_POST["ime2"];
          $email2 = $_POST["email2"];
          $lozinka2 = $_POST["password2"];
          $lozinka22 = $_POST["password22"];

          $lozinkaHash2 = password_hash($lozinka2, CRYPT_BLOWFISH);

          $error = array();
          if (empty($ime2) or empty($email2) or empty($lozinka2) or empty($lozinka22)) {
              array_push($error, "Treba unijeti sva polja");
          }
          if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
              array_push($error, "Email nije dobar");
          }
          if (strlen($lozinka2) < 8) {
              array_push($error, "Lozinka treba biti barem 8 znakova");
          }
          if ($lozinka2 !== $lozinka22) {
              array_push($error, "Lozinke se ne podudaraju");
          }

          require_once "connect.php";
          $sql = "SELECT * FROM korisnici WHERE email = '$email2'";
          if (isset($connected)) {
              $rezultat = mysqli_query($connected, $sql);
          }
          $rowCount = mysqli_num_rows($rezultat);
          if ($rowCount > 0) {
              array_push($error, "Email vec postoji");
          }
          if (count($error) > 0) {
              foreach ($error as $err) {
                  echo "<div class='alert alert-danger'>$err</div>";
              }
          } else {
              $sql = "INSERT INTO korisnici (ime, email, password) VALUES (?,?,?)";
              $stmt = mysqli_stmt_init($connected);
              $prepare = mysqli_stmt_prepare($stmt, $sql);
              if ($prepare) {
                  mysqli_stmt_bind_param($stmt, "sss", $ime2, $email2, $lozinkaHash2);
                  mysqli_stmt_execute($stmt);
                  echo "<div class='alert alert-success'> Registriran si!</div>";
              } else {
                  die("Registracija nije uspjela");
              }
          }
      }
      ?>

  <!-- "Modal" od boostrapa za registraciju korisnika-->
  <div class="modal fade" id="RegisterExampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel2">Prijavi se</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="index.php" method="post">
            <div class="mb-3">
              <label for="ime2" class="col-form-label col-sm-2">
                Ime:
              </label>
              <div class="col-sm-10">
                <input type="text" name="ime2" class="form-control" id="ime2">
              </div>
              <label for="email2" class="col-form-label col-sm-2">
                Email:
              </label>
              <div class="col-sm-10">
                <input type="text" name="email2" class="form-control" id="email2">
              </div>
              <div class="mb-3">
                <label for="password2" class="col-form-label col-sm-2">
                  Lozinka:
                </label>
                <div class="col-sm-10">
                  <input type="password" name="password2" class="form-control" id="password2">
                </div>
                <div class="mb-3">
                  <label for="password22" class="col-form-label col-sm-4">
                    Ponovi lozinku:
                  </label>
                  <br>
                  <div class="col-sm-10">
                    <input type="password" name="password22" class="form-control" id="password22">
                  </div>
              </div>
            </div>
            </div>
              <div class="modal-footer">
                  <!-- Gumbi za biranje forme - Prijave / Registracije -->
                  <button type="submit" name="registracija" class="btn btn-primary">Registriraj se</button>
                  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#LoginExampleModal">Prijavi se</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Kraj modalnog dijela registracije korisnika -->


<!-- Glavni sadržaj stranice -->  
  <div class="opis d-flex flex-row">
    <div class="left w-50 m-5 flex-column">
      <h1>Tvoj Vrtlarski pomoćnik</h1>
      <br>
      <p class="my-5 fs-4">Želiš imati svoj vrt, ali ne znaš gdje početi? <br>
        UrbanEden ti olakšava prvi korak.
      </p>
      <p class="my-5 fs-6 ">Sve osnovne informacije o uzgoju biljaka na jednom mjestu.
      </p>
      </div>
    <div class="right bg-secondary w-50 h-auto rounded-3">
      <img src="assets/images/Gardening-rafiki 1.svg" alt="Gardening picture">
    </div>
  </div>

    <div class="processSumUp d-flex flex-column mt-5 pt-5">
      <div class="naslovi d-flex flex-row justify-content-between">
        <span class="px-2 mx-3 col-3 fs-5">
          <h3 class="mb-4">
            1. Zasadi vrt
          </h3>
          <p>Selekcija biljaka koja odgovara tvojim uvjetima.</p>
        </span>
        <span class="px-2 mx-3 col-3 fs-5">
          <h3 class="mb-4">
            2. Upoznaj biljke
          </h3>
          <p>Osnovne informacije o biljci i članci o različitim vrstama uzgoja.</p>
        </span>
        <span class="px-2 mx-3 col-3 fs-5">
          <h3 class="mb-4">
            3. Ne zaboravi
          </h3>
          <p>Podsjetnici za redovitu brigu i kalendari radova u vrtu.</p>
        </span>
      </div>

      <div class="slike d-flex flex-row justify-content-between fs-2 mt-3 h-50">
        <div class="d-flex flex-column bg-secondary w-50 h-auto rounded-3 mx-4 px-2">
          <i class="bi bi-dot" ></i>
          <i class="bi bi-dot" ></i>
          <i class="bi bi-dot"></i>
        </div>
        <div class="d-flex flex-column bg-secondary w-50 rounded-3 mx-4 px-2">
          <i class="bi bi-dot"></i>
          <i class="bi bi-dot"></i>
          <i class="bi bi-dot"></i>
        </div>
        <div class="d-flex flex-column bg-secondary w-50 rounded-3 mx-4 px-2">
          <i class="bi bi-dot"></i>
          <i class="bi bi-dot"></i>
          <i class="bi bi-dot"></i>
        </div>
      </div>

    </div>
  </div>
    

  </main>



</body>

</html>