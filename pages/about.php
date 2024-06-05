<?php
/*Započinje sesiju na trenutnoj stranici*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["korisnik"])) {
    /*Postavlja varijablu linkLogo na trenutnu stranicu te varijablu korisnik na ime trenutno ulogiranog korisnika*/
    $linkLogo = 'home.php';
    $korisnik = $_SESSION["korisnik"];
} else {
    $linkLogo = 'index.php';
}

/*Ukoliko korisnik pritisne gumb odjava sesija se gasi te se korisnik preusmjerava na index.php stranicu*/
if (isset($_POST["odjava"])) {
    session_destroy();
    header("Location: ../index.php");
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

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</head>

<body>

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

                <form action="about.php" method="post" class="d-flex flex-column justify-content-start">
                    <button class="btn btn-primary m-2 w-50">Postavke</button>
                    <button type="submit" name="odjava" class="btn btn-primary m-2 w-50">Odjavi se</button>
                </form>
            </div>
        </div>
    </div>
</header>


<main class="w-75 justify-content-center mx-auto">
    <!--Info dio-->
    <h2>Info</h2>
    <section class="d-flex justify-content-center">
        <form class="d-flex w-75" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </section>
    <div class="mt-5">
        <h2>Biljke</h2>
        <section class="d-flex flex-row gap-3">
                <span class="col-1 p-2 nav-link bg-success opacity-75 rounded-3 text-center text-white">
                    <a href="" class="nav-link">sve</a>
                </span>
            <span class="col-2 p-2 nav-link bg-secondary-subtle rounded-3 text-center">
                    <a href="" class="nav-link">početnička razina</a>
                </span>
            <span class="col-2 p-2 nav-link bg-secondary-subtle rounded-3 text-center">
                    <a href="" class="nav-link">srednja razina</a>
                </span>
            <span class="col-2 p-2 nav-link bg-secondary-subtle rounded-3 text-center">
                    <a href="" class="nav-link">napredna razina</a>
                </span>
        </section>

        <div class="d-flex flex-row flex-wrap gap-3">
            <?php
            //require_once "../connect.php";
            try {
                require_once $_SERVER["DOCUMENT_ROOT"]."/connect.php";
                if (isset($connected)) {
                    $sql = "SELECT * FROM biljke_info ORDER BY id DESC";
                    $rows_plants = mysqli_query($connected, $sql);

                    foreach ($rows_plants as $row_plant) {
                        echo "<section class='d-flex mt-5 col-2'>";
                        echo "<span class='col p-3 nav-link bg-secondary-subtle rounded-3 d-flex flex-column justify-content-center align-items-center' role='button'>";
                        echo "<img src='../assets/vegetableIcons/" . $row_plant['ikonica_biljke'] . "' alt='chard' class='h-auto mb-2'></img>";
                        echo "<strong>" . $row_plant['ime'] . "</strong>";
                        echo "<p class='mb-1 text-secondary'>" . $row_plant['razina'] . "</p>";
                        echo "</span>";
                        echo "</section>";
                    }
                    mysqli_close($connected);
                }
            }catch (Exception $e){
                echo $e->getMessage();
            }
            ?>
        </div>
    </div>

    <div class="mt-5 pt-5 mb-5 pb-5">
        <h2>Članci</h2>
        <section class="d-flex flex-row gap-3">
                <span class="col-1 p-2 nav-link bg-success opacity-75 rounded-3 text-center text-white">
                    <a href="" class="nav-link">sve</a>
                </span>
            <span class="col-2 p-2 nav-link bg-secondary-subtle rounded-3 text-center">
                    <a href="" class="nav-link">savjeti</a>
                </span>
            <span class="col-2 p-2 nav-link bg-secondary-subtle rounded-3 text-center">
                    <a href="" class="nav-link">uradi sam</a>
                </span>
            <span class="col-2 p-2 nav-link bg-secondary-subtle rounded-3 text-center">
                    <a href="" class="nav-link">eko</a>
                </span>
            <span class="col-2 p-2 nav-link bg-secondary-subtle rounded-3 text-center">
                    <a href="" class="nav-link">permakultura</a>
                </span>
        </section>

        <table class="table mx-2 mt-3">
            <tbody>
            <tr class="d-flex align-items-center row bg-secondary-subtle rounded p-2 my-3 col-sm-12">
                <td class="col-3 rounded-3 m-2 p-0 h-100">
                    <img src="../assets/clanci/Rectangle 24 (1).svg" alt="" class="w-100 h-auto">
                </td>
                <td class="col-8 d-flex flex-column justify-content-start align-items-c bg-secondary-subtle ms-3">
                    <h3>Kako kontrolirati biljne uši - preventiva, prirodni neprijatelji i sredstva za suzbijanje</h3>
                    <span class="text-secondary pb-4 pt-0">savjeti, eko</span>

                    <p class="m-0">Lisne uši su jedne od najčešćih nametnika na biljkama. Sisanjem im oduzimaju
                        hranjiva, a medna rosa koju luče mami mrave i jednu vrstu gljivica koja potom na listovima
                        stvara crnu čađavost. Osim toga, prijenosnici su i virusnih bolesti. </p>
                </td>
            </tr>

            <tr class="d-flex align-items-center row bg-secondary-subtle rounded p-2 my-3 col-sm-12">
                <td class="col-3 rounded-3 m-2 p-0 h-100">
                    <img src="../assets/clanci/Rectangle 24.svg" alt="" class="w-100 h-auto">
                </td>
                <td class="col-8 d-flex flex-column justify-content-start align-items-c bg-secondary-subtle ms-3">
                    <h3>Što ako su presadnice spremne za sadnju, a vremenski uvjeti to ne dopuštaju?</h3>
                    <span class="text-secondary pb-4 pt-0">savjeti</span>

                    <p class="m-0">Nedavne vrlo visoke temperature ubrzale su i rast presadnica. No, trenutačne
                        vremenske prilike nisu dobre za sadnju na otvoreno. Kako usporiti rast presadnica?</p>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</main>

<!-- Footer sa nav elementima i  copyrightom -->
<footer class="position-relative bottom-0 d-flex flex-column align-items-center justify-content-between"
        style="background-color:#005A00; min-height:100px;">
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