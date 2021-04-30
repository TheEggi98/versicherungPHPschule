<?php

class Versicherungsvertrag {
    public $id;
    public $vertragsNummer;
    public $abschlussdatum;
    public $art;
    public $mitarbeiterID;
    public $fahrzeugID;
    public $versicherungsnehmerID;

    function createVersicherungsvertrag($conn, $data) {
        $sql = "INSERT INTO Versicherungsvertrag 
                (ID, Vertragsnummer, Abschlussdatum, Art, Mitarbeiter_ID, Fahrzeug_ID, Versicherungsnehmer_ID) 
                VALUES 
                ($data->id,$data->vertragsNummer, $data->abschlussdatum,  $data->art ,  $data->mitarbeiterID , $data->fahrzeugID, $data->versicherungsnehmerID);";
        $insert = mysqli_query($conn, $sql);
    }

    function getVersicherungsvertrag($conn) {
        $sql = "SELECT * FROM Versicherungsvertrag;";
        return mysqli_query($conn, $sql);
    }

    function getVersicherungsvertragByID($conn, $id) {
        $sql = "SELECT * FROM Versicherungsvertrag WHERE ID = $id;";
        return mysqli_query($conn, $sql);
    }

    function deleteVersicherungsvertrag($conn, $id) {
        $sql ="DELETE FROM Versicherungsvertrag WHERE ID = $id";
        $delete = mysqli_query($donn, $sql);
    }

    function updateVersicherungsvertrag($conn, $data) {
        $sql = "UPDATE Versicherungsvertrag SET 
            ID = $data->id,
            Vertragsnummer = $data->vertragsNummer,
            Abschlussdatum = $data->abschlussdatum,
            Art = $data->art,
            Mitarbeiter_ID = $data->mitarbeiterID,
            Fahrzeug_ID = $data->fahrzeugID,
            Versicherungsnehmer_ID = $data->versicherungsnehmerID,
        WHERE ID = $data->id;
        ";
        $update = mysqli_query($conn, $sql);
    }
?>
