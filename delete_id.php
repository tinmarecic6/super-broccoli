<!DOCTYPE html>
<html>
	
<head>
	<title>Brisanje gosta</title>
	<?php include 'libraries.php'; ?>
	<style>
		p, li, .btn{
			font-size:20px;
		}
	</style>
</head>

<body>
	<?php
	require('bill.php');
	require('db.php');
	$conn = db();
	$id_racuna = $_GET['id_bill'];
	$search_query = 'SELECT * FROM bill WHERE id = ' . $id_racuna . ';';
	$result = $conn->query($search_query);


	while ($row = $result->fetch_assoc()) {
		$cust_name = $row["guest_name"];
		$hasPet = $row["has_pet"];
		$pet_cost = $row["pet_price"];
		$akontacija = $row["accontation"];
		$unit_price = $row["unit_price"];
		$date_from = $row["date_from"];
		$date_to = $row["date_to"];
	}
	?>
	<div class="container-fluid d-flex flex-column justify-content-center align-items-center  p-3">
		<h1>Potvrda o brisanju</h1>
		<p>Informacije o gostu koji se briše:</p>
		<form name="brisanje" method="POST" action="delete.php">
			<ul>
				<li>Ime gosta: <b><?php echo $cust_name; ?></b></li>
				<li>Ljubimac: <?php if ($hasPet == '1') {
									echo 'Da';
								} else {
									echo 'Ne';
								}; ?></li>
				<li>Ljubimac po cijeni: <?php echo $pet_cost; ?></li>
				<li>Iznos uplaćene akontacije: <?php echo $akontacija; ?></li>
				<li>Apartman je izdan po cijeni: <?php echo $unit_price; ?></li>
				<li><?php echo 'Datum dolaska: ' . $date_from ?></li>
				<li><?php echo 'Datum odlaska: ' . $date_to; ?></li>
			</ul>
			<div class="d-flex flex-column justify-content-center align-items-center">
				<input type="hidden" name="id_bill" id="id_bill" value="<?php echo $id_racuna ?>" required>
				<input type="submit" value="Brisanje" class="btn btn-danger m-2">
				<a href="guest_evidention.php" class="btn btn-outline-secondary">Povratak</a>
			</div>
		</form>
	</div>
</body>

</html>