<?php

	require_once __DIR__ . '/../models/Dienstwagen.php';
    class DienstwagenApi {

        function createDienstwagen($conn, $data) {
        	$sql = "INSERT INTO Dienstwagen (id, kennzeichen, farbe, fahrzeugtypId, mitarbeiterId) VALUES ($data->id, $data->kennzeichen, $data->farbe, $data->fahrzeugtypId, $data->mitarbeiterId);";
			$insert = mysqli_query($conn, $sql);

        }

        function getDienstwagen($conn) {
            $sql = "SELECT * FROM Dienstwagen;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$dienstwagenListe = array();
			foreach ($data as $dienstwagen) {
				$obj = new Dienstwagen();

				$obj->id = $dienstwagen[0];
				$obj->kennzeichen = $dienstwagen[1];
				$obj->farbe = $dienstwagen[2];
				$obj->fahrzeugtypId = $dienstwagen[3];
				$obj->mitarbeiterId = $dienstwagen[4];
				
				array_push($dienstwagenListe, $obj);
			}
            return $dienstwagenListe;
        }

        function getDienstwagenByID($conn, $id) {
            $sql = "SELECT * FROM Dienstwagen WHERE Array = $id;";
			$dienstwagen = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Dienstwagen();
			$obj->id = $dienstwagen[0];
				$obj->kennzeichen = $dienstwagen[1];
				$obj->farbe = $dienstwagen[2];
				$obj->fahrzeugtypId = $dienstwagen[3];
				$obj->mitarbeiterId = $dienstwagen[4];
				
            return $obj;
        }

        function deleteDienstwagen($conn, $id) {
            $sql ="DELETE FROM Dienstwagen WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateDienstwagen($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Kennzeichen = $data->kennzeichen,
				Farbe = $data->farbe,
				Fahrzeugtyp_ID = $data->fahrzeugtypId,
				Mitarbeiter_ID = $data->mitarbeiterIWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>