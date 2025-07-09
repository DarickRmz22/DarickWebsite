<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<link href="assets/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
	<?php
		// Initialize error messages and input values
		$usernameError = $passwordError = "";
		$username = $password = "";

		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			// Basic validation for empty fields
			if (empty($username)) {
				$usernameError = "Username cannot be empty.";
			}
			if (empty($password)) {
				$passwordError = "Password cannot be empty.";
			}

			// If no errors, process the form
			if (empty($usernameError) && empty($passwordError)) {
				include("functions.php");
				$dblink = db_connect('contact_data');
				$salt = "CS4413fa24";
				$hash = hash('sha256', $username . $password . $salt);
				$sql = "Insert into `accounts` (`username`, `hash`) values('$username', '$hash')";
				
				if ($dblink->query($sql)) {
					redirect("index.php?page=login");
					exit;
				} else {
					die("<h2> Something went wrong with $sql<br>" . $dblink->error . "</h2>");
				}
			}
		}

		// Start the form display
		echo '<h2>Please fill out the following form:</h2>';
		echo '<form method="post" action="">';

		// Username field
		echo '<div class="form-group">';
		echo '<label class="control-label">Username:</label>';
		echo '<input name="username" type="text" class="form-control" value="' . htmlspecialchars($username) . '">';
		if (!empty($usernameError)) {
			echo '<div class="text-danger">' . $usernameError . '</div>';
		}
		echo '</div>';

		// Password field
		echo '<div class="form-group">';
		echo '<label class="control-label">Password:</label>';
		echo '<input name="password" type="password" class="form-control">';
		if (!empty($passwordError)) {
			echo '<div class="text-danger">' . $passwordError . '</div>';
		}
		echo '</div>';

		// Submit button
		echo '<button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>';
		echo '</form>';
	?>
</body>
</html>
