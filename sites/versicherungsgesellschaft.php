<body>
  <?php
      // require_once('../data/apis/versicherungsgesellschaftApi.php');
      include '../data/db.php';
  
      $conn = dbConnect();
      // $versicherungsgesellschaftApi = new VersicherungsgesellschaftApi.php;
  ?>
</body>
<?php
dbCloseConnection($conn);
?>
