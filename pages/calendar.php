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

/*Ukoliko korisnik pritisne gumb odjava sesija se gasi te se korisnik preusmjerava na index.php stranicu*/
if (isset($_POST["odjava"])){
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

    <!-- support for IE -->
    <script src="node_modules/gridstack/dist/es5/gridstack-poly.js"></script>
    <script src="node_modules/gridstack/dist/es5/gridstack-all.js"></script>

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <!--Calendar Demo-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="../datepicker/src/style.css">

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
                  <li class="nav-item"><a class="nav-link" href="calendar.html">Kalendar</a></li>
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
            
            <form action="calendar.php" method="post" class="d-flex flex-column justify-content-start">
                <button class="btn btn-primary m-2 w-50">Postavke</button>
                <button type="submit" name="odjava" class="btn btn-primary m-2 w-50">Odjavi se</button>
            </form>
        </div>
    </div>
  </div>
</header>

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <div>
                  Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
                </div>
              </div>
            </div>
  
  
      </div>
  </header>

  <main class=" h-100 d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
        <h2 class="fs-2"><strong>Kalendar</strong></h2>

        <div class="datepicker">
          <div class="datepicker-top">
            <div class="btn-group">
              <button class="tag">Today</button>
              <button class="tag">Tomorrow</button>
              <button class="tag">In 2 days</button>
            </div>
            <div class="month-selector">
              <button class="arrow"><i class="bi bi-chevron-left"></i></button>
              <span class="month-name">December 2020</span>
              <button class="arrow"><i class="bi bi-chevron-right"></i></button>
            </div>
          </div>
          <div class="datepicker-calendar">
            <span class="day">Mo</span>
            <span class="day">Tu</span>
            <span class="day">We</span>
            <span class="day">Th</span>
            <span class="day">Fr</span>
            <span class="day">Sa</span>
            <span class="day">Su</span>
            <button class="date faded">30</button>
            <button class="date">1</button>
            <button class="date">2</button>
            <button class="date">3</button>
            <button class="date">4</button>
            <button class="date">5</button>
            <button class="date">6</button>
            <button class="date">7</button>
            <button class="date">8</button>
            <button class="date current-day">9</button>
            <button class="date">10</button>
            <button class="date">11</button>
            <button class="date">12</button>
            <button class="date">13</button>
            <button class="date">14</button>
            <button class="date">15</button>
            <button class="date">16</button>
            <button class="date">17</button>
            <button class="date">18</button>
            <button class="date">19</button>
            <button class="date">20</button>
            <button class="date">21</button>
            <button class="date">22</button>
            <button class="date">23</button>
            <button class="date">24</button>
            <button class="date">25</button>
            <button class="date">26</button>
            <button class="date">27</button>
            <button class="date">28</button>
            <button class="date">29</button>
            <button class="date">30</button>
            <button class="date">31</button>
            <button class="date faded">1</button>
            <button class="date faded">2</button>
            <button class="date faded">3</button>
          </div>
        </div>
        
    </main>

    <!-- Footer sa nav elementima i  copyrightom -->
    <footer class="position-relative bottom-0 d-flex flex-column align-items-center justify-content-between" style="background-color:#005A00; min-height:100px;">
      <div class="container-fluid w-50 px-0 pt-2 d-flex flex-row align-items-center justify-content-between ">
          <span class="float-start mb-2">
              <ul class="nav d-flex flex-column align-items-center justify-content-start">
                  <li class="nav-link px-5 text-start"><a href="vrt.php" class="nav-link text-white p-0">Vrt</a></li>
                  <li class="nav-link px-5"><a href="about.php" class="nav-link text-white p-0">Info</a></li>
                  <li class="nav-link px-5"><a href="calendar.html" class="nav-link text-white p-0">Kalendar</a></li>
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