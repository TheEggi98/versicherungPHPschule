<?php

$host = "127.0.0.1";
$user = "schule";
$pw = "";
$db = "eggersversicherungn";


$conn = mysqli_connect($host, $user, $pw, $db);
    $tables = mysqli_query($conn, "SHOW TABLES;");
    foreach ($tables as $table) {
        $tableName = $table["Tables_in_$db"];
        $columns = mysqli_query($conn, "SHOW COLUMNS FROM $tableName");
		$tableName = strtolower($tableName);
		$tableName[0] = strtoupper($tableName[0]);
        $newModel = fopen("models/".$tableName.".php", "w");
        fwrite($newModel,"<?php\nclass $tableName {\n");
        foreach ($columns as $column) {
            $columnparts = explode("_", $column["Field"]);
            $colName = strtolower($columnparts[0]);
            if (count($columnparts) > 1) {
                $colName2 = strtolower($columnparts[1]);
                $colName2[0] = strtoupper($colName2[0]);
                $colName .= $colName2;
            }
            fwrite($newModel,"\tpublic $$colName;\n"); 


        }
        fwrite($newModel,"}\n?>");
        fclose($newModel);
    }
?>
