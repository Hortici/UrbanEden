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
        <script src="modal.js"></script>
        <div class="top mb-5">
            <div class="name">
                <h4 id="name" class="mb-1">Blitva</h4>
                <i>Beta vulgaris</i>
                <p id="lvl" class="mb-3 text-secondary">
                    početnička razina 
                    <span id="toxic" class="p-1 bg-danger-subtle rounded-2 col-4">
                        neotrovno
                    </span>
                </p>
                
            </div>
            <div class="data d-grid border border-2 rounded-3 py-4 px-3">
                <div class="row row-cols-4">
                    <div class="description col-7">
                        <p>Blitva je dvogodišnja biljka. U prvoj godini razvije dubok i razgranat korijen, koji je u gornjem dijelu zadebljan, skraćenu stabljiku i rozetu lišća. U drugoj godini razvije se razganata cvjetna stabljika visine do 1,2 m. Uzgaja se radi lišća, a koristi se i plojka i peteljka.</p>
                        <button class="btn btn-primary py-2 px-4">Sažetak</button>
                    </div>
                    <div class="col">
                    <img src="assets/images/blitva-pic.svg" alt="picture of a blitva">
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
                <p>Blitva ima veliku mogućnost prilagodbe tlu i klimi. Minimalna je temperatura klijanja 5 °C, a optimalna 16 - 24 °C. Pri nižim temperaturama 5 - 10 °C biljka sporo raste, a optimalna temperatura rasta je 16 - 20 °C. I mlada i potpuno razvijena biljka može podnijeti blage mrazove.</p>
                <h3 class="mt-4">Voda</h3>
                <p>Tijekom uzgoja potrebno je osigurati dovoljnu količinu vode, posebno u područjima gdje se javlja manjak vode ili je ona neravnomjerno raspoređena. Smatra se da je tijekom uzgoja potrebno 4 - 6 navodnjavanja da bi se postigli optimalni prinosi. Tijekom sušnih perioda biljkama treba 9 - 13 l vode tjedno, ali su i iznenađujuće otporne na sušu. S obzirom na kvalitetu vode blitva pripada jednoj od rijetkih kultura koje su tolerantne na slanu vodu. Izbjegavati prekomjerno zalijevanje i pustiti da se tlo osuši kako bi se izbjegle infekcije.</p>
                <h3 class="mt-4">Tlo</h3>
                <p>Blitva nema velike zahtjeve prema tlu, ali najbolje uspijeva na dubokim strukturnim tlima dobre propusnosti za vodu i dobrog kapaciteta za zrak uz pH 6 do 8. Podnosi blago zaslanjena tla. U vegetativnoj fazi dobro uspijeva pri različitim klimatskim uvjetima, od mediteranskih, kontinentalnih do planinskih, pri različitim rokovima sjetve. U priobalnom području može prezimiti.</p>
                <h3 class="mt-4">Plodored</h3>
                <p>Blitva ne podnosi monokulturu. Na istom tlu ne smije se uzgajati najmanje 3 godine, a isto tako niti jedna kultura iz roda Beta. Preporučuje se uzgoj nakon kulture gnojene organskim gnojivima. Dobro uspijeva uz sve vrste graha, osim trešnjevca, te uz kupusnjače, crveni luk i salatu. Godi joj i začinsko bilje poput žalfije, majčine dušice, metvice, kopra i sipana.</p>
                <h3 class="mt-4">Okopavanje</h3>
                <p>Budući da blitva ima dubok korijen i može koristiti vodu iz dubljih slojeva, duboka obrada tla obavlja se na 30 - 40 cm, a predsjetvena priprema mora omogućiti jednoličnu dubinu sjetve. Za ranu proljetnu sjetvu prikladne su uzdignute gredice.</p>
                <h3 class="mt-4">Gnojidba</h3>
                <p>Prije sjetve ili sadnje u mineralnoj gnojidbi dodaje se 80 - 100 kg/ha fosfora i 50 do 100 kg kalija. Dušična prihrana sa 100 - 150 kg/ha KAN-a provodi se u 3 - 4 navrata nakon berbe listova.</p>
                <h3 class="mt-4">Sjetva/sadnja</h3>
                <p>Blitva se obično sije izravno, ali za ranu proizvodnju može se uzgojiti i iz presadnica proizvedenih u grijanim zaštićenim prostorima. U kontinentalnim područjima sije se na otvoreno od kraja ožujka do kraja svibnja. Za presadnice iz zaštićenih prostora uz zagrijavanje na temperaturu višu od 15 °C potrebno je oko 5 tjedana. Presadnice sa 3 - 5 pravih listova presađuju se u prvoj polovici travnja.
                <br> <br>
                Na otvoreno se sije 30 - 50 cm red od reda, a prorjeđuje se na razmak 20 - 30 cm u redu. Presadnice se obično sade na razmak u redu 30 - 40 cm, odnosno 5 - 9 biljaka po četvornom metru. Za 1 ha potrebno je 15 - 20 kg sjemena, a za proizvodnju presadnica golog korijena na gredici 5 - 10 g po metru četvornom. U mediteranskom području može se sijati na isti način od veljače do kraja travnja, a za jesensku i zimsku berbu od kolovoza do početka rujna.</p>
                <h3 class="mt-4">Njega</h3>
                <p>Blitva se ne reže, ali ju je potrebno prorjeđivati. S prorjeđivanjem se započinje kada biljka naraste nekoliko centimetara, ostavljaju se samo zdravi listovi i pazi se da su biljke međusobno udaljene 20-25  cm.</p>
                <h3 class="mt-4">Otrovnost</h3>
                <p>Blitva nije otrovna za životinje.</p>
            </article>
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