<?php
    $conn = mysqli_connect('127.0.0.1', 'schule', '', 'eggersversicherung');
    $tables = mysqli_query($conn, "SHOW TABLES;")
    echo $tables;
?>