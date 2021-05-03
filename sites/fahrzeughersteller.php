<body>
  <?php
      // require_once('../data/apis/fahrzeugherstellerApi.php');
      include '../data/db.php';
  
      $conn = dbConnect();
      // $fahrzeugherstellerApi = new FahrzeugherstellerApi.php;
  ?>
</body>
<?php
dbCloseConnection($conn);
?>
