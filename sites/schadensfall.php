<body>
  <?php
    // require_once('../data/apis/schadensfallApi.php');
    include '../data/db.php';
  
    $conn = dbConnect();
    // $schadensfallApi = new SchadensfallApi();
  ?>
</body>
<?php
dbCloseConnection($conn);
?>
