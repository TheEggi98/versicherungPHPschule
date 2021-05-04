<?php

	require_once __DIR__ . '/../models/Versicherungsnehmer.php';
    class VersicherungsnehmerApi {

        function createVersicherungsnehmer($conn, $data) {
        	$sql = "INSERT INTO Versicherungsnehmer (id, name, vorname, geburtsdatum, fuehrerschein, ort, plz, strasse, hausnummer, eigenerKunde, versicherungsgesellschaftId) VALUES ($data->id, $data->name, $data->vorname, $data->geburtsdatum, $data->fuehrerschein, $data->ort, $data->plz, $data->strasse, $data->hausnummer, $data->eigenerKunde, $data->versicherungsgesellschaftId);";
			$insert = mysqli_query($conn, $sql);

        }

        function getVersicherungsnehmer($conn) {
            $sql = "SELECT * FROM Versicherungsnehmer;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$versicherungsnehmerListe = array();
			foreach ($data as $versicherungsnehmer) {
				$obj = new Versicherungsnehmer();

				$obj->id = $versicherungsnehmer[0];
				$obj->name = $versicherungsnehmer[1];
				$obj->vorname = $versicherungsnehmer[2];
				$obj->geburtsdatum = $versicherungsnehmer[3];
				$obj->fuehrerschein = $versicherungsnehmer[4];
				$obj->ort = $versicherungsnehmer[5];
				$obj->plz = $versicherungsnehmer[6];
				$obj->strasse = $versicherungsnehmer[7];
				$obj->hausnummer = $versicherungsnehmer[8];
				$obj->eigenerKunde = $versicherungsnehmer[9];
				$obj->versicherungsgesellschaftId = $versicherungsnehmer[10];
				
				array_push($versicherungsnehmerListe, $obj);
			}
            return $versicherungsnehmerListe;
        }

        function getVersicherungsnehmerByID($conn, $id) {
            $sql = "SELECT * FROM Versicherungsnehmer WHERE Array = $id;";
			$versicherungsnehmer = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Versicherungsnehmer();
			$obj->id = $versicherungsnehmer[0];
				$obj->name = $versicherungsnehmer[1];
				$obj->vorname = $versicherungsnehmer[2];
				$obj->geburtsdatum = $versicherungsnehmer[3];
				$obj->fuehrerschein = $versicherungsnehmer[4];
				$obj->ort = $versicherungsnehmer[5];
				$obj->plz = $versicherungsnehmer[6];
				$obj->strasse = $versicherungsnehmer[7];
				$obj->hausnummer = $versicherungsnehmer[8];
				$obj->eigenerKunde = $versicherungsnehmer[9];
				$obj->versicherungsgesellschaftId = $versicherungsnehmer[10];
				
            return $obj;
        }

        function deleteVersicherungsnehmer($conn, $id) {
            $sql ="DELETE FROM Versicherungsnehmer WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateVersicherungsnehmer($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
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
				Versicherungsgesellschaft_ID = $data->versicherungsgesellschaftIWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>