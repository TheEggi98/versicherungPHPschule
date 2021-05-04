<?php

	require_once __DIR__ . '/../models/Fahrzeug.php';
    class FahrzeugApi {

        function createFahrzeug($conn, $data) {
        	$sql = "INSERT INTO Fahrzeug (id, kennzeichen, farbe, fahrzeugtypId) VALUES ($data->id, $data->kennzeichen, $data->farbe, $data->fahrzeugtypId);";
			$insert = mysqli_query($conn, $sql);

        }

        function getFahrzeug($conn) {
            $sql = "SELECT * FROM Fahrzeug;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$fahrzeugListe = array();
			foreach ($data as $fahrzeug) {
				$obj = new Fahrzeug();

				$obj->id = $fahrzeug[0];
				$obj->kennzeichen = $fahrzeug[1];
				$obj->farbe = $fahrzeug[2];
				$obj->fahrzeugtypId = $fahrzeug[3];
				
				array_push($fahrzeugListe, $obj);
			}
            return $fahrzeugListe;
        }

        function getFahrzeugByID($conn, $id) {
            $sql = "SELECT * FROM Fahrzeug WHERE Array = $id;";
			$fahrzeug = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Fahrzeug();
			$obj->id = $fahrzeug[0];
				$obj->kennzeichen = $fahrzeug[1];
				$obj->farbe = $fahrzeug[2];
				$obj->fahrzeugtypId = $fahrzeug[3];
				
            return $obj;
        }

        function deleteFahrzeug($conn, $id) {
            $sql ="DELETE FROM Fahrzeug WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateFahrzeug($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Kennzeichen = $data->kennzeichen,
				Farbe = $data->farbe,
				Fahrzeugtyp_ID = $data->fahrzeugtypIWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>