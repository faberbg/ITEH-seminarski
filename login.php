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
                        <a class="nav-link" href="change.php">Change bet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delete.php">Delete bet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bets.php">All bets</a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                      <?php 
                        } 
                        if ($_SESSION['ulogovaniKorisnik']->uloga == 'kladionicar') { ?>
                             <li class="nav-item">
                    <a class="nav-link" href="matches.php">Matches</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="bet.php">Bet!</a>
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
            <h3 class="text-center">Login forma</h3>

         <form method= "POST" action="">
           <label style="color: white;" for="email">Username</label>
           <input type="email" name="email" class="form-control" id="email" name="email">
           <label style="color: white;" for="password">Password</label>
           <input type="password" name="password" class="form-control" id="password" name="password">
           <br>
           <input type="submit" name="login" value="Login" class="form-control btn-primary" id="login">
           <br>
           <br>
         </form>
          </div>
        </div>
      </div>
    </div>

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
                All rights reserved | This template is made with <i class="icon-heart"
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