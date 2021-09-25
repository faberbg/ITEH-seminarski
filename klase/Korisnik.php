<?php

class Korisnik
{
    public $id;
    public $ime_prezime;
    public $email;
    public $sifra;
    public $uloga;

    public function login($mysqli)
    {
        $sql = "SELECT k.*, u.naziv FROM korisnik k JOIN uloga u ON k.id_uloga=u.id WHERE email='$this->email' and sifra='$this->sifra'";
        $rezultat = $mysqli->query($sql);

        while ($red = $rezultat->fetch_object()) {
            $korisnik = new Korisnik();
            $korisnik->id = $red->id;
            $korisnik->ime_prezime = $red->ime_prezime;
            $korisnik->email = $red->email;
            $korisnik->sifra = $red->sifra;
            $korisnik->uloga = $red->naziv;

            $_SESSION['ulogovaniKorisnik'] = $korisnik;

            return true;
        }
        return false;
    }

    public function save($mysqli)
    {
        $sql = "INSERT INTO korisnik(ime_prezime,email,sifra,id_uloga) VALUES ('$this->ime_prezime','$this->email','$this->sifra', 2)";
        if ($mysqli->query($sql)) {
            return true;
        }
        return false;
    }

   }