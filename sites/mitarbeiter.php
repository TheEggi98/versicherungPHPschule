<body>
  <?php
  require_once('../data/apis/mitarbeiterApi.php');
  include '../data/db.php';
  $mitarbeiterApi = new MitarbeiterApi();
  $conn = dbConnect();
  
  print_r($mitarbeiterApi->getMitarbeiter($conn)
  ?>
  <h1>Mitarbeiter works!</h1>
</body>
<?php
dbCloseConnection($conn);
?>
