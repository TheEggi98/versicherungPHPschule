<?php

	require_once __DIR__ . '/../models/Versicherungsvertrag.php';
    class VersicherungsvertragApi {

        function createVersicherungsvertrag($conn, $data) {
        	$sql = "INSERT INTO Versicherungsvertrag (id, vertragsnummer, abschlussdatum, art, mitarbeiterId, fahrzeugId, versicherungsnehmerId) VALUES ($data->id, $data->vertragsnummer, $data->abschlussdatum, $data->art, $data->mitarbeiterId, $data->fahrzeugId, $data->versicherungsnehmerId);";
			$insert = mysqli_query($conn, $sql);

        }

        function getVersicherungsvertrag($conn) {
            $sql = "SELECT * FROM Versicherungsvertrag;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$versicherungsvertragListe = array();
			foreach ($data as $versicherungsvertrag) {
				$obj = new Versicherungsvertrag();

				$obj->id = $versicherungsvertrag[0];
				$obj->vertragsnummer = $versicherungsvertrag[1];
				$obj->abschlussdatum = $versicherungsvertrag[2];
				$obj->art = $versicherungsvertrag[3];
				$obj->mitarbeiterId = $versicherungsvertrag[4];
				$obj->fahrzeugId = $versicherungsvertrag[5];
				$obj->versicherungsnehmerId = $versicherungsvertrag[6];
				
				array_push($versicherungsvertragListe, $obj);
			}
            return $versicherungsvertragListe;
        }

        function getVersicherungsvertragByID($conn, $id) {
            $sql = "SELECT * FROM Versicherungsvertrag WHERE Array = $id;";
			$versicherungsvertrag = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Versicherungsvertrag();
			$obj->id = $versicherungsvertrag[0];
				$obj->vertragsnummer = $versicherungsvertrag[1];
				$obj->abschlussdatum = $versicherungsvertrag[2];
				$obj->art = $versicherungsvertrag[3];
				$obj->mitarbeiterId = $versicherungsvertrag[4];
				$obj->fahrzeugId = $versicherungsvertrag[5];
				$obj->versicherungsnehmerId = $versicherungsvertrag[6];
				
            return $obj;
        }

        function deleteVersicherungsvertrag($conn, $id) {
            $sql ="DELETE FROM Versicherungsvertrag WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateVersicherungsvertrag($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Vertragsnummer = $data->vertragsnummer,
				Abschlussdatum = $data->abschlussdatum,
				Art = $data->art,
				Mitarbeiter_ID = $data->mitarbeiterId,
				Fahrzeug_ID = $data->fahrzeugId,
				Versicherungsnehmer_ID = $data->versicherungsnehmerIWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>