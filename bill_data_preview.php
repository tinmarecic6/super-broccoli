<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'libraries.php'; ?>
	<title>Provjera</title>
</head>

<body>
	<?php
	require('bill.php');
	require('db.php');
	$conn = db();
	$cust_name = $_POST['cust_name'];
	$hasPet = $_POST['pet'];
	$pet_cost = $_POST['pet_price'];
	$akontacija = $_POST['akontacija'];
	$unit_price = $_POST['unit_price'];
	$reservation = explode(' - ', $_POST['reservation']);
	$start_date = new DateTime($reservation[0]);
	$end_date = new DateTime($reservation[1]);
	$noNights = $end_date->diff($start_date)->format("%d");
	$start_date = $start_date->format('Y-m-d');
	$end_date = $end_date->format('Y-m-d');
	$sql_unos = 'INSERT INTO `bill`(`id`, `guest_name`, `has_pet`, `pet_price`, `accontation`, `unit_price`, `date_from`, `date_to`, `date_of_bill`) VALUES
    (NULL,"' . $cust_name . '",' . $hasPet . ',' . $pet_cost . ',' . $akontacija . ',' . $unit_price . ',"' . $start_date . '","' . $end_date . '",now());';
	// $conn->query($sql_unos);
	$id_racuna = $conn->insert_id;
	?>
	<div class=" border container-fluid d-flex flex-column justify-content-center align-items-center">
		<h3 class="border border-danger">Podaci su uneseni!</h3>
		<p>Unesene informacije o gostu:</p>
		<form name="provjera" method="POST" action="data_write.php" class="border border-primary">
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
				<li><?php echo 'Datum dolaska: ' . $reservation[0] ?></li>
				<li><?php echo 'Datum odlaska: ' . $reservation[1]; ?></li>
			</ul>
		</form>
		<?php
		echo '<a href = "bill_print.php?id_bill=' . $id_racuna . '" target="_blank">PDF</a>' ?>
		<a href="guest_evidention.php">Povratak</a>
	</div>
</body>

</html>