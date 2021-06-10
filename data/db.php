<?php


function dbConnect() {
	$host = "127.0.0.1";
	$user = "schule";
	$pw = "";
	$db = "bn_versicherung";
    $conn = mysqli_connect($host, $user, $pw, $db);
    if (!$conn) {
        die('keine Datenbank verbindung möglich: ' . mysql_error());
    } else {
        return $conn;
    }
}

function dbCloseConnection($connection) {
    mysqli_close($connection);
}

?>
