<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'libraries.php'; ?>
	<title>Login</title>
</head>

<body>
	<?php session_start(); ?>
	<div id="login">
		<div class="container">
			<div id="login-row" class="row justify-content-center align-items-center">
				<div id="login-column" class="col-md-6">
					<div id="login-box" class="col-md-12">
						<form id="login-form" class="form" action="redirect.php" method="post">
							<h3 class="text-center text-info">Login</h3>
							<div class="form-group">
								<label for="username" class="text-info">Korisničko ime:</label><br>
								<input type="text" name="username" id="username" class="form-control">
							</div>
							<div class="form-group">
								<label for="password" class="text-info">Zaporka:</label><br>
								<input type="password" name="password" id="password" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-info btn-md" value="Unesi">
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php if (isset($_SESSION['isUser']) && $_SESSION['isUser'] == 0) : ?>
				<div class="alert alert-danger show" role="alert">
					Krivo korisničko ime ili šifra.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</body>

</html>