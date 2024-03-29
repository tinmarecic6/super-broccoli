<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'libraries.php'; ?>

	<title>Upis gosta</title>
</head>

<body>
	<?php
	session_start();
	require('db.php');
	$conn = db();
	$user = $_SESSION['username'];
	$sql_user = 'SELECT * FROM users where username="' . $user . '";';
	$result = $conn->query($sql_user);
	if ($result->num_rows == 1) {
	} else {
		$_SESSION['isUser'] = 0;
		header('Location:logout.php');
	}

	?>
	<div class="container-fluid ">
		<div class="row d-flex align-content-end flex-wrap justify-content-center">
			<h1 class="pb-3">Unos podataka o računu</h1>
		</div>
		<div>
			<form name="unos_gosta" method="POST" action="bill_data_preview.php">
				<div class="row justify-content-around text-center ">
					<div class="col-6 border shadow editor">
						<p class="mt-4">Ime gosta</p>
						<input type="text" name="cust_name" required>
						<hr />
						<p class="mt-4">Ima li gost ljubimca?</p>
						<label for="1">Da</label>
						<input type="radio" id="petYes" name="pet" value="1" required>
						<label for="0">Ne</label>
						<input type="radio" id="petNo" name="pet" value="0" required>
						<div id="pet_price" style="display: none;">
							<p>Količina novca za ljubimca:</p>
							<p class="text-secondary">Ako je cijena ostala 7, pusti 7.</p>
							<input type="number" id="pet_price" name="pet_price" value="7">
						</div>
						<hr>
						<p>Iznos akontacije:</p>
						<input type="number" name="akontacija" required>
						<hr>
						<p>Jedinicna cijena:</p>
						<input type="number" name="unit_price" required>
						<hr>
						<p>Odaberi datume!</p>
						<div class="row justify-content-center m-4">
							<fieldset>
								<div class="control-group">
									<div class="controls">
										<div class="input-prepend input-group">
											<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
											<input required type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" autocomplete="off" placeholder="Choose your dates" required>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<input type="submit" value="Unesi" class="btn btn-primary m-4">

					</div>
				</div>
			</form>
			<div class="row justify-content-around mt-4">
				<div class="col-6 text-center">
					<a href="guest_evidention.php" class="btn btn-secondary">Povratak na početak</a>
				</div>
			</div>
		</div>
		<?php
		?>
		<!-- Optional JavaScript -->
		<!--Datepicker-->
		<script type="text/javascript">
			var today = new Date();
			var tomorow = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1; //January is 0!
			var yyyy = today.getFullYear();

			if (dd < 10) {
				dd = '0' + dd;
			}

			if (mm < 10) {
				mm = '0' + mm;
			}
			var sd = dd + 1;
			today = dd + '-' + mm + '-' + yyyy;
			tomorow = sd + '-' + mm + '-' + yyyy;

			$('#reservation').daterangepicker({
					format: "DD-MM-YYYY",
					startDate: today,
					endDate: tomorow,
					minDate: today,
				},
				function(start, end, label) {}
			);
		</script>
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>