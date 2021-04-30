<?php
    $conn = mysqli_connect('127.0.0.1', 'schule', '', 'eggersversicherung');
    $tables = mysqli_query($conn, "SHOW TABLES;")
    foreach ($tables as $table) {
        $tableName = mysqli_fetch_row($table)[0];
        $columns = mysqli_query($conn, "SHOW COLUMNS FROM $tableName");
        $newModel = fopen("models/".strtolower($tableName).".php", "w");
        fwrite($newModel,"<?php\nclass $tableName {\n");
        foreach ($columns as $column) {
            $columnparts = explode("_", $column["Field"]);
            if (count($columnparts) > 1) {
                $columnparts[0]->strtolower();
                $columnparts[1]->strtolower();
                $columnparts[1][0]->strtoupper(); // idk if this works ^^
            }
            fwrite($newModel,"\tpublic $$column;\n"); 


        }
        fwrite($newModel,"}\n?>");
        fclose($newModel);
    }
?>
