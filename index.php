<?php
  include 'data/db.php';


  $conn = dbConnect();
?>

<!DOCTYPE HTML>  
<html>
<?php // header('Content-type: html; charset=utf-8'); Macht Ä nur kaputt  ?>
<head>
<style>
<?php include './style.css'; ?>
</style>

<title>Versicherung</title>
</head>
<body class="d-flex flex-column">  
    <div>

    </div>
</body>
<?php
    dbCloseConnection($conn);
?>