<?php
session_start();


if (isset($_SESSION['logged_in_user_name']))
{
    //Do stuff
} else{
	echo $_SESSION['logged_in_user_name'];
	header("Location: registracija.html");
		die();
}





?>
<!DOCTYPE html>
<html lang="hr">

<head>
	<title>NEDOVOLOLJNA PRAVA - KPosavec</title>
	<meta charset="UTF-8">
	<meta name="description" content="Webstranica.">
	<meta name="keywords" content="kposavec, pwa">
	<meta name="author" content="Krešimir Posavec">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<div class="okvir">

		<header>

			<nav>
				<a href="index.php">Home</a>
				<a href="sport.php">Sport</a>
				<a href="politika.php">Politika</a>
				<a href="admin.php">Administrator</a>
			</nav>
				<a href="index.php">
				<div class="logo">
					<h1>News</h1>
				</div>
			</a>
		</header>
		<div class="slika">

			<section>	
				<a href="logout.php"><h4>Logout</h4></a>
			
				NAŽALOST NEMATE ADMINISTRATORSKA PRAVA.
			</BR>AKO SMATRATE DA JE OVO POGREŠKA MOLIM VAS DA SE OBRATITE NA ADMINISTRATORU KLIKOM NA <a href="mailto:kposavec@tvz.hr">Krešimir Posavec</a></BR>
			<a href="logout.php"><h4>Logout</h4></a>
			

			<section>
			</div>

			
	</div>

			<footer>
			<p><a href="mailto:kposavec@tvz.hr">Krešimir Posavec</a>2018/2019</p>
			</footer>

</body>

</html>
