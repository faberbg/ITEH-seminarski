<?php 

include 'kon.php'; 

$poruka = "";
if(isset($_POST['login'])){
  $email = $mysqli->real_escape_string(trim($_POST['email']));
  $password = $mysqli->real_escape_string(trim($_POST['password']));

  $korisnik = new Korisnik();
  $korisnik->email = $email;
  $korisnik->sifra = $password;

  if($korisnik->login($mysqli)){
    $poruka ="Uspesno ste se ulogovali";
  }else{
    $poruka ="Neuspesno ste se ulogovali, proverite podatke";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Soccer &mdash; Betting</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">



</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.php">
              <img src="images/logo.png" alt="Logo">
            </a>
          </div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
                  <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                  <li class="nav-item">
                       <a class="nav-link" href="signin.php">Sign in</a>
                       <a class="nav-link" href="login.php">Login</a>
                    </li>
                  <?php
                  if ($_SESSION['ulogovaniKorisnik'] != null) {
                      if ($_SESSION['ulogovaniKorisnik']->uloga == 'zaposleni') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="signin.php">Razgledanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listaNekretnina.php">Lista nekretnina</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                      <?php 
                        } 
                        if ($_SESSION['ulogovaniKorisnik']->uloga == 'kladionicar') { ?>
                             <li class="nav-item">
                    <a class="nav-link" href="nekretnine.php">Nekretnine</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                        <?php } ?>
                    <?php } else { ?>

                    <?php } ?>
                </ul>
            </nav>

            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                class="icon-menu h3 text-white"></span></a>
          </div>
        </div>
      </div>

    </header>

    <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
            <h1 class="text-white">World Cup Event</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
            <div id="date-countdown"></div>
          </div>
        </div>
      </div>
    </div>

    
    
    <div class="container">
      

      <div class="row">
        <div class="col-lg-12">
          
          <div class="d-flex team-vs">
            <span class="score">4-1</span>
            <div class="team-1 w-50">
              <div class="team-details w-100 text-center">
                <img src="images/logo_1.png" alt="Image" class="img-fluid">
                <h3>LA LEGA <span>(win)</span></h3>
                <ul class="list-unstyled">
                  <li>Anja Landry (7)</li>
                  <li>Eadie Salinas (12)</li>
                  <li>Ashton Allen (10)</li>
                  <li>Baxter Metcalfe (5)</li>
                </ul>
              </div>
            </div>
            <div class="team-2 w-50">
              <div class="team-details w-100 text-center">
                <img src="images/logo_2.png" alt="Image" class="img-fluid">
                <h3>JUVENDU <span>(loss)</span></h3>
                <ul class="list-unstyled">
                  <li>Macauly Green (3)</li>
                  <li>Arham Stark (8)</li>
                  <li>Stephan Murillo (9)</li>
                  <li>Ned Ritter (5)</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  

    <div class="latest-news">
      <div class="container">
        <div class="row">
          <div class="col-12 title-section">
            <h2 class="heading">Latest News</h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3">Romolu to stay at Real Nadrid?</h3>
                  <div class="author d-flex align-items-center">
                    <div class="img mb-2 mr-3">
                      <img src="images/person_1.jpg" alt="">
                    </div>
                    <div class="text">
                      <h4>Mellissa Allison</h4>
                      <span>May 19, 2020 &bullet; Sports</span>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
          <div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3">Kai Nets Double To Secure Comfortable Away Win</h3>
                  <div class="author d-flex align-items-center">
                    <div class="img mb-2 mr-3">
                      <img src="images/person_1.jpg" alt="">
                    </div>
                    <div class="text">
                      <h4>Mellissa Allison</h4>
                      <span>May 19, 2020 &bullet; Sports</span>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
          <div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3">Dogba set for Juvendu return?</h3>
                  <div class="author d-flex align-items-center">
                    <div class="img mb-2 mr-3">
                      <img src="images/person_1.jpg" alt="">
                    </div>
                    <div class="text">
                      <h4>Mellissa Allison</h4>
                      <span>May 19, 2020 &bullet; Sports</span>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>

      </div>
    </div>
    
    <div class="site-section bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="widget-next-match">
              <div class="widget-title">
                <h3>Next Match</h3>
              </div>
              <div class="widget-body mb-3">
                <div class="widget-vs">
                  <div class="d-flex align-items-center justify-content-around justify-content-between w-100">
                    <div class="team-1 text-center">
                      <img src="images/logo_1.png" alt="Image">
                      <h3>Football League</h3>
                    </div>
                    <div>
                      <span class="vs"><span>VS</span></span>
                    </div>
                    <div class="team-2 text-center">
                      <img src="images/logo_2.png" alt="Image">
                      <h3>Soccer</h3>
                    </div>
                  </div>
                </div>
              </div>

              <div class="text-center widget-vs-contents mb-4">
                <h4>World Cup League</h4>
                <p class="mb-5">
                  <span class="d-block">December 20th, 2020</span>
                  <span class="d-block">9:30 AM GMT+0</span>
                  <strong class="text-primary">New Euro Arena</strong>
                </p>

                <div id="date-countdown2" class="pb-1"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            
            <div class="widget-next-match">
              <table class="table custom-table">
                <thead>
                  <tr>
                    <th>P</th>
                    <th>Team</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                    <th>PTS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><strong class="text-white">Football League</strong></td>
                    <td>22</td>
                    <td>3</td>
                    <td>2</td>
                    <td>140</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><strong class="text-white">Soccer</strong></td>
                    <td>22</td>
                    <td>3</td>
                    <td>2</td>
                    <td>140</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><strong class="text-white">Juvendo</strong></td>
                    <td>22</td>
                    <td>3</td>
                    <td>2</td>
                    <td>140</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td><strong class="text-white">French Football League</strong></td>
                    <td>22</td>
                    <td>3</td>
                    <td>2</td>
                    <td>140</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td><strong class="text-white">Legia Abante</strong></td>
                    <td>22</td>
                    <td>3</td>
                    <td>2</td>
                    <td>140</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td><strong class="text-white">Gliwice League</strong></td>
                    <td>22</td>
                    <td>3</td>
                    <td>2</td>
                    <td>140</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td><strong class="text-white">Cornika</strong></td>
                    <td>22</td>
                    <td>3</td>
                    <td>2</td>
                    <td>140</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td><strong class="text-white">Gravity Smash</strong></td>
                    <td>22</td>
                    <td>3</td>
                    <td>2</td>
                    <td>140</td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div> <!-- .site-section -->


    <footer class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
        </div>

        <div class="row text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <p>
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart"
                  aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Soccer Betting</a>
              </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div>
  <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>


  <script src="js/main.js"></script>

</body>

</html>