<?php
/*Započinje sesiju na trenutnoj stranici*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["korisnik"])) {
    /*Postavlja varijablu linkLogo na trenutnu stranicu te varijablu korisnik na ime trenutno ulogiranog korisnika*/
    $linkLogo = 'home.php';
    $korisnik = $_SESSION["korisnik"];
    $korisnikId = $_SESSION["id"];
} else {
    $linkLogo = 'index.php';
}
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

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
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

                <form action="vrt.php" method="post" class="d-flex flex-column justify-content-start">
                    <button class="btn btn-primary m-2 w-50">Postavke</button>
                    <button type="submit" name="odjava" class="btn btn-primary m-2 w-50">Odjavi se</button>
                </form>
            </div>
        </div>
    </div>
</header>

<main class="w-75 justify-content-center mx-auto">
    <!--Sažetak tablica-->
    <?php
    try {
        require_once("connect.php");
        if (isset($_POST["vrtId"]) && isset($connected)) {
            $vrtId = $_POST["vrtId"];
            $_SESSION["vrtId2"] = $vrtId;
            $sql = "SELECT * FROM vrtovi WHERE id = $vrtId";
            $rows_gardens = mysqli_query($connected, $sql);
            $res = $rows_gardens->fetch_assoc();

            $sql = "SELECT * FROM biljke_info ORDER BY id ASC";
            $rows_plants = mysqli_query($connected, $sql);
            $resPlant = $rows_plants->fetch_assoc();
            ?>
            <?php if ($res['layout'] == "4row") : ?>
                <h2><?php echo $res['name'] ?></h2>
                <div class="d-grid">
                    <table class="d-flex justify-content-center align-items-center p-5">

                        <tbody class="d-flex flex-column rounded-3 bg-secondary w-50 justify-content-center"
                               style="height: 70vh;">
                        <tr class="row px-4 py-2 d-flex justify-content-center h-25">
                            <td class="bg-secondary-subtle m-2 p-2 d-inline-flex align-items-center justify-content-center text-center">
                                <div class="px-2" style="width: fit-content;">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#addPlantModal">
                                        <img src="..\assets\vegetableIcons\<?php if ($res['biljka1']){echo $resPlant['ikonica_biljke'];} else {echo 'plusic.png';} ?>" alt="dodaj biljku"></a>
                                </div>
                            </td>
                        </tr>

                        <tr class="row px-4 py-2 d-flex justify-content-center h-25">
                            <td class="bg-secondary-subtle m-2 p-2 d-inline-flex align-items-center justify-content-center text-center">
                                <div class="px-2" style="width: fit-content;">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#addPlantModal"><i class="bi bi-plus-square fs-1 text-black"></i></a>
                                </div>
                            </td>
                        </tr>

                        <tr class="row px-4 py-2 d-flex justify-content-center h-25">
                            <td class="bg-secondary-subtle m-2 p-2 d-inline-flex align-items-center justify-content-center text-center">
                                <div class="px-2" style="width: fit-content;">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#addPlantModal"><i class="bi bi-plus-square fs-1 text-black"></i></a>
                                </div>
                            </td>
                        </tr>

                        <tr class="row px-4 py-2 d-flex justify-content-center h-25">
                            <td class="bg-secondary-subtle m-2 p-2 d-inline-flex align-items-center justify-content-center text-center">
                                <div class="px-2" style="width: fit-content;">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#addPlantModal"><i class="bi bi-plus-square fs-1 text-black"></i></a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            <?php if ($res['layout'] != "4row") : ?>
                <h2><?php echo $res['name'] ?></h2>
            <?php endif; ?>
            <?php
        } elseif (isset($connected)) {
            $sql = "SELECT * FROM vrtovi WHERE korisnik = '$korisnik' LIMIT 1";
            $rows_gardens = mysqli_query($connected, $sql);
            $res = $rows_gardens->fetch_assoc();

            $sql = "SELECT * FROM biljke_info ORDER BY id ASC";
            $rows_plants = mysqli_query($connected, $sql);
            $resPlant = $rows_plants->fetch_assoc();
            if ($res) {
                ?>
                <?php if ($res['layout'] == "4row") : ?>
                    <h2><?php echo $res['name'] ?></h2>
                    <div class="d-grid">
                        <table class="d-flex justify-content-center align-items-center p-5">

                            <tbody class="d-flex flex-column rounded-3 bg-secondary w-50 justify-content-center"
                                   style="height: 70vh;">
                            <tr class="row px-4 py-2 d-flex justify-content-center h-25">
                                <td class="bg-secondary-subtle m-2 p-2 d-inline-flex align-items-center justify-content-center text-center">
                                    <div class="px-2" style="width: fit-content;">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#addPlantModal"><img src="..\assets\vegetableIcons\<?php if ($res['biljka1']){echo $resPlant['ikonica_biljke'];} else {echo 'plusic.png';} ?>" alt="dodaj biljku"></a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="row px-4 py-2 d-flex justify-content-center h-25">
                                <td class="bg-secondary-subtle m-2 p-2 d-inline-flex align-items-center justify-content-center text-center">
                                    <div class="px-2" style="width: fit-content;">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#addPlantModal"><i class="bi bi-plus-square fs-1 text-black"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="row px-4 py-2 d-flex justify-content-center h-25">
                                <td class="bg-secondary-subtle m-2 p-2 d-inline-flex align-items-center justify-content-center text-center">
                                    <div class="px-2" style="width: fit-content;">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#addPlantModal"><i class="bi bi-plus-square fs-1 text-black"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="row px-4 py-2 d-flex justify-content-center h-25">
                                <td class="bg-secondary-subtle m-2 p-2 d-inline-flex align-items-center justify-content-center text-center">
                                    <div class="px-2" style="width: fit-content;">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#addPlantModal"><i class="bi bi-plus-square fs-1 text-black"></i></a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>

                <?php if ($res['layout'] != "4row") : ?>
                    <h2><?php echo $res['name'] ?></h2>

                <?php endif; ?>
                <?php
            } else {
                echo "Nemate niti jedan";
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    ?>

    <div class="modal fade" id="addPlantModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dodavanje biljke</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="d-flex" role="search">
                        <input class="form-control me-2 mb-3" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success mb-3" type="submit">Search</button>
                    </form>
                    <!--Recommended plants-->
                    <h4>Preporučene biljke</h4>
                    <div class="d-grid mb-5">
                        <div class="row row-cols-3">
                            <?php
                            //require_once "../connect.php";
                            try {
                                require_once("connect.php");
                                if (isset($connected)) {
                                    $sql = "SELECT * FROM biljke_info ORDER BY id ASC LIMIT 3";
                                    $rows_plants = mysqli_query($connected, $sql);

                                    foreach ($rows_plants as $row_plant) {
                                        echo "<section id='plant' class='d-flex mt-3 col'>";
                                        echo "<span class='col p-3 nav-link bg-secondary-subtle rounded-3 d-flex flex-column justify-content-center align-items-center' data-bs-toggle='modal' data-bs-target='#eachPlantModal' role='button'>";
                                        echo "<img src='../assets/vegetableIcons/" . $row_plant['ikonica_biljke'] . "' alt='" . $row_plant['ime'] . "' class='h-auto mb-2'>";
                                        echo "<strong>" . $row_plant['ime'] . "</strong>";
                                        echo "<p class='mb-1 text-secondary'>" . $row_plant['razina'] . "</p>";
                                        echo "</span>";
                                        echo "</section>";
                                    }
                                }
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>
                        </div>

                    </div>
                    <!--All plants-->
                    <h4>Sve biljke</h4>
                    <div class="d-grid gap-2 mb-5">
                        <div class="row row-cols-3">
                            <?php
                            //require_once "../connect.php";
                            try {
                                require_once("connect.php");
                                if (isset($connected)) {
                                    $sql = "SELECT * FROM biljke_info ORDER BY id ASC";
                                    $rows_plants = mysqli_query($connected, $sql);

                                    foreach ($rows_plants as $row_plant) {
                                        echo "<section id='plant' class='d-flex mt-3 col'>";
                                        //echo "<form name='". $row_plant['id'] ."' method='post' action='vrt.php' onclick=\"this.closest('form').submit();\">";
                                        echo "<input type='hidden' name='plantId' value='". $row_plant['id'] ."'>";
                                        echo "<span class='col p-3 nav-link bg-secondary-subtle rounded-3 d-flex flex-column justify-content-center align-items-center' data-bs-toggle='modal' data-bs-target='#eachPlantModal' role='button'>";
                                        echo "<img src='../assets/vegetableIcons/" . $row_plant['ikonica_biljke'] . "' alt='" . $row_plant['ime'] . "' class='h-auto mb-2'>";
                                        echo "<strong>" . $row_plant['ime'] . "</strong>";
                                        echo "<p class='mb-1 text-secondary'>" . $row_plant['razina'] . "</p>";
                                        echo "</span>";
                                        //echo "</form>";
                                        echo "</section>";
                                    }

                                }
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Each Modal-->
    <div class="modal fade" id="eachPlantModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i role="button" class="bi bi-arrow-left" data-bs-toggle="modal"
                       data-bs-target="#addPlantModal"></i>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    //require_once "../connect.php";
                    try {
                        require_once("connect.php");
                        if (isset($connected)) {
                            //$plantId = $_POST['plantId'];
                            $sql = "SELECT * FROM biljke_info WHERE id = '21'";
                            $rows_plants = mysqli_query($connected, $sql);

                            foreach ($rows_plants as $row_plant) { ?>
                                <div class="top">
                                    <div class="name">
                                        <h4 id="name" class="mb-1"><?php echo $row_plant['ime']?></h4>
                                        <p id="lvl" class="mb-3 text-secondary"><?php echo $row_plant['razina']?></p>
                                    </div>
                                    <div class="data d-grid">
                                        <div class="row row-cols-4">
                                            <div class="col-7">
                                                <p id="toxic" class="p-1 bg-danger-subtle rounded-2 col-4"><?php echo $row_plant['otrovnost_info']?></p>
                                                <p id="calendarPeriod" class="p-1 bg-success-subtle rounded-2 col-8"><?php echo $row_plant['sjetva']?></p>
                                                <div id="light-harvest" class="d-flex flex-row">
                                            <span class="d-flex flex-row align-items-center rounded-start bg-warning mb-4 me-2 col-6">
                                                <i class="bi bi-sun p-2 mb-1"></i>
                                                <p class="mb-1 p-2" id="reqLight"><?php echo $row_plant['svjetlo']?></p>
                                            </span>
                                                    <span class="d-flex flex-row align-items-center rounded-end bg-warning mb-4 ms-2 col-6">
                                                <i class="bi bi-hand-index p-2 mb-1"></i>
                                                <p class="mb-1 p-2" id="harvestTime"><?php echo $row_plant['berba_dani']?></p>
                                            </span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <img src="" alt="">
                                            </div>
                                            <table class="table px-2">

                                                <tbody>
                                                <tr class="row justify-content-center">
                                                    <td class="bg-success-subtle col rounded-3 m-2 p-2 d-inline-flex align-items-center text-center">
                                                        <div class="rounded-5 bg-secondary px-2"
                                                             style="width: fit-content;">
                                                            <i class="bi bi-droplet-fill fs-4 text-white"></i>
                                                        </div>
                                                        <div class="px-2">
                                                            <span id="waterPeriod"
                                                                  class="fs-5 fw-bold"><?php echo $row_plant['zalijevanje_dani']?> puta tjedno</span>
                                                        </div>
                                                    </td>
                                                    <td class="bg-success-subtle col rounded-3 m-2 p-2 d-inline-flex align-items-center text-center">
                                                        <div class="rounded-5 bg-secondary px-2 "
                                                             style="width: fit-content;">
                                                            <i class="bi bi-droplet-fill fs-4 text-white"></i>
                                                        </div>
                                                        <div class="px-2">
                                                            <span id="turnoverPeriod" class="fs-5 fw-bold">svakih <?php echo $row_plant['okapanje_dani']?> dana</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="row">
                                                    <td class="bg-success-subtle col rounded-3 m-2 p-2 d-inline-flex align-items-center text-center">
                                                        <div class="rounded-5 bg-secondary px-2 "
                                                             style="width: fit-content;">
                                                            <i class="bi bi-scissors fs-4 text-white"></i>
                                                        </div>
                                                        <div class="px-2">
                                                            <span id="cutPeriod"
                                                                  class="fs-5 fw-bold"><?php echo $row_plant['rezanje_dani']?></span>
                                                        </div>
                                                    </td>
                                                    <td class="bg-success-subtle col rounded-3 m-2 p-2 d-inline-flex align-items-center text-center">
                                                        <div class="rounded-5 bg-secondary px-2 "
                                                             style="width: fit-content;">
                                                            <i class="bi bi-scissors fs-4 text-white"></i>
                                                        </div>
                                                        <div class="px-2">
                                                            <span id="fertilizePeriod" class="fs-5 fw-bold"><?php echo $row_plant['gnojenje_dani']?> puta tjedno</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="moreInfo col-12 mb-5">
                                        <span class="d-flex flex-row">
                                            <strong>Dobri susjedi:</strong>
                                            <p class="ms-2 col-5" id="goodNeighbour"><?php echo $row_plant['dobriSusjedi']?></p>
                                        </span>
                                                <span class="d-flex flex-row">
                                            <strong>Loši susjedi:</strong>
                                            <p class="ms-2 col-5" id="badNeighbour"><?php echo $row_plant['losiSusjedi']?></p>
                                        </span>
                                                <span class="d-flex flex-row">
                                            <strong>Broj sadnica u redu od 1m:</strong>
                                            <p class="ms-2 col-5" id="quantityRow">5</p>
                                        </span>
                                                <span class="d-flex flex-row">
                                            <strong>Broj sadnica u stupcu od 1m:</strong>
                                            <p class="ms-2 col-5" id="quantityCol">2</p>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    ?>
                    <div class="d-flex flex-column justify-self-center w-50">
                            <?php
                            foreach ($rows_plants as $row_plant) {
                            ?>
                                <form action="cropAbout.php" method="post">
                                    <button type="submit" id="more" name="more" class="btn btn-secondary">Više informacija</button>
                                    <input type="hidden" id="plantId" name="plantId" value="<?php echo $row_plant['id']?>">
                                </form>
                            <?php }?>
                            <?php
                            foreach ($rows_plants as $row_plant) {
                                ?>
                                <form action="vrt.php" method="post">
                                    <input type="hidden" id="plantId" name="plantId" value="<?php echo $row_plant['id']?>">
                                    <input type="hidden" id="vrtId2" name="vrtId2" value="">
                                    <button type="submit" id="add" name="add" class="btn btn-primary py-3 px-4 mt-4">Dodaj u vrt</button>
                                </form>
                            <?php }?>
                    </div>
                    <?php
                        if (isset($_POST['add'])) {
                            try {
                                require_once("connect.php");
                                if (isset($connected)) {
                                    $biljkaId = $_POST['plantId'];
                                    $vrtId2 = $_SESSION['vrtId2'];
                                    $sql = "UPDATE vrtovi SET biljka1=? WHERE id = $vrtId2";
                                    $stmt = mysqli_stmt_init($connected);
                                    $prepare = mysqli_stmt_prepare($stmt, $sql);
                                    if ($prepare) {
                                        mysqli_stmt_bind_param($stmt, "i", $biljkaId);
                                        mysqli_stmt_execute($stmt);
                                        //echo "<div class='alert alert-success'> Biljka unesena!</div>";
                                    } else {
                                        /*Unos podatak nije bio uspješan*/
                                        die("Unos biljke nije uspio");
                                    }
                                }
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Footer sa nav elementima i  copyrightom -->
<footer class="position-relative bottom-0 d-flex flex-column align-items-center justify-content-between"
        style="background-color:#005A00; min-height:100px;">
    <div class="container-fluid w-50 px-0 pt-2 d-flex flex-row align-items-center justify-content-between ">
            <span class="float-start mb-2">
                <ul class="nav d-flex flex-column align-items-center justify-content-start">
                    <li class="nav-link px-5 text-start"><a href="vrt.html" class="nav-link text-white p-0">Vrt</a></li>
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