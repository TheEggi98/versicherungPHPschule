<?php

	require_once __DIR__ . '/../models/Abteilung.php';
    class AbteilungApi {

        function createAbteilung($conn, $data) {
        	$sql = "INSERT INTO Abteilung (id, kuerzel, bezeichnung, ort) VALUES ($data->id, $data->kuerzel, $data->bezeichnung, $data->ort);";
			$insert = mysqli_query($conn, $sql);

        }

        function getAbteilung($conn) {
            $sql = "SELECT * FROM Abteilung;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$abteilungListe = array();
			foreach ($data as $abteilung) {
				$obj = new Abteilung();

				$obj->id = $abteilung[0];
				$obj->kuerzel = $abteilung[1];
				$obj->bezeichnung = $abteilung[2];
				$obj->ort = $abteilung[3];
				
				array_push($abteilungListe, $obj);
			}
            return $abteilungListe;
        }

        function getAbteilungByID($conn, $id) {
            $sql = "SELECT * FROM Abteilung WHERE Array = $id;";
			$abteilung = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Abteilung();
			$obj->id = $abteilung[0];
				$obj->kuerzel = $abteilung[1];
				$obj->bezeichnung = $abteilung[2];
				$obj->ort = $abteilung[3];
				
            return $obj;
        }

        function deleteAbteilung($conn, $id) {
            $sql ="DELETE FROM Abteilung WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateAbteilung($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Kuerzel = $data->kuerzel,
				Bezeichnung = $data->bezeichnung,
				Ort = $data->orWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>