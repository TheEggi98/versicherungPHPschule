<body>
  <?php
  require_once('../data/apis/versicherungsvertragApi.php');
  include '../data/db.php';
  
  $conn = dbConnect();
  
  $vertragsApi = new VersicherungsvertragApi();
  ?>
</body>
