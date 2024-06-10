<?php
/*Započinje sesiju na trenutnoj stranici*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["korisnik"])){
    /*Postavlja varijablu linkLogo na trenutnu stranicu te varijablu korisnik na ime trenutno ulogiranog korisnika*/
    $linkLogo = 'home.php';
    $korisnik = $_SESSION["korisnik"];
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

    <!--Link css-->
    <link rel="stylesheet" href="../style.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!--Link Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Link Boostrap Icon Font-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--<link rel="stylesheet" href="demo.css"/>-->

    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>

    <!-- support for IE -->
    <script src="node_modules/gridstack/dist/es5/gridstack-poly.js"></script>
    <script src="node_modules/gridstack/dist/es5/gridstack-all.js"></script>

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
<?php
/*Ukoliko korisnik pritisne gumb odjava sesija se gasi te se korisnik preusmjerava na index.php stranicu*/
if (isset($_POST["odjava"])){
    session_destroy();
    header("Location: ../index.php");
}
?>

<!--Header, Logo & Nav-->
<header>
    <div class="container-fluid w-75 px-0" id="home">

        <nav class="navbar navbar-expand-lg">
            <!--Logo i link za home stranicu-->
            <a class="navbar-brand d-flex flex-row" href="<?php echo $linkLogo ?>">
                <img src="../assets/images/tomato.svg" class="px-2" alt="Image of a tomato">
                <h1 id="logo" class="m-0">UrbanEden</h1>
            </a>
            <!--Nav Toggle Button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <!--End Nav Toggle Button-->

                <!--Nav Extended-->
                <ul class="nav nav-pills justify-content-center align-items-center">
                    <li class="nav-item active"><a class="nav-link" href="vrt.php">Vrt</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">Info</a></li>
                    <li class="nav-item"><a class="nav-link" href="calendar.php">Kalendar</a></li>
                    <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="offcanvas"
                                                 data-bs-target="#offcanvasExample"><a><i class="bi bi-person-fill fs-2"></i></a></button></li>
                </ul>
            </div>
        </nav>
        <!--offcanvas profil sidebar-->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

            <div class="offcanvas-body">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="d-flex flex-row  align-items-center justify-content-center">
                        <i class="bi bi-person-fill fs-2"></i>
                        <h2 class="m-0 ps-2"><?php echo $korisnik;?></h2>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <hr>

                <form action="about.php" method="post" class="d-flex flex-column justify-content-start">
                    <button class="btn btn-primary m-2 w-50">Postavke</button>
                    <button type="submit" name="odjava" class="btn btn-primary m-2 w-50">Odjavi se</button>
                </form>
            </div>
        </div>
    </div>
</header>


<main class="w-75 justify-content-center mx-auto">

    <?php
    //require_once "../connect.php";
    try {
        require_once("connect.php");
        if (isset($connected)) {
            $plantId = $_POST['plantId'];
            $sql = "SELECT * FROM biljke_info WHERE id = $plantId";
            $rows_plants = mysqli_query($connected, $sql);

            foreach ($rows_plants as $row_plant) { ?>
                <div class="top mb-5">
                    <div class="name">
                        <h4 id="name" class="mb-1"><?php echo $row_plant['ime']; ?></h4>
                        <i><?php echo $row_plant['latIme']; ?></i>
                        <p id="lvl" class="mb-3 text-secondary">
                            <?php echo $row_plant['razina']; ?>
                            <span id="toxic" class="p-1 bg-danger-subtle rounded-2 col-4">
                        <?php echo $row_plant['otrovnost_info']; ?>
                    </span>
                        </p>

                    </div>
                    <div class="data d-grid border border-2 rounded-3 py-4 px-3">
                        <div class="row row-cols-4">
                            <div class="description col-7">
                                <p><?php echo $row_plant['kratkiOpis']; ?></p>
                                <button class="btn btn-primary py-2 px-4">Sažetak</button>
                            </div>
                            <div class="col">
                                <img src="../assets/vegetableIcons/<?php echo $row_plant['ikonica_biljke'] ?>" alt="picture of a blitva">
                            </div>
                        </div>
                    </div>
                </div>
                <!--Nav-->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a id="clanak uvjeti" class="nav-link active mx-3" aria-current="page" href="#">Uvjeti</a>
                    </li>
                    <li class="nav-item">
                        <a id="clanak zdravlje" class="nav-link text-black mx-3" href="#">Zdravlje</a>
                    </li>
                    <li class="nav-item">
                        <a id="clanak berba" class="nav-link text-black mx-3" href="#">Berba</a>
                    </li>
                </ul>
                <!--Article-->
                <article class="d-flex flex-column mx-auto justify-content-center align-items-start w-75 mt-5 px-5">
                    <h3>Temperatura</h3>
                    <p><?php echo $row_plant['temperatura']; ?></p>
                    <h3 class="mt-4">Voda</h3>
                    <p><?php echo $row_plant['voda']; ?></p>
                    <h3 class="mt-4">Tlo</h3>
                    <p><?php echo $row_plant['tlo']; ?>.</p>
                    <h3 class="mt-4">Plodored</h3>
                    <p><?php echo $row_plant['plodored']; ?></p>
                    <h3 class="mt-4">Okopavanje</h3>
                    <p><?php echo $row_plant['okapanje']; ?></p>
                    <h3 class="mt-4">Gnojidba</h3>
                    <p><?php echo $row_plant['gnojidba']; ?></p>
                    <h3 class="mt-4">Sjetva/sadnja</h3>
                    <p><?php echo $row_plant['sjetva_sadnja']; ?></p>
                    <h3 class="mt-4">Njega</h3>
                    <p><?php echo $row_plant['njega']; ?></p>
                    <h3 class="mt-4">Otrovnost</h3>
                    <p><?php echo $row_plant['otrovnost']; ?></p>
                </article>
            <?php
            }
            mysqli_close($connected);
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
    ?>

</main>





<!-- Footer sa nav elementima i  copyrightom -->
<footer class="position-relative bottom-0 d-flex flex-column align-items-center justify-content-between" style="background-color:#005A00; min-height:100px;">
    <div class="container-fluid w-50 px-0 pt-2 d-flex flex-row align-items-center justify-content-between ">
          <span class="float-start mb-2">
              <ul class="nav d-flex flex-column align-items-center justify-content-start">
                  <li class="nav-link px-5 text-start"><a href="vrt.php" class="nav-link text-white p-0">Vrt</a></li>
                  <li class="nav-link px-5"><a href="about.php" class="nav-link text-white p-0">Info</a></li>
                  <li class="nav-link px-5"><a href="calendar.php" class="nav-link text-white p-0">Kalendar</a></li>
              </ul>
          </span>
        <span class="float-end mb-2">
              <ul class="nav d-flex flex-column align-items-center">
                  <li class="nav-link px-5"><a href="#" class="nav-link text-white p-0">O nama</a></li>
                  <li class="nav-link px-5"><a href="#" class="nav-link text-white p-0">Politika privatnosti</a></li>
              </ul>
          </span>
    </div>
    <span class="text-white mt-3 pb-3">
              &copy; UrbanEden 2024
       </span>
</footer>

</body>
</html>