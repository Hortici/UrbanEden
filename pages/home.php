<?php
/*Započinje sesiju na trenutnoj stranici*/
session_start();
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
            <button data-bs-toggle="modal" data-bs-target="#napraviVrt" style="border: none; background-color: white;"><i class="bi bi-plus-square fs-2"></i></button>
        </div>

        <div class="modal fade" id="napraviVrt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Unos vrta</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="submit">
                        <div class="unosIme">
                            <label for="imevrt" class="form-label">Naziv vrta</label>
                            <input type="text" class="form-control" id="imevrt" placeholder="Unesite naziv vrta">
                        </div>
                        <hr>

                        <div class="birajLayout">
                            <table class="table">
                                <tr class="row">
                                    <td>

                                        <div class="row">
                                            <div class="flexbox col m-2 justify-content-start align-items-start">
                                                <input class="m-1 form-check-input" type="radio" name="layoutPick"
                                                       id="layoutPick1">
                                                <img src="../assets/layout-pictures/3row-3cell.png" alt="3row-3cell">
                                            </div>
                                            <div class="col m-2">
                                                <input class="m-1 form-check-input" type="radio" name="layoutPick"
                                                       id="layoutPick2">
                                                <img src="../assets/layout-pictures/4row.png" alt="4row">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col m-2">
                                                <input class="m-1 form-check-input" type="radio" name="layoutPick"
                                                       id="layoutPick3">
                                                <img src="../assets/layout-pictures/2row-3col.png" alt="2row-3col">
                                            </div>
                                            <div class="col m-2">
                                                <input class="m-1 form-check-input" type="radio" name="layoutPick"
                                                       id="layoutPick4">
                                                <img src="../assets/layout-pictures/3col.png" alt="3col">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col m-2">
                                                <input class="m-1 form-check-input" type="radio" name="layoutPick"
                                                       id="layoutPick5">
                                                <img src="../assets/layout-pictures/2row-1block.png" alt="2row-1block">
                                            </div>
                                            <div class="col m-2">

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                            <button type="submit" class="btn btn-primary"><a href="vrt.php" class="nav-link">Spremi
                                    Vrt</a>
                            </button>
                        </div>
                    </form>
              </div>
            </div>
          </div>

        <hr>
        <table class="table">
            <tbody>
                <tr class="row bg-secondary-subtle rounded p-2 my-3 col-sm-12">
                    <td class="col-4 row-1 bg-secondary rounded-3 m-2"></td>
                    <td class="col-6 d-flex flex-column justify-content-start align-items-c bg-secondary-subtle ms-3">
                        <h3>Ime Vrta</h3>
                        <span>balkon</span>
                        <br>
                        <p>Opis vrta... Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati doloremque aperiam a aliquid. Accusamus beatae velit quod voluptatibus, temporibus quo. Praesentium ea tenetur, sit provident cum ipsum ex officiis obcaecati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non id reiciendis soluta. Deserunt ipsam quidem porro, tenetur aliquam exercitationem, perspiciatis itaque deleniti iusto molestias voluptate libero. Cum fugit placeat harum.</p>
                    </td>
                </tr>

                <tr class="row bg-secondary-subtle rounded p-2 my-3 col-sm-12">
                    <td class="col-4 row-1 bg-secondary rounded-3 m-2"></td>
                    <td class="col-6 d-flex flex-column justify-content-start align-items-c bg-secondary-subtle ms-3">
                        <h3>Ime Vrta2</h3>
                        <span>dvorište</span>
                        <br>
                        <p>Opis vrta... Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati doloremque aperiam a aliquid. Accusamus beatae velit quod voluptatibus, temporibus quo. Praesentium ea tenetur, sit provident cum ipsum ex officiis obcaecati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non id reiciendis soluta. Deserunt ipsam quidem porro, tenetur aliquam exercitationem, perspiciatis itaque deleniti iusto molestias voluptate libero. Cum fugit placeat harum.</p>
                    </td>
                </tr>

                <tr class="row bg-secondary-subtle rounded p-2 my-3 col-sm-12" id="vrtTri">
                    
                    <td class="col-4 row-2 bg-secondary rounded-3 m-2 d-flex justify-content-center">
                        <img alt="slikaVrta" src="../assets/layout-pictures/vrt-img.png"  class="img-fluid rounded-2 overflow-hidden w-50 h-auto position-relative">
                    </td>
                    <td class="col-6 d-flex flex-column justify-content-start align-items-c bg-secondary-subtle ms-3">
                        <h3><a href="vrt.php" class="nav-link">Moj treći vrt</a></h3>
                        <span>dvorište</span>
                        <br>
                        <p>Opis vrta... Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati doloremque aperiam a aliquid. Accusamus beatae velit quod voluptatibus, temporibus quo. Praesentium ea tenetur, sit provident cum ipsum ex officiis obcaecati. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non id reiciendis soluta. Deserunt ipsam quidem porro, tenetur aliquam exercitationem, perspiciatis itaque deleniti iusto molestias voluptate libero. Cum fugit placeat harum.</p>
                    </td>
                    
                </tr>
            </tbody>
        </table>
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