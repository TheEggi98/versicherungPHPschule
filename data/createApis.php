<?php

$host = "127.0.0.1";
$user = "schule";
$pw = "";
$db = "teichlerversicherung";


$conn = mysqli_connect($host, $user, $pw, $db);
$tables = mysqli_query($conn, "SHOW TABLES;");
foreach ($tables as $table) {
    $tableName = $table["Tables_in_$db"];
    $columns = mysqli_query($conn, "SHOW COLUMNS FROM $tableName");
	$tableName = strtolower($tableName);
	$tableName[0] = strtoupper($tableName[0]);
    $newApi = fopen("apis/".$tableName."Api.php", "w");

    fwrite($newApi,"<?php\n
	require_once __DIR__ . '/../models/$tableName.php';
    class ".$tableName."Api {\n
        function create".$tableName.'($conn, $data) {
        '."\t".'$sql = "INSERT INTO '.$tableName." (");

    $columnString = "";
    $valuesString = ") VALUES (";
    $dbID = "";
    $updateIDString = "";
    $updateString = "";
	$objectAssignString = "";
	$columnIndex = 0;
    foreach ($columns as $column) {
        if ($dbID == "") {
            $dbID = $column;
        }
        $columnparts = explode("_", $column["Field"]);
        $colName = strtolower($columnparts[0]);
        if (count($columnparts) > 1) {
            $colName2 = strtolower($columnparts[1]);
            $colName2[0] = strtoupper($colName2[0]);
            $colName .= $colName2;
        }
        if ($updateIDString == "") {
            $updateIDString = $colName.' = $data->'.$colName;
        }
        $columnString .= $colName.", ";
        $updateString .= "\t\t\t\t".$column["Field"].' = $data->'.$colName.','."\n";
        $valuesString .= '$data->'.$colName.', ';
		$objectAssignString .= '$obj->'.$colName.' = $'.strtolower($tableName).'['.$columnIndex++."];\n\t\t\t\t";
    }
    fwrite($newApi, substr($columnString, 0, -2));
    $valuesString = substr($valuesString, 0, -2) .');";'."\n";
    fwrite($newApi, $valuesString );
    fwrite($newApi,  "\t\t\t".'$insert = mysqli_query($conn, $sql);'."\n".'
        }

        function get'.$tableName.'($conn) {
            $sql = "SELECT * FROM '.$tableName.';";
			$data = mysqli_fetch_all(mysqli_query($conn, $sql));
			$'.strtolower($tableName).'Liste = array();
			foreach ($data as $'.strtolower($tableName).') {
				$obj = new '.$tableName.'();'."\n".'
				'.$objectAssignString.'
				array_push($'.strtolower($tableName).'Liste, $obj);
			}
            return $'.strtolower($tableName).'Liste;
        }

        function get'.$tableName.'ByID($conn, $id) {
            $sql = "SELECT * FROM '.$tableName.' WHERE '.$dbID.' = $id;";
			$'.strtolower($tableName).' = mysqli_fetch_all(mysqli_query($conn, $sql));
			$obj = new '.$tableName.'();
			'.$objectAssignString.'
            return $obj;
        }

        function delete'.$tableName.'($conn, $id) {
            $sql ="DELETE FROM '.$tableName.' WHERE '.$dbID.' = $id";
            $delete = mysqli_query($donn, $sql);
        }

        function update'.$tableName.'($conn, $data) {'."\n".'
            $sql = "UPDATE Mitarbeiter SET '."\n");
    $updateString = substr($updateString, 0, -3);
    $updateString .= "WHERE $updateIDString;".'";'."\n";
    fwrite($newApi, $updateString );
    fwrite($newApi, "\t\t\t".'$update = mysqli_query($conn, $sql);'."\n\t\t}\n\t");

    fwrite($newApi,"}\n?>");
    fclose($newApi);
}

        '$update = mysqli_query($conn, $sql);'."\n}".'
    }
?>';
?>
