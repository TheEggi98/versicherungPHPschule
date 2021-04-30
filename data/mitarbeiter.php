<?php

class Mitarbeiter {
    public $id;
    public $personalnummer;
    public $name;
    public $vorname;
    public $geburtsdatum;
    public $telefon;
    public $mobil;
    public $email;
    public $raum;
    public $istLeiter;
    public $abteilungsID;

    function createMitarbeiter($conn, $data) {
        $sql = "INSERT INTO Mitarbeiter 
                (ID, PERSONALNUMMER, NAME, VORNAME, GEBURTSDATUM, TELEFON, MOBIL, EMAIL, RAUM, IST_LEITER, ABTEILUNG_ID) 
                VALUES 
                ($data->id,$data->personalnummer, $data->name,  $data->vorname ,  $data->geburtsdatum , $data->telefon, $data->mobil, $data->email, $data->raum, $data->istLeiter, $data->abteilungsID);";
        $insert = mysqli_query($conn, $sql);
    }

    function getMitarbeiter($conn) {
        $sql = "SELECT * FROM Mitarbeiter;";
        return mysqli_query($conn, $sql);
    }

    function getMitarbeiterByID($conn, $id) {
        $sql = "SELECT * FROM Mitarbeiter WHERE ID = $id;";
        return mysqli_query($conn, $sql);
    }

    function deleteMitarbeiter($conn, $id) {
        $sql ="DELETE FROM Mitarbeiter WHERE ID = $id";
        $delete = mysqli_query($donn, $sql);
    }

    function updateMitarbeiter($conn, $data) {
        $sql = "UPDATE Mitarbeiter SET 
            ID = $data->id,
            PERSONALNUMMER = $data->personalnummer,
            NAME = $data->name,
            VORNAME = $data->vorname,
            GEBURTSDATUM = $data->geburtsdatum,
            TELEFON = $data->telefon,
            MOBIL = $data->mobil,
            EMAIL = $data->email,
            RAUM = $data->raum,
            IST_LEITER = $data->istLeiter,
            ABTEILUNG_ID = $data->abteilungsID,
        WHERE ID = $data->id;
        ";
        $update = mysqli_query($conn, $sql);
    }
?>
