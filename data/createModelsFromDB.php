<?php
    $conn = mysqli_connect('127.0.0.1', 'schule', '', 'eggersversicherung');
    $tables = mysqli_query($conn, "SHOW TABLES;")
    foreach ($tables as $table) {
        $columns = mysqli_query($conn, "SHOW COLUMNS FROM $table");
        $newModel = fopen("models/".strtolower($table).".php", "w");
        fwrite($newModel,"<?php\nclass $table {\n";);
        foreach ($columns as $column) {
            $modelProperty = "";
            $nextCharCapital = false;
            foreach ($column as $char) {
                if ($nextCharCapital && $char !== "_") {
                    $modelproperty += strtoupper($char);
                    $nextCharCapital = false;
                } else {
                    if ($char !== "_") {
                        $modelProperty += strtolower($char);
                    } else {
                        $nextCharCapital = true;
                    }
                }
                
            }
            fwrite($newModel,"\tpublic $$modelProperty;\n";); 


        }
        fwrite($newModel,"}\n?>");
        fclose($newModel);
    }
?>