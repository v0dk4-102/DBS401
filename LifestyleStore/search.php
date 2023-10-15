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
				</div>
			</div>
			<div class="container">
				<h1>Search</h1>
				<form method="get" action="search.php" class="form-inline mb-2">
					<div class="form-group">
						<input type="text" name="search" placeholder="Name" class="form-control mr-2">
					</div>
					<button type="submit" class="btn btn-primary">Search</button>
				</form>
				<br>
				<br>
				<br> <?php
	    require 'connection.php';
	    session_start();
    
	// Xử lý tìm kiếm
	if (isset($_GET['search'])) {
	    $search = $_GET['search'];
	    if (preg_match("#\b(?:sys|procedure|xml|concat|group|db|where|like|limit|in|0x|extract|by|load|as|binary|join|using|pow|exp|info|insert|to|del|flag|pass|sec|hex|users|regex|password|if|case|and|or|ascii|sleep)\b#",strtolower($search))) {
	    	echo '<strong style="font-size: 50px;">Dummmmmmmmmmmm...</strong>';
	    	echo '<br>';
		echo "We had filtered sys|procedure|xml|concat|group|db|where|like|limit|in|0x|extract|by|load|as|binary|join|using|pow|exp|info|insert|to|del|flag|pass|sec|hex|users|regex|password|if|case|and|or|ascii|sleep";

	    } else {
		    $query = "SELECT name, price FROM items WHERE name LIKE '%$search%'";
		    $result = mysqli_query($con,$query) or die(mysqli_error($con));

		    if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$second = $row["name"];
				$third = $row["price"];
				echo "<pre>Name: {$second}<br />Price: {$third}</pre>";
			}
		    } else {
			echo "Not found!!!!";
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
