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
<body>  
    <div>
        <a href="sites/mitarbeiter">Mitarbeiter</a>
    </div>
</body>
<?php
    dbCloseConnection($conn);
?>
