<?php

	require_once __DIR__ . '/../models/Fahrzeughersteller.php';
    class FahrzeugherstellerApi {

        function createFahrzeughersteller($conn, $data) {
        	$sql = "INSERT INTO Fahrzeughersteller (id, name, land) VALUES ($data->id, $data->name, $data->land);";
			$insert = mysqli_query($conn, $sql);

        }

        function getFahrzeughersteller($conn) {
            $sql = "SELECT * FROM Fahrzeughersteller;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$fahrzeugherstellerListe = array();
			foreach ($data as $fahrzeughersteller) {
				$obj = new Fahrzeughersteller();

				$obj->id = $fahrzeughersteller[0];
				$obj->name = $fahrzeughersteller[1];
				$obj->land = $fahrzeughersteller[2];
				
				array_push($fahrzeugherstellerListe, $obj);
			}
            return $fahrzeugherstellerListe;
        }

        function getFahrzeugherstellerByID($conn, $id) {
            $sql = "SELECT * FROM Fahrzeughersteller WHERE Array = $id;";
			$fahrzeughersteller = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Fahrzeughersteller();
			$obj->id = $fahrzeughersteller[0];
				$obj->name = $fahrzeughersteller[1];
				$obj->land = $fahrzeughersteller[2];
				
            return $obj;
        }

        function deleteFahrzeughersteller($conn, $id) {
            $sql ="DELETE FROM Fahrzeughersteller WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateFahrzeughersteller($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Name = $data->name,
				Land = $data->lanWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>