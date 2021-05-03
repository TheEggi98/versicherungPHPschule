<?php




$conn = mysqli_connect('127.0.0.1', 'schule', '', 'eggersversicherung');
$tables = mysqli_query($conn, "SHOW TABLES;")
foreach ($tables as $table) {
    $tableName = mysqli_fetch_row($table)[0];
    $columns = mysqli_query($conn, "SHOW COLUMNS FROM $tableName");
    $newApi = fopen("apis/".strtolower($table).".php", "w");

    fwrite($newApi,"<?php\n
        class '.$tableName.'Api {\n
        \tfunction create".$tableName.'($conn, $data) {\n
        $sql = "INSERT INTO '.$tableName."\n (");

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

        function get'.$tableName.'($conn) {'."\n".'
            $sql = "SELECT * FROM '.$tableName.';";'."\n".'
            return mysqli_query($conn, $sql);'."\n".'
        }'."\n\n".'

        function get'.$tableName.'ByID($conn, $id) {'."\n".'
            $sql = "SELECT * FROM '.$tableName.' WHERE '.$dbID.' = $id;";'."\n".'
            return mysqli_query($conn, $sql);'."\n".'
        }'."\n\n".'

        function delete'.$tableName.'($conn, $id) {'."\n".'
            $sql ="DELETE FROM '.$tableName.' WHERE '.$dbID.' = $id";'."\n".'
            $delete = mysqli_query($donn, $sql);'."\n".'
        }'."\n\n".'

        function update'.$tableName.'($conn, $data) {'."\n".'
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
