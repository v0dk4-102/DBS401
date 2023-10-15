<?php
    session_start();
    require 'check_if_added.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="img/lifestyleStore.png" />
		<title>Lifestyle Store</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
		<!-- jquery library -->
		<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
		<!-- Latest compiled and minified javascript -->
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<!-- External CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
	<body>
		<div> <?php
                require 'header.php';
            ?> <div class="container">
				<div class="jumbotron">
					<h1>Welcome to our LifeStyle Store!</h1>
					<p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
					<h2>Warning: The website has just been attacked by hackers by uploading a shell file that fakes customer feedback. Please do not open strange files!!!</h2>
				</div>
			</div>
			<div class="container">
				<form method="post" action="feedback.php" class="form-inline mb-2">
					<div class="form-group">
						<input type="text" name="feedback" placeholder="feedback/file.txt" class="form-control mr-2">
					</div>
					<button type="submit" class="btn btn-primary">View</button>
				</form>
				<?php
				
				if (isset($_POST['feedback'])) {
					$name = $_POST['feedback'];
					if (stripos($name, "feedback/") !== false && stripos($name, "../") == false) {
						
						$path = $name;
						if(isset($path)) {
							echo "<br><br><br>";
							include("$path");
							echo "<br><br><br>";
						} else {
							include("feedback.php");			
						}
					} else {
						echo "<h3>Error Syntax</h3>";
					}
					
    				}
    				echo "</br>" . "List of feedback" . "</br>";
    				$directory = 'feedback';
				if (is_dir($directory)) {
	    				$files = scandir($directory);
	    				shuffle($files);
	    				foreach ($files as $file) {
	       					if ($file != '.' && $file != '..') {
		    					echo "<pre>$file</pre>";
						}
	   				}
				}
    				?>
			</div>			
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<footer class="footer">
				<div class="container">
					<center>
						<p>Copyright &copy Lifestyle Store. All Rights Reserved. | Contact Us: +91 90000 00000</p>
						<p>This website is developed by Sajal Agrawal</p>
					</center>
				</div>
			</footer>
		</div>
	</body>
</html>
