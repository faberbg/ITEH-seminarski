<?php
include 'baza/konekcija.php';
include 'klase/Listic.php';
include 'klase/Korisnik.php';
include 'klase/Utakmica.php';

session_start();

if (!isset($_SESSION['ulogovaniKorisnik'])) {
    $_SESSION['ulogovaniKorisnik'] = null;
}
