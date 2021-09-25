
<?php

include 'kon.php';

if (!isset($_SESSION['ulogovaniKorisnik']) || empty($_SESSION['ulogovaniKorisnik'])) {
    header('location: login.php');
    exit;
}

$zaposleni = $_SESSION['ulogovaniKorisnik'];

if ($zaposleni->uloga == "kladionicar") {
    header('location: logout.php');
    exit;
}

$listic = new listic();
$nizListica = $listic->vratiSve($mysqli);
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
                    </li>
                  <?php
                  if ($_SESSION['ulogovaniKorisnik'] != null) {
                      if ($_SESSION['ulogovaniKorisnik']->uloga == 'zaposleni') { ?>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delete.php">Delete bet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bets.php">All bets</a>
                    </li>
                      <?php 
                        } 
                        if ($_SESSION['ulogovaniKorisnik']->uloga == 'kladionicar') { ?>
                             <li class="nav-item">
                    <a class="nav-link" href="bet.php">Bet!</a>
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
           <h3 class="text-center">Unos detalja termina</h3>
            <form method="PUT" action="servis/listici">
            <select name="idListica" class="form-control">
                <?php
                    foreach ($nizListica as $listic) {
                        ?>
                    <option value="<?= $listic->id ?>"><?= $listic->utakmica->tim1  . $listic->utakmica->tim2 .  $listic->kladionicar->ime_prezime ?></option>

                    <?php
                    }
                ?>
            </select>
            <br>
            <br>
           <input  style="width: 100% color: white;" type="submit" lass="submit" align="center" type="submit" class="form-control btn-primary" name="deleteListica" value="Delete">
            </form>
            <h4 id="msgPut" class="text-center"></h4>
    </div>
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
                Copyright &copy; All rights reserved | This template is made with <i class="icon-heart"
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

   <script>
  $(':input[name=deleteListica]').click(function() {
                // process the form
                $("form").submit(function(event) {
                    // get the form data
                    var formData = {
                        'idListica' : $(':input[name=idListica]').val()
                    };
                    setUrl = 'servis/listici/' + formData.idListica;
                    $.ajax({
                        type        : 'DELETE', // define the type of HTTP verb we want to use (POST for our form)
                        url         : setUrl, // the url where we want to POST
                        data        : JSON.stringify(formData), // our data object
                        dataType    : 'json', // what type of data do we expect back from the server
                        encode      : true,
                        contentType: "application/json; charset=UTF-8"
                    }).done(function(data) {
                        $('#msgPut').html(data.poruka);  
                    });
                    
                    // stop the form from submitting the normal way and refreshing the page
                    event.preventDefault();
                });
            });
</script>


</body>

</html>