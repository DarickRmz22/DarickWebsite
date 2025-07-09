	<section id ="home">
		<div class="row">
			<div class="section-title">
			</div>
			<div class="container">
				<?php
				require_once("functions.php");
				// Start session to store form data
				session_start();
				//turn on php to expose all errors/warnings, never do this on production! Ever!!!!!
				ini_set('display_errors',1);
				ini_set('displau_startup_errors',1); 
				error_reporting(E_ALL);
				
				if (!isset($_POST['submit'])) {
					echo '<div class="section-title"><h2>Please fill out the contact form below</h2></div>';
					echo '<form action="contact.php" method="post">';

					// First Name
					if (isset($_GET['fnameErr'])) {
						if ($_GET['fnameErr'] == "null") {
							echo '<div class="form-group has-error" id="firstNameGroup">
								<label class="control-label">First Name:</label>
								<input type="text" class="form-control" id="firstName" name="firstName">
								<span class="help-block" id="firstNameStatus"> First Name cannot be blank!</span>
							</div>';
						} elseif ($_GET['fnameErr'] == "invalid") {
							echo '<div class="form-group has-error" id="firstNameGroup">
								<label class="control-label">First Name:</label>
								<input type="text" class="form-control" id="firstName" name="firstName" value="' . $_SESSION['firstName'] . '">
								<span class="help-block" id="firstNameStatus"> First Name must only contain letters, hyphens, and apostrophes!</span>
							</div>';
						}
					} else {
						if (isset($_SESSION['firstName'])) {
							echo '<div class="form-group has-success" id="firstNameGroup">
								<label class="control-label">First Name:</label>
								<input type="text" class="form-control" id="firstName" name="firstName" value="' . $_SESSION['firstName'] . '">
								<span class="help-block" id="firstNameStatus"></span>
							</div>';
						} else {
							echo '<div class="form-group" id="firstNameGroup">
								<label class="control-label">First Name:</label>
								<input type="text" class="form-control" id="firstName" name="firstName">
								<span class="help-block" id="firstNameStatus"></span>
							</div>';
						}
					}

					// Last Name
					if (isset($_GET['lnameErr'])) {
						if ($_GET['lnameErr'] == "null") {
							echo '<div class="form-group has-error" id="lastNameGroup">
								<label class="control-label">Last Name:</label>
								<input type="text" class="form-control" id="lastName" name="lastName">
								<span class="help-block" id="lastNameStatus"> Last Name cannot be blank!</span>
							</div>';
						} elseif ($_GET['lnameErr'] == "invalid") {
							echo '<div class="form-group has-error" id="lastNameGroup">
								<label class="control-label">Last Name:</label>
								<input type="text" class="form-control" id="lastName" name="lastName" value="' . $_SESSION['lastName'] . '">
								<span class="help-block" id="lastNameStatus"> Last Name must only contain letters, hyphens, and apostrophes!</span>
							</div>';
						}
					} else {
						if (isset($_SESSION['lastName'])) {
							echo '<div class="form-group has-success" id="lastNameGroup">
								<label class="control-label">Last Name:</label>
								<input type="text" class="form-control" id="lastName" name="lastName" value="' . $_SESSION['lastName'] . '">
								<span class="help-block" id="lastNameStatus"></span>
							</div>';
						} else {
							echo '<div class="form-group" id="lastNameGroup">
								<label class="control-label">Last Name:</label>
								<input type="text" class="form-control" id="lastName" name="lastName">
								<span class="help-block" id="lastNameStatus"></span>
							</div>';
						}
					}

					// Email
					if (isset($_GET['emailErr'])) {
						if ($_GET['emailErr'] == "null") {
							echo '<div class="form-group has-error" id="emailGroup">
								<label class="control-label">Email Address:</label>
								<input type="text" class="form-control" id="email" name="email">
								<span class="help-block" id="emailStatus"> Email cannot be blank!</span>
							</div>';
						} elseif ($_GET['emailErr'] == "invalid") {
							echo '<div class="form-group has-error" id="emailGroup">
								<label class="control-label">Email Address:</label>
								<input type="text" class="form-control" id="email" name="email" value="' . $_SESSION['email'] . '">
								<span class="help-block" id="emailStatus"> Invalid Email format!</span>
							</div>';
						}
					} else {
						if (isset($_SESSION['email'])) {
							echo '<div class="form-group has-success" id="emailGroup">
								<label class="control-label">Email Address:</label>
								<input type="text" class="form-control" id="email" name="email" value="' . $_SESSION['email'] . '">
								<span class="help-block" id="emailStatus"></span>
							</div>';
						} else {
							echo '<div class="form-group" id="emailGroup">
								<label class="control-label">Email Address:</label>
								<input type="text" class="form-control" id="email" name="email">
								<span class="help-block" id="emailStatus"></span>
							</div>';
						}
					}

					// Phone
					if (isset($_GET['phoneErr'])) {
						if ($_GET['phoneErr'] == "null") {
							echo '<div class="form-group has-error" id="phoneGroup">
								<label class="control-label">Phone:</label>
								<input type="text" class="form-control" id="phone" name="phone">
								<span class="help-block" id="phoneStatus"> Phone cannot be blank!</span>
							</div>';
						} elseif ($_GET['phoneErr'] == "invalid") {
							echo '<div class="form-group has-error" id="phoneGroup">
								<label class="control-label">Phone:</label>
								<input type="text" class="form-control" id="phone" name="phone" value="' . $_SESSION['phone'] . '">
								<span class="help-block" id="phoneStatus"> Phone must only contain digits!</span>
							</div>';
						}
					} else {
						if (isset($_SESSION['phone'])) {
							echo '<div class="form-group has-success" id="phoneGroup">
								<label class="control-label">Phone:</label>
								<input type="text" class="form-control" id="phone" name="phone" value="' . $_SESSION['phone'] . '">
								<span class="help-block" id="phoneStatus"></span>
							</div>';
						} else {
							echo '<div class="form-group" id="phoneGroup">
								<label class="control-label">Phone:</label>
								<input type="text" class="form-control" id="phone" name="phone">
								<span class="help-block" id="phoneStatus"></span>
							</div>';
						}
					}

					// Username
					if (isset($_GET['usernameErr'])) {
						if ($_GET['usernameErr'] == "null") {
							echo '<div class="form-group has-error" id="usernameGroup">
								<label class="control-label">Username:</label>
								<input type="text" class="form-control" id="username" name="username">
								<span class="help-block" id="usernameStatus"> Username cannot be blank!</span>
							</div>';
						} elseif ($_GET['usernameErr'] == "invalid") {
							echo '<div class="form-group has-error" id="usernameGroup">
								<label class="control-label">Username:</label>
								<input type="text" class="form-control" id="username" name="username" value="' . $_SESSION['username'] . '">
								<span class="help-block" id="usernameStatus"> Invalid Username format!</span>
							</div>';
						}
					} else {
						if (isset($_SESSION['username'])) {
							echo '<div class="form-group has-success" id="usernameGroup">
								<label class="control-label">Username:</label>
								<input type="text" class="form-control" id="username" name="username" value="' . $_SESSION['username'] . '">
								<span class="help-block" id="usernameStatus"></span>
							</div>';
						} else {
							echo '<div class="form-group" id="usernameGroup">
								<label class="control-label">Username:</label>
								<input type="text" class="form-control" id="username" name="username">
								<span class="help-block" id="usernameStatus"></span>
							</div>';
						}
					}

					// Password
					if (isset($_GET['passwordErr'])) {
						if ($_GET['passwordErr'] == "null") {
							echo '<div class="form-group has-error" id="passwordGroup">
								<label class="control-label">Password:</label>
								<input type="text" class="form-control" id="password" name="password">
								<span class="help-block" id="passwordStatus"> Password cannot be blank!</span>
							</div>';
						}
					} else {
						if (isset($_SESSION['password'])) {
							echo '<div class="form-group has-success" id="passwordGroup">
								<label class="control-label">Password:</label>
								<input type="text" class="form-control" id="password" name="password" value="' . $_SESSION['password'] . '">
								<span class="help-block" id="passwordStatus"></span>
							</div>';
						} else {
							echo '<div class="form-group" id="passwordGroup">
								<label class="control-label">Password:</label>
								<input type="text" class="form-control" id="password" name="password">
								<span class="help-block" id="passwordStatus"></span>
							</div>';
						}
					}

					// Comments
					if (isset($_GET['commentsErr'])) {
						if ($_GET['commentsErr'] == "null") {
							echo '<div class="form-group has-error" id="commentsGroup">
								<label class="control-label">Comments:</label>
								<textarea id="comments" class="form-control" name="comments"></textarea>
								<span class="help-block" id="commentsStatus"> Comments cannot be blank!</span>
							</div>';
						}
					} else {
						if (isset($_SESSION['comments'])) {
							echo '<div class="form-group has-success" id="commentsGroup">
								<label class="control-label">Comments:</label>
								<textarea id="comments" class="form-control" name="comments">' . $_SESSION['comments'] . '</textarea>
								<span class="help-block" id="commentsStatus"></span>
							</div>';
						} else {
							echo '<div class="form-group" id="commentsGroup">
								<label class="control-label">Comments:</label>
								<textarea id="comments" class="form-control" name="comments"></textarea>
								<span class="help-block" id="commentsStatus"></span>
							</div>';
						}
					}

					// Submit Button
					echo '<button class="btn btn-default" type="submit" name="submit" value="submit">Submit</button>';
					echo '</form>';
				} else {
					$errors = array();
					$firstName = $_POST['firstName'];

					// First Name Validation
					if ($firstName == NULL) {
						$errors[] = "fnameErr=null";
					} elseif (!preg_match('/^[a-zA-Z\'-]+$/', $firstName)) {
						$errors[] = "fnameErr=invalid";
						$_SESSION['firstName'] = $firstName;
					} else {
						$_SESSION['firstName'] = $firstName;
					}

					// Last Name Validation
					$lastName = $_POST['lastName'];
					if ($lastName == NULL) {
						$errors[] = "lnameErr=null";
					} elseif (!preg_match('/^[a-zA-Z\'-]+$/', $lastName)) {
						$errors[] = "lnameErr=invalid";
						$_SESSION['lastName'] = $lastName;
					} else {
						$_SESSION['lastName'] = $lastName;
					}

					// Email Validation
					$email = $_POST['email'];
					if ($email == NULL) {
						$errors[] = "emailErr=null";
					} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$errors[] = "emailErr=invalid";
						$_SESSION['email'] = $email;
					} else {
						$_SESSION['email'] = $email;
					}

					// Phone Validation
					$phone = $_POST['phone'];
					if ($phone == NULL) {
						$errors[] = "phoneErr=null";
					} elseif (!preg_match('/^\d+$/', $phone)) {
						$errors[] = "phoneErr=invalid";
						$_SESSION['phone'] = $phone;
					} else {
						$_SESSION['phone'] = $phone;
					}

					// Username Validation
					$username = $_POST['username'];
					if ($username == NULL) {
						$errors[] = "usernameErr=null";
					} elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
						$errors[] = "usernameErr=invalid";
						$_SESSION['username'] = $username;
					} else {
						$_SESSION['username'] = $username;
					}

					// Password Validation
					$password = $_POST['password'];
					if ($password == NULL) {
						$errors[] = "passwordErr=null";
					} else {
						$_SESSION['password'] = $password;
					}

					// Comments Validation
					$comments = addslashes($_POST['comments']);
					if ($comments == NULL) {
						$errors[] = "commentsErr=null";
					} else {
						$_SESSION['comments'] = $comments;
					}

					// Check for Errors
					if (count($errors) > 0) 
					{
						$errorString = implode("&", $errors);
						//header("Location: contact.php?" . $errorString);
						redirect("contact.php?$errorString");
					
					} 
					else 
					{// no errors, insert into database
						// Success
						// in order to connect to a database we need: hos, db_user, db_password, db name 
						$dblink = db_connect("contact_data");
						// Corrected SQL query with properly matched quotes
						$sql = "INSERT INTO `contact_info` (`first_name`, `last_name`, `email`, `phone`, `username`, `password`, `comments`) 
        				VALUES ('$firstName', '$lastName', '$email', '$phone', '$username', '$password', '$comments')";

						// Execute the query and check for errors
						$dblink->query($sql) or
    					die("<div class=\"section-title\"><h2>Something went wrong with $sql<br>" . $dblink->error . "</h2></div>");

						echo '<div class="section-title"><h2>Data sent to database</h2></div>';

						//echo '<div class="section-title"><h2>Form Successfully Submitted</h2></div>';
						//echo "<p>First Name: $firstName</p>";
						//echo "<p>Last Name: $lastName</p>";
						//echo "<p>Email: $email</p>";
						//echo "<p>Phone: $phone</p>";
						//echo "<p>Username: $username</p>";
						//echo "<p>Password: $password</p>";
						//echo "<p>Comments: $comments</p>";
					}
				}
				?>
		</div>
			<hr>
	</div>
</section>
</body>
