<?php




$conn = mysqli_connect('127.0.0.1', 'schule', '', 'eggersversicherung');
$tables = mysqli_query($conn, "SHOW TABLES;")
foreach ($tables as $table) {
    $columns = mysqli_query($conn, "SHOW COLUMNS FROM $table");
    $newApi = fopen("apis/".strtolower($table).".php", "w");

    fwrite($newApi,"<?php\n
        class '.$table.'Api {\n
        \tfunction create".$table.'($conn, $data) {\n
        $sql = "INSERT INTO '.$table."\n (");

    $columnString = "";
    $valuesString = ") VALUES (";
    $dbID = "";
    $updateIDString = "";
    $updateString = "";
    foreach ($columns as $column) {
        if ($dbID == "") {
            $dbID = $column;
        }
        $columnString += $column.", ";
        $columnparts = explode("_", $column["Field"]);
        $colName = strtolower($columnparts[0]);
        if (count($columnparts) > 1) {
            $colName2 = strtolower($columnparts[1]);
            $colName2[0] = strtoupper($colName2[0]);
            $colName .= $colName2;
        }
        if ($updateIDString == "") {
            $updateIDString = $column.' = $data->'.$colName;
        }
        $updateString += $column.' = $data->'.$colName.','."\n";
        $valuesString += '$data->'.$colName.', ';


    }
    fwrite($newApi, substr($columnString, 0, -2));
    $valuesString = substr($valuesString, 0, -2) .');";'."\n";
    fwrite($newApi, $valuesString );
    fwrite($newApi,  '$insert = mysqli_query($conn, $sql);'."\n".'
        }'."\n\n".'

        function get'.$table.'($conn) {'."\n".'
            $sql = "SELECT * FROM '.$table.';";'."\n".'
            return mysqli_query($conn, $sql);'."\n".'
        }'."\n\n".'

        function get'.$table.'ByID($conn, $id) {'."\n".'
            $sql = "SELECT * FROM '.$table.' WHERE '.$dbID.' = $id;";'."\n".'
            return mysqli_query($conn, $sql);'."\n".'
        }'."\n\n".'

        function delete'.$table.'($conn, $id) {'."\n".'
            $sql ="DELETE FROM '.$table.' WHERE '.$dbID.' = $id";'."\n".'
            $delete = mysqli_query($donn, $sql);'."\n".'
        }'."\n\n".'

        function update'.$table.'($conn, $data) {'."\n".'
            $sql = "UPDATE Mitarbeiter SET '."\n");
    $updateString = substr($updateString, 0, -3);
    $updateString += "WHERE $updateIDString;".'";'."\n";
    fwrite($newApi, $updateString );
    fwrite($newApi, '$update = mysqli_query($conn, $sql);'."\n}")

    fwrite($newApi,"}\n?>");
    fclose($newApi);
}

        '$update = mysqli_query($conn, $sql);'."\n}".'
    }'."\n".'
?>';
?>
