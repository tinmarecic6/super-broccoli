<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'libraries.php'; ?>
	<title>Evidnecija gostiju</title>
</head>

<body>
	<?php
	header('Content-type: text/html; charset=UTF-8');
	session_start();
	function iso88592($string)
	{
		$string = mb_convert_encoding($string, 'ISO-8859-2');
		return $string;
	}
	function totalPrice($noNights, $unitPrice, $hasPet, $petPrice)
	{
		$total = 0;
		if ($hasPet == 1) {
			$total = ($noNights * $unitPrice) + ($noNights * $petPrice);
		} else {
			$total = $noNights * $unitPrice;
		}
		return $total;
	}
	require('db.php');
	$conn = db();
	$user = $_SESSION['username'];
	$sql_user = 'SELECT * FROM users where username="' . $user . '";';
	$result = $conn->query($sql_user);
	if ($result->num_rows == 1) {
		$_SESSION['isUser'] = 1;
	} else {
		$_SESSION['isUser'] = 0;
		header('Location:logout.php');
	}

	$sql_bill = 'SELECT * FROM bill;';
	$result = $conn->query($sql_bill);
	?>
	<div class="container-fluid">
		<div class="row justify-content-around">
			<div class="col-2"></div>
			<div class="col-4">
				<h1 class="pb-3 mb-4 text-center ">Evidencija gostiju</h1>
			</div>
			<div class="col-2 text-center mt-4">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $user; ?>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="guest_evidention.php">Evidencija gostiju</a>
						<a class="dropdown-item" href="cust_signin.php">Unos novog gosta</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-10 text-right m-4">
				<input id="guestSearch" type="text" placeholder="Search.." class="border">
			</div>
		</div>
		<div class="row justify-content-around">
			<div class="col-10" style="overflow-x: auto;">
				<table class="table table-dark text-center ">
					<thead>
						<tr>
							<th scope="col">ID računa</th>
							<th scope="col">Ime i prezime gosta</th>
							<th scope="col">Ima li gost ljubimca?</th>
							<th scope="col">Cijena ljubimca</th>
							<th scope="col">Akontacija</th>
							<th scope="col">Jedinična cijena</th>
							<th scope="col">Iznos računa</th>
							<th scope="col">Datum dolaska</th>
							<th scope="col">Datum odlaska</th>
							<th scope="col">Nadnevak</th>
							<th scope="col">Printanje</th>
							<th scope="col">Brisanje</th>
						</tr>
					</thead>
					<tbody id="guestTable">
						<?php
						foreach ($result as $r) {
							$date_from = new DateTime($r['date_from']);
							$date_to = new DateTime($r['date_to']);
							$noNights = $date_to->diff($date_from)->format("%d");
							$date_from = $date_from->format('d.m.Y');
							$date_to = $date_to->format('d.m.Y');
							if ($r['has_pet'] == '1') {
								$petCost = $noNights * $r['pet_price'];
							}
							echo '<tr>
                        <td scope="row">' . $r['id'] . '</td>
                        <td>' . $r['guest_name'] . '</td>';
							if ($r['has_pet'] == 1) {
								echo '<td>Da</td>';
								echo '<td>' . $r['pet_price'] . '</td>';
							} else {
								echo '<td>Ne</td>';
								echo '<td>0</td>';
							}
							echo    '<td>' . $r['accontation'] . '</td>
                        <td>' . $r['unit_price'] . '</td>';
							echo  '<td>' . totalPrice($noNights, $r['unit_price'], $r['has_pet'], $r['pet_price']) . '</td>
                        <td>' . $date_from . '</td>
                        <td>' . $date_to . '</td>
                        <td>' . $r['date_of_bill'] . '</td>
                        <td><a href = "bill_print.php?id_bill=' . $r['id'] . '" target="_blank">PDF</a></td>
						<td><a href = "delete_id.php?id_bill=' . $r['id'] . '" target="_self">Delete</a></td>
                        </tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row justify-content-around">
			<div class="col text-center">
				<a href="cust_signin.php" class="btn btn-secondary">Unesi novog gosta</a>
			</div>
		</div>
	</div>
	</div>
</body>

</html>