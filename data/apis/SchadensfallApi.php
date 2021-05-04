<?php

	require_once __DIR__ . '/../models/Schadensfall.php';
    class SchadensfallApi {

        function createSchadensfall($conn, $data) {
        	$sql = "INSERT INTO Schadensfall (id, datum, ort, beschreibung, schadenshoehe, verletzte, mitarbeiterId) VALUES ($data->id, $data->datum, $data->ort, $data->beschreibung, $data->schadenshoehe, $data->verletzte, $data->mitarbeiterId);";
			$insert = mysqli_query($conn, $sql);

        }

        function getSchadensfall($conn) {
            $sql = "SELECT * FROM Schadensfall;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$schadensfallListe = array();
			foreach ($data as $schadensfall) {
				$obj = new Schadensfall();

				$obj->id = $schadensfall[0];
				$obj->datum = $schadensfall[1];
				$obj->ort = $schadensfall[2];
				$obj->beschreibung = $schadensfall[3];
				$obj->schadenshoehe = $schadensfall[4];
				$obj->verletzte = $schadensfall[5];
				$obj->mitarbeiterId = $schadensfall[6];
				
				array_push($schadensfallListe, $obj);
			}
            return $schadensfallListe;
        }

        function getSchadensfallByID($conn, $id) {
            $sql = "SELECT * FROM Schadensfall WHERE Array = $id;";
			$schadensfall = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Schadensfall();
			$obj->id = $schadensfall[0];
				$obj->datum = $schadensfall[1];
				$obj->ort = $schadensfall[2];
				$obj->beschreibung = $schadensfall[3];
				$obj->schadenshoehe = $schadensfall[4];
				$obj->verletzte = $schadensfall[5];
				$obj->mitarbeiterId = $schadensfall[6];
				
            return $obj;
        }

        function deleteSchadensfall($conn, $id) {
            $sql ="DELETE FROM Schadensfall WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateSchadensfall($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Datum = $data->datum,
				Ort = $data->ort,
				Beschreibung = $data->beschreibung,
				Schadenshoehe = $data->schadenshoehe,
				Verletzte = $data->verletzte,
				Mitarbeiter_ID = $data->mitarbeiterIWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>