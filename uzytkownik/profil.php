<?php
session_start();




include '../logowanie/config.php';

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    $query = "SELECT * FROM konto
              LEFT JOIN doswiadczenie ON konto.id = doswiadczenie.id
              LEFT JOIN wyksztalcenie ON konto.id = wyksztalcenie.id
              LEFT JOIN link ON konto.id = link.id
              LEFT JOIN jezyk ON konto.id = jezyk.id
              LEFT JOIN kurs ON konto.id = kurs.id
              LEFT JOIN umiejetnosc ON konto.id = umiejetnosc.id
              LEFT JOIN uzytkownik ON konto.id = uzytkownik.id
              WHERE konto.id = $userId";


    if (!$result = $conn->query($query)) {
        echo "Błąd zapytania SQL: " . $conn->error;
        exit();
    }



    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();


    } else {
        echo "Brak danych lub błąd zapytania.";
    }
} else {
    echo "Brak sesji użytkownika.";
}

// Zamykanie połączenia z bazą danych po zakończeniu operacji
$conn->close();
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
  <link rel="stylesheet" href="../style.css" />
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="../glowna.php" class="navbar-brand mx-3">
      <img class="d-inline-block align-top" src="../images/logo.jpg" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item custom-link1">
          <a href="../glowna.php" class="nav-link">
            Główna
          </a>
        </li>
        <li class="nav-item custom-link1">
          <a href="../praca/oferty_pracy.php" class="nav-link  ">
            Oferty pracy
          </a>
        </li>
        <li class="nav-item custom-link1">
          <a href="../uzytkownik/profil.php" class="nav-link ">
            Mój profil
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">

        <?php 
                  if(isset($_SESSION['czyfirma']) && $_SESSION['czyfirma']=='TAK'){
                    echo <<<html
        <li class="nav-item">
          <a href="../praca/ogloszenie_dodaj.php" class="nav-link custom-link me-2">
            Dodaj ogłoszenie
            <img class="d-inline-block align-top" src="../images/icon_add.png" style="height: 30px;" />
          </a>
        </li>
        html;
                  }
        
                  if(isset($_SESSION['czyadmin']) && $_SESSION['czyadmin']=='TAK'){
                    echo <<<html
                    <li class="nav-item">
                    <a href="../adminpanel/admin-panel.php" class="nav-link custom-link me-2">
                      Panel Admin
                      <img class="d-inline-block align-top" src="../images/adminpanelzdj.png" style="height: 30px;" />
                    </a>
                  </li>
                html;
              }
              if (!isset($_SESSION['id'])) {
                echo <<<html
                    <a href="/system_ogloszeniowy-Internetowe-/logowanie/login_form.php" class="nav-link custom-link me-2">
                        Zaloguj się
                    </a>
                html;
              }
              if(isset($_SESSION['id'])){

                echo <<<html
            <li class="nav-item">
              <a href="../logowanie/logout.php" class="nav-link custom-link me-2">
                Wyloguj się
              </a>
            </li>
            html;
          }
        ?>
      </ul>
    </div>
  </nav>
<div class="container">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="defaults">
          <h1>Mój Profil</h1>
          <p>W tej sekcji rozwijając poniżej listy możesz w każdej chwili edytować dane które podałeś podczas rejestracji</p>
        <form>

          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Podstawowe Informacje
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="mb-3">
                      <img src="https://hubertkajdan.com/wp-content/uploads/2019/06/2019-06-20-Jezioro-Lednickie-010-Pano-1024x663.jpg" height="200px">
                      <input type="file" class="form-control mt-3" id="imgsrc" aria-describedby="emailHelp">
                      <label for="email1" class="form-label mt-1" >E-mail</label>
                      <input type="text" class="form-control mt-3" id="email1" aria-describedby="emailHelp" value="<?php echo isset($userData['email']) ? $userData['email'] : ''; ?>">
                      <label for="email1" class="form-label mt-1" >Link Github:</label>
                      <input type="text" class="form-control mt-1" id="email1" aria-describedby="emailHelp" value="<?php echo isset($userData['adres_url']) ? $userData['adres_url'] : ''; ?>">
                      <label for="text1" class="form-label mt-3">Imie:</label>
                      <input type="text" class="form-control mt-1" id="text1" aria-describedby="emailHelp" value="<?php echo isset($userData['imie']) ? $userData['imie'] : ''; ?>">
                      <label for="text2" class="form-label mt-3">Nazwisko:</label>
                      <input type="text" class="form-control mt-1" id="text2" aria-describedby="emailHelp" value="<?php echo isset($userData['nazwisko']) ? $userData['nazwisko'] : ''; ?>">
                      <label for="date1" class="form-label mt-3">Data urodzenia:<br></label>
                      <input type="date" class="form-control mt-1" id="date1" aria-describedby="emailHelp" value="<?php echo isset($userData['data_urodzenia']) ? $userData['data_urodzenia'] : ''; ?>" >
                      <label for="tel1" class="form-label mt-3">Numer telefonu:</label>
                      <input type="tel" class="form-control mt-1" id="tel1" aria-describedby="emailHelp" value="<?php echo isset($userData['numer_telefonu']) ? $userData['numer_telefonu'] : ''; ?>">
                      <label for="text3" class="form-label mt-3">Miejsce zamieszkania:</label>
                      <input type="text" class="form-control mt-1" id="text3" aria-describedby="emailHelp" value="<?php echo isset($userData['miejsce_zamieszkania']) ? $userData['miejsce_zamieszkania'] : ''; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Doświadczenie
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <label for="Stanowisko" class="form-label mt-1" >Stanowisko:</label>
                  <input type="email" class="form-control mt-1" id="Stanowisko" aria-describedby="emailHelp">
                  <label for="nfirmy" class="form-label mt-3">nazwa firmy:</label>
                  <input type="text" class="form-control mt-1" id="nfirmy" aria-describedby="emailHelp">
                  <label for="lokalizacja" class="form-label mt-3">lokalizacja:</label>
                  <input type="text" class="form-control mt-1" id="lokalizacja" aria-describedby="emailHelp">
                  <label for="zatrudnienieod" class="form-label mt-3">Zatrudnienie od:</label>
                  <input type="date" class="form-control mt-1" id="zatrudnienieod" aria-describedby="emailHelp">
                  <label for="zatrudnieniedo" class="form-label mt-3">Zatrudnienie do:</label>
                  <input type="date" class="form-control mt-1" id="zatrudnieniedo" aria-describedby="emailHelp">
                  <label for="Obowiazki" class="form-label mt-3">Obowiazki:</label>
                  <input type="text" class="form-control mt-1" id="Obowiazki" aria-describedby="emailHelp">
                <button type="submit" class="btn btn-primary mt-3">Zapisz</button>
          
              </div>
            </div></div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Szkolenie
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <label for="nazwaszkolenia" class="form-label mt-1" >Nazwa szkolenia:</label>
                  <input type="text" class="form-control mt-1" id="nazwaszkolenia" aria-describedby="emailHelp">
                  <label for="organizator" class="form-label mt-1" >Organizator:</label>
                  <input type="text" class="form-control mt-1" id="organizator" aria-describedby="emailHelp">
                  <label for="Datas" class="form-label mt-1" >Data:</label>
                  <input type="date" class="form-control mt-1" id="Datas" aria-describedby="emailHelp">
                  <button type="submit" class="btn btn-primary mt-3">Zapisz</button>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                  Wykształcenie
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                  <label for="umiejetnosci" class="form-label mt-1" >Umiejętności:</label>
                  <input type="text" class="form-control mt-1" id="umiejetnosci" aria-describedby="emailHelp">
                  <label for="nazwaszkoly" class="form-label mt-1" >Nazwa szkoły:</label>
                  <input type="text" class="form-control mt-1" id="nazwaszkoly" aria-describedby="emailHelp">
                  <label for="miejscowosc" class="form-label mt-1" >Miejscowość:</label>
                  <input type="text" class="form-control mt-1" id="miejscowosc" aria-describedby="emailHelp">
                  <label for="poziomw" class="form-label mt-1" >Poziom Wykształcenia:</label>
                  <input type="text" class="form-control mt-1" id="poziomw" aria-describedby="emailHelp">
                  <button type="submit" class="btn btn-primary mt-3">Zapisz</button>
                </div>
              </div>
            </div>

          </div>
          
          
        </form>

        
      </div>
      </div>
    </div>
  </div>
  </div>
<br><br><br><br><br><br><br><br>
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
