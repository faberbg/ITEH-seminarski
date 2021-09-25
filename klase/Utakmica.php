<?php

class Utakmica
{
    public $id;
    public $tim1;
    public $tim2;
    public $opis;
    public $vreme;

    public function vratiSve($mysqli)
    {
        $sql = "SELECT * FROM utakmica";
        $rezultat = $mysqli->query($sql);
        $nizUtakmica = [];
        while ($red = $rezultat->fetch_object()) {
            $utakmica = new Utakmica();
            $utakmica->id = $red->id;
            $utakmica->tim1 = $red->tim1;
            $utakmica->tim2 = $red->tim2;
            $utakmica->opis = $red->opis;
            $utakmica->vreme = $red->vreme;

            $nizUtakmica[] = $utakmica;
        }
        return $nizUtakmica;
    }
}
