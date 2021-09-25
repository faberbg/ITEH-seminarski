<?php
class Database
{
    private $hostname="localhost";
    private $username="root";
    private $password="";
    private $dbname="kladionica";
    private $dblink; 
    private $result; 
    private $records; 
    private $affected; 

    public function __construct($dbname)
    {
        $this->dbname = $dbname;
        $this->Connect();
    }

    public function getResult()
    {
        return $this->result;
    }

    public function Connect()
    {
        $this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if ($this->dblink ->connect_errno) {
            printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
            exit();
        }
        $this->dblink->set_charset("utf8");
    }


    public function selectListica($id = null)
    {
        $sql = "SELECT l.*, z.ime_prezime AS zaposleni, k.ime_prezime AS kladionicar, u.tim1, u.tim2, u.opis, u.vreme 
                FROM listic l 
                LEFT JOIN korisnik z ON l.id_zaposleni=z.id 
                LEFT JOIN korisnik k ON l.id_kladionicar=k.id
                LEFT JOIN utakmica u ON l.id_utakmica=u.id";
                
        if ($id != null) {
            $sql .= " WHERE l.id=" . $id;
        }
        $sql .= " ORDER BY l.id";
        $this->ExecuteQuery($sql);
    }
    
    public function insertListica($idKladionicar, $idUtakmica, $kvota, $ulog , $rezultat)
    {
        $insert = "INSERT INTO listic(id, id_zaposleni, id_kladionicar, id_utakmica, kvota, rezultat, ulog) VALUES (null,57,$idKladionicar,$idUtakmica, 0, '$rezultat' ,$ulog)";

        if ($this->ExecuteQuery($insert)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateListica($id, $kvota)
    {
        $update = "UPDATE listic SET kvota = $kvota WHERE id = $id";
        if (($this->ExecuteQuery($update)) && ($this->affected >0)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteListica($id)
    {
        $delete = "DELETE FROM listic WHERE id = $id";
        if ($this->ExecuteQuery($delete)) {
            return true;
        } else {
            return false;
        }
    }

    public function ExecuteQuery($query)
    {
        if ($this->result = $this->dblink->query($query)) {
            if (isset($this->result->num_rows)) {
                $this->records         = $this->result->num_rows;
            }
            if (isset($this->dblink->affected_rows)) {
                $this->affected        = $this->dblink->affected_rows;
            }
            // echo "Uspesno izvrsen upit";
            return true;
        } else {
            return false;
        }
    }
}
