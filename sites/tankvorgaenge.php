<body>
  <?php
      // require_once('../data/apis/tankvorgaengeApi.php');
      include '../data/db.php';
  
      $conn = dbConnect();
      // $tankvorgaengeApi = new TankvorgaengeApi.php;
  ?>
</body>
<?php
dbCloseConnection($conn);
?>
