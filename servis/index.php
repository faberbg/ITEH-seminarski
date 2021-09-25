<?php
require 'flight/Flight.php';
require 'jsonindent.php';
Flight::register('db', 'Database', array('kladionica'));
$json_podaci = file_get_contents("php://input");
Flight::set('json_podaci', $json_podaci);

Flight::route('GET /listici.json', function () {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $db->selectListica();
    $niz = array();
    $i=0;
    while ($red=$db->getResult()->fetch_object()) {
        $niz[$i]["id"] = $red->id;
        $niz[$i]["kvota"] = $red->kvota;
        $niz[$i]["rezultat"] = $red->rezultat;
        $niz[$i]["rezultat"] = $red->rezultat;
        $niz[$i]["zaposleni"] = $red->zaposleni;
        $niz[$i]["kladionicar"] = $red->kladionicar;
        $niz[$i]["utakmica"] = $red->utakmica;
        $i++;
    }

    $json_niz = json_encode($niz, JSON_UNESCAPED_UNICODE);
    echo indent($json_niz);
    return false;
});

Flight::route('GET /listici/@id.json', function ($id) {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $db->selectListica($id);
    $red = $db->getResult()->fetch_object();
    $json_niz = json_encode($red, JSON_UNESCAPED_UNICODE);
    echo indent($json_niz);
    return false;
});

Flight::route('POST /listici', function () {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $podaci_json = Flight::get("json_podaci");
    $podaci = json_decode($podaci_json);
    if ($podaci == null) {
        $odgovor["poruka"] = "Niste prosledili podatke";
        $json_odgovor = json_encode($odgovor);
        echo $json_odgovor;
        return false;
    } else {
        if (!property_exists($podaci, 'idKladionicar')||
            !property_exists($podaci, 'idUtakmica')||
            !property_exists($podaci, 'rezultat')||
            !property_exists($podaci, 'ulog')){
            $odgovor["poruka"] = "Niste prosledili korektne podatke";
            $json_odgovor = json_encode($odgovor, JSON_UNESCAPED_UNICODE);
            echo $json_odgovor;
            return false;
        } else {
            if ($db->insertListica($podaci->idKladionicar, $podaci->idUtakmica, null, $podaci->ulog, $podaci->rezultat)) {
                $odgovor["poruka"] = "Listic je uspesno kreiran";
                $json_odgovor = json_encode($odgovor, JSON_UNESCAPED_UNICODE);
                echo $json_odgovor;
                return false;
            } else {
                $odgovor["poruka"] = "Doslo je do greske.";
                $json_odgovor = json_encode($odgovor, JSON_UNESCAPED_UNICODE);
                echo $json_odgovor;
                return false;
            }
        }
    }
});

Flight::route('PUT /listici/@id', function ($id) {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $podaci_json = Flight::get("json_podaci");
    $podaci = json_decode($podaci_json);
    if ($podaci == null) {
        $odgovor["poruka"] = "Niste prosledili podatke";
        $json_odgovor = json_encode($odgovor);
        echo $json_odgovor;
    } else {
        if (!property_exists($podaci, 'kvota')) {
            $odgovor["poruka"] = "Niste prosledili korektne podatke";
            $json_odgovor = json_encode($odgovor, JSON_UNESCAPED_UNICODE);
            echo $json_odgovor;
            return false;
        } else {
            if ($db->updateListica($id, $podaci->kvota)) {
                $odgovor["poruka"] = "Listic je uspesno izmenjen";
                $json_odgovor = json_encode($odgovor, JSON_UNESCAPED_UNICODE);
                echo $json_odgovor;
                return false;
            } else {
                $odgovor["poruka"] = "Došlo je do greške pri izmeni listica";
                $json_odgovor = json_encode($odgovor, JSON_UNESCAPED_UNICODE);
                echo $json_odgovor;
                return false;
            }
        }
    }
});

Flight::route('DELETE /listici/@id', function ($id) {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    if ($db->deleteListica($id)) {
        $odgovor["poruka"] = "Listic je uspesno izbrisan";
        $json_odgovor = json_encode($odgovor, JSON_UNESCAPED_UNICODE);
        echo $json_odgovor;
        return false;
    } else {
        $odgovor["poruka"] = "Došlo je do greške prilikom brisanja listica";
        $json_odgovor = json_encode($odgovor, JSON_UNESCAPED_UNICODE);
        echo $json_odgovor;
        return false;
    }
});


Flight::start();
