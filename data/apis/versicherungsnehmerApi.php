<?php

class VersicherungsnehmerApi {
    public $id;
    public $name;
    public $vorname;
    public $geburtsdatum;
    public $fuehrerschein;
    public $ort;
    public $plz;
    public $strasse;
    public $hausnummer;
    public $eigenerKunde;
    public $versicherungsgesellschaftID;

    function createVersicherungsnehmer($conn, $data) {
        $sql = "INSERT INTO Versicherungsnehmer 
                (id, Name, Vorname, Geburtsdatum, Fuehrerschein, Ort, PLZ, Strasse, Hausnummer, Eigener_Kunde, Versicherungsgesellschaft_ID) 
                VALUES 
                ($data->id,$data->name, $data->vorname,  $data->geburtsdatum ,  $data->fuehrerschein , $data->ort, $data->plz, $data->strasse, '$data->hausnummer, $data->eigenerKunde, $data->versicherungsgesellschaftID);";
        $insert = mysqli_query($conn, $sql);
    }

    function getVersicherungsnehmer($conn) {
        $sql = "SELECT * FROM Versicherungsnehmer;";
        return mysqli_query($conn, $sql);
    }

    function getVersicherungsnehmerByID($conn, $id) {
        $sql = "SELECT * FROM Versicherungsnehmer WHERE ID = $id;";
        return mysqli_query($conn, $sql);
    }

    function deleteVersicherungsnehmer($conn, $id) {
        $sql ="DELETE FROM Versicherungsnehmer WHERE ID = $id";
        $delete = mysqli_query($donn, $sql);
    }

    function updateVersicherungsnehmer($conn, $data) {
        $sql = "UPDATE Versicherungsnehmer SET 
            ID = $data->id,
            Name = $data->name,
            Vorname = $data->vorname,
            Geburtsdatum = $data->geburtsdatum,
            Fuehrerschein = $data->fuehrerschein,
            Ort = $data->ort,
            PLZ = $data->plz,
            Strasse = $data->strasse,
            Hausnummer = $data->hausnummer,
            Eigener_Kunde = $data->eigenerKunde,
            Versicherungsgesellschaft_ID = $data->versicherungsgesellschaftID
        WHERE ID = $data->id;
        ";
        $update = mysqli_query($conn, $sql);
    }
?>