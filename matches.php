
<?php

include 'kon.php';

if (!isset($_SESSION['ulogovaniKorisnik']) || empty($_SESSION['ulogovaniKorisnik'])) {
    header('location: login.php');
    exit;
}

$kladionicar = $_SESSION['ulogovaniKorisnik'];

if ($kladionicar->uloga == "zaposleni") {
    header('location: logout.php');
    exit;
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
                    </li>
                  <?php
                  if ($_SESSION['ulogovaniKorisnik'] != null) {
                      if ($_SESSION['ulogovaniKorisnik']->uloga == 'zaposleni') { ?>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
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
          <div style="position: relative;">
           <h2>Matches</h2>
      <table id="my-example" style="color: black">
        <thead>
          <tr>
          <th style="color: white;">Host</th>
          <th style="color: white;">Guest</th>
          <th style="color: white;">Quota</th>
          <th style="color: white;">Date</th>
         </tr>
    </thead>
  </table>
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

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $('#my-example').dataTable({
        "bProcessing": true,
        "sAjaxSource": "tables.php",
        "aoColumns": [
              { mData: 'tim1' } ,
              { mData: 'tim2' },
              { mData: 'opis' },
              { mData: 'vreme' }
            ]
      });  
  });
</script>
<style type="text/css">
  /* div koji sadrzi tabelu */
#kl-container {
    font-size:12px;
    text-align:center;
    margin:10px;
}

/* tabela kursne liste */
#kl-table {
    margin:10px auto;
}

a {
    text-decoration:none;
    color:white;
}
a:hover {
    border-bottom: 1px dashed white;
}

#kl-table td {
    padding:3px;
}

/* klasa linka oznake valute */
.code_link {

}

/* celija koja sadrzi kurs */
.td_rate {
    text-align:right;
    width:60px;
}

/* boja neparnog reda */
.rowcolor1 {
    background-color:#FFF;
}

/* boja parnog reda */
.rowcolor2 {
    background-color:#EFEFEF;
}

/* boje za promenu kurseva */
.green, .red, .yellow {
    text-align:right;
}
.green {
    color:#41A317;
}
.red {
    color:#FF0000;
    
}
.yellow {
    color:#F6CF2B;
}

.imenaKurseva {
    font-size:10px;
}  
</style>
</script>

</body>

</html>