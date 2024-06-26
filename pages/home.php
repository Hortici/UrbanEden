<?php
/*Započinje sesiju na trenutnoj stranici*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["korisnik"])) {
    /*Postavlja varijablu linkLogo na trenutnu stranicu te varijablu korisnik na ime trenutno ulogiranog korisnika*/
    $linkLogo = 'home.php';
    $korisnik = $_SESSION["korisnik"];
    $korId = $_SESSION["id"];
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
    <!--Sažetak tablica-->
    <div class="d-grid">
        <table class="table">
            <thead><h2>Sažetak</h2></thead>

            <tbody>
            <tr class="row justify-content-center">
                <td class="bg-secondary-subtle col rounded-3 m-2 p-2 d-inline-flex align-items-center text-center">
                    <div class="rounded-5 bg-secondary px-2" style="width: fit-content;">
                        <i class="bi bi-droplet-fill fs-4 text-white"></i>
                    </div>
                    <div class="px-2">
                        <span class="fs-5 fw-bold">Zaljevanje</span>
                        <span class="mx-3"> Ime vrta1, Ime vrta2</span>
                    </div>
                </td>

                <td class="bg-secondary-subtle col rounded-3 m-2 p-2 d-inline-flex align-items-center text-center">
                    <div class="rounded-5 bg-secondary px-2 " style="width: fit-content;">
                        <i class="bi bi-droplet-fill fs-4 text-white"></i>
                    </div>
                    <div class="px-2">
                        <span class="fs-5 fw-bold">Zaljevanje</span>
                        <span class="mx-3"> Ime vrta1, Ime vrta2</span>
                    </div>
                </td>

            </tr>

            <tr class="row">
                <td class="bg-secondary-subtle col rounded-3 m-2 p-2 d-inline-flex align-items-center text-center">
                    <div class="rounded-5 bg-secondary px-2 " style="width: fit-content;">
                        <i class="bi bi-scissors fs-4 text-white"></i>
                    </div>
                    <div class="px-2">
                        <span class="fs-5 fw-bold">Rezanje</span>
                        <span class="mx-3"> Ime vrta1, Ime vrta2</span>
                    </div>
                </td>

                <td class="bg-secondary-subtle col rounded-3 m-2 p-2 d-inline-flex align-items-center text-center">
                    <div class="rounded-5 bg-secondary px-2 " style="width: fit-content;">
                        <i class="bi bi-scissors fs-4 text-white"></i>
                    </div>
                    <div class="px-2">
                        <span class="fs-5 fw-bold">Rezanje</span>
                        <span class="mx-3"> Ime vrta1, Ime vrta2</span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--Sažetak tablica-->

    <div class="d-flex justify-content-between align-items-center mt-5">
        <h2>Vrtovi</h2>
        <form action="gardenMaker.php">
            <button href="gardenMaker.php" style="border: none; background-color: white;"><i
                        class="bi bi-plus-square fs-2"></i></button>
        </form>
    </div>

    <hr>
    <table class="table">
        <tbody>
            <?php
            //require_once "../connect.php";
            try {
                require_once("connect.php");
                if (isset($connected)) {
                    $sql = "SELECT * FROM vrtovi WHERE korisnik = '$korisnik' AND korID = '$korId'";
                    $rows_gardens = mysqli_query($connected, $sql);

                    foreach ($rows_gardens as $row_garden) {
                        $fname= $row_garden['id'];
                        echo "<tr class='row bg-secondary-subtle rounded p-2 my-3 col-sm-12'>";
                        echo "<td class='col-4 row-2 bg-secondary rounded-3 m-2 d-flex justify-content-center'>";
                        echo "<img src='../assets/layout-pictures/". $row_garden['layout'] . ".png' alt='slikaVrta'  class='img-fluid rounded-2 overflow-hidden w-50 h-auto position-relative'>";
                        echo "</td>";
                        echo "<td class='col-6 d-flex flex-column justify-content-start align-items-c bg-secondary-subtle ms-3'>";
                        echo "<form name='". $fname ."' method='post' action='vrt.php'>
                              <input type='hidden' name='vrtId' value='$row_garden[id]'>
                              <h3><a href='#'  onclick=\"this.closest('form').submit();\" class='nav-link'>". $row_garden['name']."</a></h3>
                              </form>";
                        echo "<span>". $row_garden['place']."</span>";
                        echo "<br>";
                        echo "<p>". $row_garden['description']."</p>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    mysqli_close($connected);
                }
            }catch (Exception $e){
                echo $e->getMessage();
            }

            if(isset($_POST['vrt'])){
                echo "sadadadasd";
            }
            ?>
        </tbody>
    </table>
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