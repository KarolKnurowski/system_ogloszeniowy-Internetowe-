<?php
  session_start();
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>System Ogłoszeniowy</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="style.css" />
</head>
<body >

  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="glowna.php" class="navbar-brand mx-3">
      <img class="d-inline-block align-top" src="images/logo.jpg" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item custom-link1">
          <a href="glowna.php" class="nav-link active">
            Główna
          </a>
        </li>
        <li class="nav-item custom-link1">
          <a href="praca/oferty_pracy.php" class="nav-link">
            Oferty pracy
          </a>
        </li>
        <?php
            if(isset($_SESSION['id'])){
            echo <<<html
            <li class="nav-item custom-link1">
              <a href="uzytkownik/profil.php" class="nav-link">
                Mój profil
              </a>
            </li>
       
            html;
          }
        ?>
      </ul>
      <ul class="navbar-nav ms-auto">

      <?php

      

          if(isset($_SESSION['czyadmin'])  && $_SESSION['czyfirma']=='TAK'){

            echo <<<html
        <li class="nav-item">
          <a href="praca/ogloszenie_dodaj.php" class="nav-link custom-link me-2">
            Dodaj ogłoszenie
            <img class="d-inline-block align-top" src="images/icon_add.png" style="height: 30px;" />
          </a>
        </li>
        html;
      }
      
      if($_SESSION['czyadmin']=='TAK'){
        echo <<<html
        <li class="nav-item">
        <a href="adminpanel/admin-panel.php" class="nav-link custom-link me-2">
          Panel Admin
          <img class="d-inline-block align-top" src="images/adminpanelzdj.png" style="height: 30px;" />
        </a>
      </li>
    html;
  }
          if(isset($_SESSION['czyadmin']) || isset($_SESSION['id'])){

              echo <<<html
          <li class="nav-item">
            <a href="logowanie/logout.php" class="nav-link custom-link me-2">
              Wyloguj się
            </a>
          </li>
          html;
        }

          
      
?>
   
  <li class="nav-item">
  <?php
if (!isset($_SESSION['id'])) {
  echo <<<html
      <a href="/system_ogloszeniowy-Internetowe-/logowanie/login_form.php" class="nav-link custom-link me-2">
          Zaloguj się
      </a>
  html;
}


          
          ?>
</li>



    
      </ul>
      
    </div>
  </nav>
  <div class="container">

<div id="carouselExampleControls" class="carousel slide w-100 p-3" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://hubertkajdan.com/wp-content/uploads/2019/06/2019-06-20-Jezioro-Lednickie-010-Pano-1024x663.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://waskiel.pl/wp-content/uploads/2019/11/pomysly-na-zdjecia-obraz-wyrozniajacy.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://waskiel.pl/wp-content/uploads/2017/09/jak-zrobic-dobre-zdjecie-ustawienia-aparatu.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- card -->
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <img src="https://media.istockphoto.com/id/1295364225/pl/wektor/czas-zaktualizowa%C4%87-niebiesk%C4%85-etykiet%C4%99-na-bia%C5%82ym-tle-niebieski-baner-ilustracja-wektorowa.jpg?s=612x612&w=0&k=20&c=akoh1EZDKoYszOt8oFW3YBxogElOTDog9Hn1v5RdXnI=" class="card-img-top w-50" alt="Hollywood Sign on The Hill"/>
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">
          This is a longer card with supporting text below as a natural lead-in to
          additional content. This content is a little bit longer.
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="https://media.istockphoto.com/id/1295364225/pl/wektor/czas-zaktualizowa%C4%87-niebiesk%C4%85-etykiet%C4%99-na-bia%C5%82ym-tle-niebieski-baner-ilustracja-wektorowa.jpg?s=612x612&w=0&k=20&c=akoh1EZDKoYszOt8oFW3YBxogElOTDog9Hn1v5RdXnI=" class="card-img-top w-50" alt="Palm Springs Road"/>
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">
          This is a longer card with supporting text below as a natural lead-in to
          additional content. This content is a little bit longer.
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="https://media.istockphoto.com/id/1295364225/pl/wektor/czas-zaktualizowa%C4%87-niebiesk%C4%85-etykiet%C4%99-na-bia%C5%82ym-tle-niebieski-baner-ilustracja-wektorowa.jpg?s=612x612&w=0&k=20&c=akoh1EZDKoYszOt8oFW3YBxogElOTDog9Hn1v5RdXnI=" class="card-img-top w-50" alt="Los Angeles Skyscrapers"/>
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="https://media.istockphoto.com/id/1295364225/pl/wektor/czas-zaktualizowa%C4%87-niebiesk%C4%85-etykiet%C4%99-na-bia%C5%82ym-tle-niebieski-baner-ilustracja-wektorowa.jpg?s=612x612&w=0&k=20&c=akoh1EZDKoYszOt8oFW3YBxogElOTDog9Hn1v5RdXnI=" class="card-img-top w-50" alt="Skyscrapers"/>
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">
          This is a longer card with supporting text below as a natural lead-in to
          additional content. This content is a little bit longer.
        </p>
      </div>
    </div>
  </div>
</div>
  </div>  





  
  <!-- footer -->
  <footer class="text-center text-lg-start bg-light text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"> 
    </section>
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Pracuj.pl
            </h6>
            <p>
              Tutaj możesz zobaczyć wszelkie informacje dotyczące naszej strony internetowej
            </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Oferty
            </h6>
            <p>
              <a href="#!" class="text-reset">Programista</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Informatyk</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Mechanik</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Sprzedawca</a>
            </p>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Przydatne linki
            </h6>
            <p>
              <a href="#!" class="text-reset">O nas</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Moje konto</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Oferty pracy</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Pomoc</a>
            </p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Kontakt</h6>
            <p><i class="fas fa-home me-3"></i>Limanowa ul.Z augusta</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              pracujpl@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> +48 123456789</p>
            <p><i class="fas fa-print me-3"></i> +48 123456789</p>
          </div>
        </div>
      </div>
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Karol Knurowski</a>
    </div>
  </footer>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
  ></script>
</body>
</html>
