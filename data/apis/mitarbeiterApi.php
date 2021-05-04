<?php

	require_once __DIR__ . '/../models/Mitarbeiter.php';
    class MitarbeiterApi {

        function createMitarbeiter($conn, $data) {
        	$sql = "INSERT INTO Mitarbeiter (id, personalnummer, name, vorname, geburtsdatum, telefon, mobil, email, raum, istLeiter, abteilungId) VALUES ($data->id, $data->personalnummer, $data->name, $data->vorname, $data->geburtsdatum, $data->telefon, $data->mobil, $data->email, $data->raum, $data->istLeiter, $data->abteilungId);";
			$insert = mysqli_query($conn, $sql);

        }

        function getMitarbeiter($conn) {
            $sql = "SELECT * FROM Mitarbeiter;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$mitarbeiterListe = array();
			foreach ($data as $mitarbeiter) {
				$obj = new Mitarbeiter();

				$obj->id = $mitarbeiter[0];
				$obj->personalnummer = $mitarbeiter[1];
				$obj->name = $mitarbeiter[2];
				$obj->vorname = $mitarbeiter[3];
				$obj->geburtsdatum = $mitarbeiter[4];
				$obj->telefon = $mitarbeiter[5];
				$obj->mobil = $mitarbeiter[6];
				$obj->email = $mitarbeiter[7];
				$obj->raum = $mitarbeiter[8];
				$obj->istLeiter = $mitarbeiter[9];
				$obj->abteilungId = $mitarbeiter[10];
				
				array_push($mitarbeiterListe, $obj);
			}
            return $mitarbeiterListe;
        }

        function getMitarbeiterByID($conn, $id) {
            $sql = "SELECT * FROM Mitarbeiter WHERE Array = $id;";
			$mitarbeiter = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Mitarbeiter();
			$obj->id = $mitarbeiter[0];
				$obj->personalnummer = $mitarbeiter[1];
				$obj->name = $mitarbeiter[2];
				$obj->vorname = $mitarbeiter[3];
				$obj->geburtsdatum = $mitarbeiter[4];
				$obj->telefon = $mitarbeiter[5];
				$obj->mobil = $mitarbeiter[6];
				$obj->email = $mitarbeiter[7];
				$obj->raum = $mitarbeiter[8];
				$obj->istLeiter = $mitarbeiter[9];
				$obj->abteilungId = $mitarbeiter[10];
				
            return $obj;
        }

        function deleteMitarbeiter($conn, $id) {
            $sql ="DELETE FROM Mitarbeiter WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateMitarbeiter($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Personalnummer = $data->personalnummer,
				Name = $data->name,
				Vorname = $data->vorname,
				Geburtsdatum = $data->geburtsdatum,
				Telefon = $data->telefon,
				Mobil = $data->mobil,
				Email = $data->email,
				Raum = $data->raum,
				Ist_Leiter = $data->istLeiter,
				Abteilung_ID = $data->abteilungIWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>