<?php

	require_once __DIR__ . '/../models/Zuordnung_sf_fz.php';
    class Zuordnung_sf_fzApi {

        function createZuordnung_sf_fz($conn, $data) {
        	$sql = "INSERT INTO Zuordnung_sf_fz (id, schadensfallId, fahrzeugId, schadenshoehe) VALUES ($data->id, $data->schadensfallId, $data->fahrzeugId, $data->schadenshoehe);";
			$insert = mysqli_query($conn, $sql);

        }

        function getZuordnung_sf_fz($conn) {
            $sql = "SELECT * FROM Zuordnung_sf_fz;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$zuordnung_sf_fzListe = array();
			foreach ($data as $zuordnung_sf_fz) {
				$obj = new Zuordnung_sf_fz();

				$obj->id = $zuordnung_sf_fz[0];
				$obj->schadensfallId = $zuordnung_sf_fz[1];
				$obj->fahrzeugId = $zuordnung_sf_fz[2];
				$obj->schadenshoehe = $zuordnung_sf_fz[3];
				
				array_push($zuordnung_sf_fzListe, $obj);
			}
            return $zuordnung_sf_fzListe;
        }

        function getZuordnung_sf_fzByID($conn, $id) {
            $sql = "SELECT * FROM Zuordnung_sf_fz WHERE Array = $id;";
			$zuordnung_sf_fz = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Zuordnung_sf_fz();
			$obj->id = $zuordnung_sf_fz[0];
				$obj->schadensfallId = $zuordnung_sf_fz[1];
				$obj->fahrzeugId = $zuordnung_sf_fz[2];
				$obj->schadenshoehe = $zuordnung_sf_fz[3];
				
            return $obj;
        }

        function deleteZuordnung_sf_fz($conn, $id) {
            $sql ="DELETE FROM Zuordnung_sf_fz WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateZuordnung_sf_fz($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Schadensfall_ID = $data->schadensfallId,
				Fahrzeug_ID = $data->fahrzeugId,
				Schadenshoehe = $data->schadenshoehWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>