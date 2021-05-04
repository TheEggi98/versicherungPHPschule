<?php

	require_once __DIR__ . '/../models/Fahrzeugtyp.php';
    class FahrzeugtypApi {

        function createFahrzeugtyp($conn, $data) {
        	$sql = "INSERT INTO Fahrzeugtyp (id, bezeichnung, herstellerId) VALUES ($data->id, $data->bezeichnung, $data->herstellerId);";
			$insert = mysqli_query($conn, $sql);

        }

        function getFahrzeugtyp($conn) {
            $sql = "SELECT * FROM Fahrzeugtyp;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$fahrzeugtypListe = array();
			foreach ($data as $fahrzeugtyp) {
				$obj = new Fahrzeugtyp();

				$obj->id = $fahrzeugtyp[0];
				$obj->bezeichnung = $fahrzeugtyp[1];
				$obj->herstellerId = $fahrzeugtyp[2];
				
				array_push($fahrzeugtypListe, $obj);
			}
            return $fahrzeugtypListe;
        }

        function getFahrzeugtypByID($conn, $id) {
            $sql = "SELECT * FROM Fahrzeugtyp WHERE Array = $id;";
			$fahrzeugtyp = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Fahrzeugtyp();
			$obj->id = $fahrzeugtyp[0];
				$obj->bezeichnung = $fahrzeugtyp[1];
				$obj->herstellerId = $fahrzeugtyp[2];
				
            return $obj;
        }

        function deleteFahrzeugtyp($conn, $id) {
            $sql ="DELETE FROM Fahrzeugtyp WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateFahrzeugtyp($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Bezeichnung = $data->bezeichnung,
				Hersteller_ID = $data->herstellerIWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>