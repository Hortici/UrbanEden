<?php
/*Započinje sesiju na trenutnoj stranici*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Function to handle redirection
function redirect($url)
{
    // Ensure headers are not already sent
    if (!headers_sent()) {
        header("Location: $url");
        exit();
    } else {
        echo "<script type='text/javascript'>window.location.href='$url';</script>";
        exit();
    }
}

if (isset($_SESSION["korisnik"])) {
    /*Postavlja varijablu linkLogo na trenutnu stranicu te varijablu korisnik na ime trenutno ulogiranog korisnika*/
    $linkLogo = 'home.php';
    $korisnik = $_SESSION["korisnik"];
    $korId = $_SESSION["id"];
} else {
    $linkLogo = '../../index.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Eden</title>

    <!--Link personal css-->
    <link rel="stylesheet" href="../style.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!--Link Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Link Boostrap Icon Font-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>

    <!--Grid Demo-->
    <!-- support for IE -->
    <!--
        <script src="node_modules/gridstack/dist/es5/gridstack-poly.js"></script>
      <script src="node_modules/gridstack/dist/es5/gridstack-all.js"></script>
      <link rel="stylesheet" href="demo.css"/>
      -->

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body>
<?php
/*Ukoliko korisnik pritisne gumb odjava sesija se gasi te se korisnik preusmjerava na index.php stranicu*/
if (isset($_POST["odjava"])) {
    session_destroy();
    header("Location: ../../index.php");
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
            <!--Nav Toggle Gumb-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <!--Kraj Nav Toggle Gumb-->

                <!--Nav Extended-->
                <ul class="nav nav-pills justify-content-center align-items-center">
                    <li class="nav-item active"><a class="nav-link" href="vrt.php">Vrt</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">Info</a></li>
                    <li class="nav-item"><a class="nav-link" href="calendar.php">Kalendar</a></li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasExample"><a><i class="bi bi-person-fill fs-2"></i></a>
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
        <!--offcanvas profil sidebar-->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
             aria-labelledby="offcanvasExampleLabel">

            <div class="offcanvas-body">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <div class="d-flex flex-row  align-items-center justify-content-center">
                        <i class="bi bi-person-fill fs-2"></i>
                        <h2 class="m-0 ps-2"><?php echo $korisnik; ?></h2>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <hr>

                <form action="home.php" method="post" class="d-flex flex-column justify-content-start">
                    <button class="btn btn-primary m-2 w-50">Postavke</button>
                    <button type="submit" name="odjava" class="btn btn-primary m-2 w-50">Odjavi se</button>
                </form>
            </div>
        </div>
    </div>
</header>

<main class="w-75 justify-content-center mx-auto">

    <?php if (!isset($_POST["name"])) : ?>
        <h2>Unos vrta</h2>
        <div id="napraviVrt">
            <div class="d-flex justify-content-center">
                <div class="w-50">
                    <form name="gardenForm" id="gardenForm" action="gardenMaker.php" method="post">
                        <div class="unosIme my-4">
                            <label for="imevrt" class="form-label">Naziv:</label>
                            <input type="text" name="name" id="name" class="form-control" id="imevrt" required>
                        </div>
                        <div class="unosOpis my-3">
                            <label for="opisvrt" class="form-label">Opis:</label>
                            <textarea class="form-control" name="desc" id="desc" rows="3" required></textarea>
                        </div>
                        <div class="unosMjesta d-flex flex-column mb-5">
                            <label class="form-label">Mjesto uzgoja:</label>

                            <span class="m-2">
                                <input class="m-1 form-check-input place" type="radio" name="place" value="balkon"
                                       id="balkon"
                                       required>
                                <label for="balkon" class="form-check-label">Balkon</label>
                            </span>
                            <span class="m-2">
                                <input class="m-1 form-check-input place" type="radio" name="place" value="dvoriste"
                                       id="dvoriste"
                                       required>
                                <label for="dvoriste" class="form-check-label">Dvorište</label>
                            </span>
                            <!--
                            <span>
                                <input class="m-1 form-check-input place" type="radio" name="mjesto" id="polje" required>
                                <label for="polje" class="form-check-label">Polje</label>
                            </span>
                            -->
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary">
                                <a href="home.php" class="nav-link">Izlaz</a>
                            </button>
                            <button id="submit1" name="submit1" type="submit" class="btn btn-primary">
                                Sljedeći korak
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_POST["submit1"]) && ($_POST["place"] == "balkon")) : ?>
        <h2>Unos vrta - Balkon</h2>
        <div id="napraviVrt">
            <div class="d-flex justify-content-center">
                <div class="w-75">
                    <form name="layoutForm" id="layoutForm" action="gardenMaker.php" method="post">
                        <div class="label my-4">
                            <label for="label" class="form-label">Odaberite dimenzije:</label>
                        </div>
                        <div class="dimensions d-flex flex-row justify-content-between mb-5">
                            <div class="firstPick d-flex flex-column p-2">
                                <span class="ms-2 mb-5">
                                    <input class="m-1 form-check-input place" type="radio" name="layout" id="small"
                                           required>
                                    <label for="small" class="form-check-label">Sanduk 60x20 cm</label>
                                </span>
                                <img src="../assets/layout-pictures/60-20.svg" alt="60x20 placeholder">
                            </div>

                            <div class="secondPick d-flex flex-column p-2">
                                <span class="ms-2 mb-5">
                                    <input class="m-1 form-check-input place" type="radio" name="layout" id="big"
                                           required>
                                    <label for="big" class="form-check-label">Sanduk 80x60 cm</label>
                                </span>
                                <img src="../assets/layout-pictures/80-60.svg" alt="80x60 placeholder">
                            </div>

                        </div>
                        <input type="hidden" name="name" value="<?php echo $_POST["name"]; ?>">
                        <input type="hidden" name="desc" value="<?php echo $_POST["desc"]; ?>">
                        <input type="hidden" name="place" value="<?php echo $_POST["place"]; ?>">
                        <div class="d-flex justify-content-between my-3 pt-3">
                            <button type="button" class="btn btn-secondary">
                                <a href="home.php" class="nav-link">Izlaz</a>
                            </button>
                            <button id="submit2b" name="submit2b" type="submit" class="btn btn-primary">
                                Sljedeći korak
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_POST["submit1"]) && ($_POST["place"] == "dvoriste")) : ?>
        <h2>Unos vrta - Dvorište</h2>
        <div id="napraviVrt">
            <div class="d-flex justify-content-center">
                <div class="w-75">
                    <form name="layoutForm" id="layoutForm" action="gardenMaker.php" method="post">
                        <div class="label my-4">
                            <label for="label" class="form-label">Odaberite dimenzije:</label>
                        </div>
                        <div class="dimensions d-flex flex-row justify-content-between mb-5">
                            <div class="firstPick d-flex flex-column p-2">
                                <span class="ms-2 mb-5">
                                    <input class="m-1 form-check-input place" type="radio" value="1x2" name="dimension"
                                           id="small"
                                           required>
                                    <label for="small" class="form-check-label">1x2 m</label>
                                </span>
                                <img src="../assets/layout-pictures/1x2m.svg" alt="60x20 placeholder">
                            </div>

                            <div class="secondPick d-flex flex-column p-2">
                                <span class="ms-2 mb-5">
                                    <input class="m-1 form-check-input place" type="radio" value="3x4" name="dimension"
                                           id="big"
                                           required>
                                    <label for="big" class="form-check-label">3x4 m</label>
                                </span>
                                <img src="../assets/layout-pictures/3x4m.svg" alt="80x60 placeholder">
                            </div>
                        </div>
                        <input type="hidden" name="name" value="<?php echo $_POST["name"]; ?>">
                        <input type="hidden" name="desc" value="<?php echo $_POST["desc"]; ?>">
                        <input type="hidden" name="place" value="<?php echo $_POST["place"]; ?>">
                        <div class="d-flex justify-content-between my-3 pt-3">
                            <button type="button" class="btn btn-secondary">
                                <a href="home.php" class="nav-link">Izlaz</a>
                            </button>
                            <button id="submit2d" name="submit2d" type="submit" class="btn btn-primary">
                                Sljedeći korak
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_POST["submit2d"]) && ($_POST["place"] == "dvoriste")) : ?>
        <h2>Unos vrta - Dvorište</h2>
        <div id="napraviVrt">
            <div class="d-flex justify-content-center">
                <div class="w-75">
                    <form name="layoutForm" id="layoutForm" action="gardenMaker.php" method="post">
                        <div class="label my-4">
                            <label for="label" class="form-label">Odaberite raspodjelu sekcija u vrtu:</label>
                        </div>
                        <div class="dimensions d-flex flex-row flex-wrap justify-content-start mb-5">
                            <div class="firstPick d-flex flex-column p-2 me-4">
                                <span class="ms-2 mb-3">
                                    <input class="m-1 form-check-input place" type="radio" name="layout" value="3row-3cell"
                                           id="3r3cell"
                                           required>
                                    <label for="" class="form-check-label"></label>
                                </span>
                                <img src="../assets/layout-pictures/3row-3cell.svg" alt="60x20 placeholder">
                            </div>

                            <div class="secondPick d-flex flex-column p-2 me-4">
                                <span class="ms-2 mb-3">
                                    <input class="m-1 form-check-input place" type="radio" name="layout" value="4row"
                                           id="4r"
                                           required>
                                    <label for="" class="form-check-label"></label>
                                </span>
                                <img src="../assets/layout-pictures/4row.svg" alt="80x60 placeholder">
                            </div>

                            <div class="thirdPick d-flex flex-column p-2">
                                <span class="ms-2 mb-3">
                                    <input class="m-1 form-check-input place" type="radio" name="layout" value="2row-3col"
                                           id="2r3col"
                                           required>
                                    <label for="" class="form-check-label"></label>
                                </span>
                                <img src="../assets/layout-pictures/2row-3col.svg" alt="80x60 placeholder">
                            </div>

                            <div class="forthPick d-flex flex-column p-2 me-4">
                                <span class="ms-2 mb-3">
                                    <input class="m-1 form-check-input place" type="radio" name="layout" value="3col"
                                           id="3col"
                                           required>
                                    <label for="" class="form-check-label"></label>
                                </span>
                                <img src="../assets/layout-pictures/3col.svg" alt="80x60 placeholder">
                            </div>

                            <div class="fifthPick d-flex flex-column p-2 me-4">
                                <span class="ms-2 mb-3">
                                    <input class="m-1 form-check-input place" type="radio" name="layout" value="2row-1block"
                                           id="2r1b"
                                           required>
                                    <label for="" class="form-check-label"></label>
                                </span>
                                <img src="../assets/layout-pictures/2row-1block.svg" alt="80x60 placeholder">
                            </div>
                        </div>
                        <input type="hidden" name="name" value="<?php echo $_POST["name"]; ?>">
                        <input type="hidden" name="desc" value="<?php echo $_POST["desc"]; ?>">
                        <input type="hidden" name="place" value="<?php echo $_POST["place"]; ?>">
                        <input type="hidden" name="dimension" value="<?php echo $_POST["dimension"]; ?>">
                        <div class="d-flex justify-content-between my-3 pt-3">
                            <button type="button" class="btn btn-secondary">
                                <a href="home.php" class="nav-link">Izlaz</a>
                            </button>
                            <button id="submit3d" name="submit3d" type="submit" class="btn btn-primary">
                                Sljedeći korak
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_POST["submit3d"]) && $_POST["place"] == "dvoriste") : ?>
        <h2>Količina svjetla:</h2>
        <div id="napraviVrt">
            <div class="d-flex justify-content-center">
                <div class="w-75">
                    <form name="lightForm" id="lightForm" action="gardenMaker.php" method="post">
                        <div class="label my-4">
                            <label for="label" class="form-label">
                                Koju količinu sunčevog svjetla bi dobivao Vaš vrt dnevno?
                            </label>
                        </div>
                        <div class="dimensions d-flex flex-column justify-content-between mb-5">
                            <div class="firstPick d-flex flex-column p-1">
                                <span class="ms-2 mb-3">
                                    <input class="m-1 form-check-input place" type="radio" name="light" value="none"
                                           id="none"
                                           required>
                                    <label for="none"
                                           class="form-check-label">Uvijek u sjeni, nema direktnog svjetla</label>
                                </span>
                            </div>

                            <div class="secondPick d-flex flex-column p-1">
                                <span class="ms-2 mb-3">
                                    <input class="m-1 form-check-input place" type="radio" name="light" value="some"
                                           id="some"
                                           required>
                                    <label for="some" class="form-check-label">
                                        2-4 sata direktnog svjetla, ostalo indirektno svjetlo
                                    </label>
                                </span>
                            </div>

                            <div class="thirdPick d-flex flex-column p-1">
                                <span class="ms-2 mb-3">
                                    <input class="m-1 form-check-input place" type="radio" name="light" value="good"
                                           id="good"
                                           required>
                                    <label for="good" class="form-check-label">
                                        6+ sati direktnog svjetla
                                    </label>
                                </span>
                            </div>
                        </div>
                        <input type="hidden" name="name" value="<?php echo $_POST["name"]; ?>">
                        <input type="hidden" name="desc" value="<?php echo $_POST["desc"]; ?>">
                        <input type="hidden" name="place" value="<?php echo $_POST["place"]; ?>">
                        <input type="hidden" name="dimension" value="<?php echo $_POST["dimension"]; ?>">
                        <input type="hidden" name="layout" value="<?php echo $_POST["layout"]; ?>">
                        <div class="d-flex justify-content-between my-3 pt-3">
                            <button type="button" class="btn btn-secondary">
                                <a href="home.php" class="nav-link">Izlaz</a>
                            </button>
                            <button id="submit4" name="submit4" type="submit" class="btn btn-primary">
                                Kreiraj vrt
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php
    if (isset($_POST["submit4"]) && $_POST["place"] == "dvoriste") {
        $name = $_POST["name"];
        $description = $_POST["desc"];
        $place = $_POST["place"];
        $dimension = $_POST["dimension"];
        $layout = $_POST["layout"];
        $light = $_POST["light"];

        try {
            require_once("connect.php");
            if (isset($connected)) {
                $sql = "INSERT INTO vrtovi (korisnik, korId, name, description, place, dimension, layout, light) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($connected);
                $prepare = mysqli_stmt_prepare($stmt, $sql);
                if ($prepare) {
                    mysqli_stmt_bind_param($stmt, "sissssss", $korisnik, $korId, $name, $description, $place, $dimension, $layout, $light);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'> Vrt unesen!</div>";
                    mysqli_close($connected);
                    redirect("home.php");
                } else {
                    /*Unos podatak nije bio uspješan*/
                    die("Unso vrta nije uspjeo");
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>

</main>

<!-- Footer sa nav elementima i  copyrightom -->
<footer class="position-relative bottom-0 d-flex flex-column align-items-center justify-content-between"
        style="background-color:#005A00; min-height:100px;">
    <div class="container-fluid w-50 px-0 pt-2 d-flex flex-row align-items-center justify-content-between ">
            <span class="float-start mb-2">
                <ul class="nav d-flex flex-column align-items-center justify-content-start">
                    <li class="nav-link px-5 text-start"><a href="vrt.php"
                                                            class="nav-link text-white p-0">Vrt</a></li>
                    <li class="nav-link px-5"><a href="about.php" class="nav-link text-white p-0">Info</a></li>
                    <li class="nav-link px-5"><a href="calendar.php"
                                                 class="nav-link text-white p-0">Kalendar</a></li>
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