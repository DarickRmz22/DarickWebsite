<!DOCTYPE html>
<html>
<head>
<title>Welcome to Darick's Website!</title>
<link href="assets/css/bootstrap.css" rel="stylesheet"/>
<link href="assets/css/bootstrap-theme.css" rel="stylesheet"/>
<link href="assets/css/styles.css" rel="stylesheet"/>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Welcome to Darick Ramirez's Website!</a>
        </div>

        <?php
		  
		  include("navigation.php");
		  ?>
		<!-- /.navbar-collapse -->
      </div>
    </nav>
	<?php
	//content body of my index php
	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
			switch($page){
				case "schoolinfo":
					include("schoolinfo.php");
					break;
				case "hobbies":
					include("hobbies.php");
					break;
				case "dreamjobs":
					include("dreamjobs.php");
					break;
				case "contact":
					include("contact.php");
					break;
				case "login":
					include("login.php");
					break;
					case "results":
					include("results.php");
					break;
				default:
					include("home.php");
					break;
		}
	}
	else
		include("home.php");
	
	?>

</body>
</html>
