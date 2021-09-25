<?php


class Listic
{
    public $id;
    public $zaposleni;
    public $kladionicar;
    public $utakmica;
    public $kvota;
    public $rezultat;
    public $ulog;

    public function vratiSve($mysqli)
    {
        $sql = "SELECT l.*, z.ime_prezime AS zaposleni, k.ime_prezime AS kladionicar, u.tim1, u.tim2, u.opis, u.vreme
                FROM listic l 
                LEFT JOIN korisnik z ON l.id_zaposleni=z.id 
                LEFT JOIN korisnik k ON l.id_kladionicar=k.id
                LEFT JOIN utakmica u ON l.id_utakmica=u.id";
        if (isset($this->zaposleni->id)) {
            $sql .= " WHERE l.id_zaposleni=" . $this->zaposleni->id;
        }
        $sql .= " ORDER BY l.id_utakmica ASC";
        $rezultat = $mysqli->query($sql);
        if( !$rezultat)
        die($mysqli->error);

        $nizListica = [];
        while ($red = $rezultat->fetch_object()) {
            $zaposleni = new Korisnik();
            $zaposleni->id = $red->id_zaposleni;
            $zaposleni->ime_prezime = $red->zaposleni;
            
            $kladionicar = new Korisnik();
            $kladionicar->id = $red->id_kladionicar;
            $kladionicar->ime_prezime = $red->kladionicar;            
            
            $utakmica = new Utakmica();
            $utakmica->tim1 = $red->tim1;
            $utakmica->tim2 = $red->tim2;
            $utakmica->opis = $red->opis;
            $utakmica->vreme = $red->vreme;

            $listic = new Listic();
            $listic->id = $red->id;
            $listic->zaposleni = $zaposleni;
            $listic->kladionicar = $kladionicar;
            $listic->utakmica = $utakmica;
            $listic->kvota = $red->kvota;
            $listic->rezultat = $red->rezultat;
            $listic->ulog = $red->ulog;
            
            $nizListica[] = $listic;
        }
        return $nizListica;
    }
}
