<?php

function dbConnect() {
    $conn = mysqli_connect('127.0.0.1', 'schule', '', 'eggersversicherung');
    if (!$conn) {
        die('keine Datenbank verbindung möglich: ' . mysql_error());
    } else {
        return $conn
    }
}

function dbCloseConnection($connection) {
    mysqli_close($connection);
}

?>