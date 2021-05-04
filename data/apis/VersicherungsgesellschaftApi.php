<?php

	require_once __DIR__ . '/../models/Versicherungsgesellschaft.php';
    class VersicherungsgesellschaftApi {

        function createVersicherungsgesellschaft($conn, $data) {
        	$sql = "INSERT INTO Versicherungsgesellschaft (id, bezeichnung, ort) VALUES ($data->id, $data->bezeichnung, $data->ort);";
			$insert = mysqli_query($conn, $sql);

        }

        function getVersicherungsgesellschaft($conn) {
            $sql = "SELECT * FROM Versicherungsgesellschaft;";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$versicherungsgesellschaftListe = array();
			foreach ($data as $versicherungsgesellschaft) {
				$obj = new Versicherungsgesellschaft();

				$obj->id = $versicherungsgesellschaft[0];
				$obj->bezeichnung = $versicherungsgesellschaft[1];
				$obj->ort = $versicherungsgesellschaft[2];
				
				array_push($versicherungsgesellschaftListe, $obj);
			}
            return $versicherungsgesellschaftListe;
        }

        function getVersicherungsgesellschaftByID($conn, $id) {
            $sql = "SELECT * FROM Versicherungsgesellschaft WHERE Array = $id;";
			$versicherungsgesellschaft = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new Versicherungsgesellschaft();
			$obj->id = $versicherungsgesellschaft[0];
				$obj->bezeichnung = $versicherungsgesellschaft[1];
				$obj->ort = $versicherungsgesellschaft[2];
				
            return $obj;
        }

        function deleteVersicherungsgesellschaft($conn, $id) {
            $sql ="DELETE FROM Versicherungsgesellschaft WHERE Array = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function updateVersicherungsgesellschaft($conn, $data) {

            $sql = "UPDATE Mitarbeiter SET 
				ID = $data->id,
				Bezeichnung = $data->bezeichnung,
				Ort = $data->orWHERE id = $data->id;";
			$update = mysqli_query($conn, $sql);
		}
	}
?>