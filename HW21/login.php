<?php
$usernameError = $passwordError = "";
$username = $password = "";

// Display the form
echo '<section id="home">';
echo '<div class="row">';
echo '<div class="container">';
echo '<h2>Please log in to continue:</h2>';
echo '<form method="post" action="">';

// Username field
echo '<div class="form-group">';
echo '<label class="control-label">Username:</label>'; 
echo '<input name="username" type="text" class="form-control" value="' . htmlspecialchars($username) . '">';
if (!empty($usernameError)) {
    echo '<div class="text-danger">' . $usernameError . '</div>';
}
echo '<div id="unFeedback"></div>';
echo '</div>';

// Password field
echo '<div class="form-group">';
echo '<label class="control-label">Password:</label>'; 
echo '<input name="password" type="password" class="form-control" value="' . htmlspecialchars($password) . '">';
if (!empty($passwordError)) {
    echo '<div class="text-danger">' . $passwordError . '</div>';
}
echo '<div id="pwFeedback"></div>';
echo '</div>';

// Submit button
echo '<button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>'; 
echo '</form>';
echo '</div>';
echo '</div>';
echo '</section>';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($username)) {
        $usernameError = "Username cannot be empty.";
    }
    if (empty($password)) {
        $passwordError = "Password cannot be empty.";
    }

    // If no errors, proceed with database operations
    if (empty($usernameError) && empty($passwordError)) {
        include("functions.php");
        $dblink = db_connect('contact_data');
        $salt = "CS4413fa24";
        $hash = hash('sha256', $username . $password . $salt);
        $sql = "Select `auto_id` from `accounts` where hash='$hash'";
        $result = $dblink->query($sql) or
            die("<h2> Something went wrong with $sql<br>" . $dblink->error . "</h2>");
        
        if ($result->num_rows > 0) { // Password matched
            $data = $result->fetch_array(MYSQLI_ASSOC);
            $SIDsalt = microtime(); // Randomized salt (time-based)
            $sid = hash('sha256', $hash . $SIDsalt);
            $sql = "Update `accounts` set `session_id`='$sid' where `auto_id`='{$data['auto_id']}'"; 
            $dblink->query($sql) or
                die("<h2> Something went wrong with $sql<br>" . $dblink->error . "</h2>");
            redirect("index.php?page=results&sid=$sid");
        } else {
            redirect("index.php?page=login&error=authError");
        }
    }
}
?>


