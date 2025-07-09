<?php
$page = $_GET['page'] ?? "home"; // Default to "home" if no page is set

echo '<div class="navbar-collapse collapse in" id="bs-example-navbar-collapse-6" aria-expanded="true">';
echo '<ul class="nav navbar-nav">';

// Define navigation links
echo '<li ' . ($page === "home" ? 'class="active"' : '') . '><a href="index.php">Home</a></li>';
echo '<li ' . ($page === "hobbies" ? 'class="active"' : '') . '><a href="index.php?page=hobbies">Hobbies</a></li>';
echo '<li ' . ($page === "schoolinfo" ? 'class="active"' : '') . '><a href="index.php?page=schoolinfo">School Info</a></li>';
echo '<li ' . ($page === "dreamjobs" ? 'class="active"' : '') . '><a href="index.php?page=dreamjobs">Dream Jobs</a></li>';
echo '<li ' . ($page === "contact" ? 'class="active"' : '') . '><a href="index.php?page=contact">Contact</a></li>';
echo '<li ' . ($page === "login" ? 'class="active"' : '') . '><a href="index.php?page=login">Login</a></li>';
echo '</ul>';
echo '</div>';
?>
