<!DOCTYPE HTML>  
<html>
  <?php // header('Content-type: html; charset=utf-8'); Macht Ä nur kaputt  ?>
  <head>
  <style>
  <?php include '../style.css'; ?>
  </style>

  <title>Versicherung</title>
  </head>
  <body>
	  <?php
	  require_once('../data/apis/mitarbeiterApi.php');
	  include '../data/db.php';
	  $mitarbeiterApi = new MitarbeiterApi();
	  $conn = dbConnect();
	  
	  $mitarbeiter = $mitarbeiterApi->getMitarbeiter($conn);  
	  ?>
	  <table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Personalnummer</th>
				<th>Name</th>
				<th>Vorname</th>
				<th>Geburtsdatum</th>
				<th>Telefon</th>
				<th>Mobil</th>
				<th>E-Mail</th>
				<th>Raum</th>
				<th>ist Leiter</th>
				<th>Abteilungs ID</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			foreach ($mitarbeiter as $ma) {
				echo "<tr>";
				echo "<td>$ma->id</td>";
				echo "<td>$ma->personalnummer</td>";
				echo "<td>$ma->name</td>";
				echo "<td>$ma->vorname</td>";
				echo "<td>$ma->geburtsdatum</td>";
				echo "<td>$ma->telefon</td>";
				echo "<td>$ma->mobil</td>";
				echo "<td>$ma->email</td>";
				echo "<td>$ma->raum</td>";
				echo "<td>$ma->istLeiter</td>";
				echo "<td>$ma->abteilungId</td>";
				
				echo "</tr>";
			}
		?>
		</tbody>
	  </table>
	</body>
	<?php
	dbCloseConnection($conn);
	?>
</html>