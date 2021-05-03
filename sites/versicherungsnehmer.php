<body>
  <?php
    // require_once('../data/apis/versicherungsnehmerApi.php');
    include '../data/db.php';
  
    $conn = dbConnect();
    // $versicherungsnehmerApi = new VersicherungsnehmerApi();
  ?>
</body>
<?php
dbCloseConnection($conn);
?>
