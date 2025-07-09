<script src="assets/js/jquery-3.5.1.js"></script>
<?php
if (isset($_GET['sid'])) {
    include("functions.php"); 
	$dblink=db_connect("contact_data");
    $sid = $_GET['sid'];
    $sql = "Select `auto_id` from `accounts` where `session_id`='$sid'";
    $result = $dblink->query($sql) or
        die("<h2> Something went wrong with $sql<br>" . $dblink->error . "</h2>");
    
    if ($result->num_rows <= 0) { // No valid SID was found
        redirect("index.php?page=login&error=invalidSID");
    }
    
    echo '<section id="home">';
    echo '<div class="row">';
    echo '<div class="container">';
    echo '<h2>Database Entries</h2>';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Auto Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Username</th><th>Password</th><th>Comments</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody id="results">';
    echo '</tbody>';
    echo '</table>'; 
    echo '</div>';
    echo '</div>';
    echo '</section>';
} else {
    redirect("index.php?page=login&error=invalidSID");
}
?>
<script>
    function refresh_data() {
        $.ajax({
            type: 'post',
            url: 'https://ec2-3-137-205-41.us-east-2.compute.amazonaws.com/HW20/query_contacts.php',
            success: function(data) {
                $('#results').html(data);
            }
        });
    }
    setInterval(function() { refresh_data(); }, 500); // Call refresh_data every 500ms
</script>
