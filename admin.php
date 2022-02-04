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


				$severname='localhost';
                $username='root';
                $password='1234';
                $basename='pwa';
                
               	$dbc = mysqli_connect($severname,$username,$password,$basename) or die("Connection failed!");
               	$querry='SELECT * FROM users WHERE username="'.$_SESSION['logged_in_user_name'].'";';


               		$result=mysqli_query($dbc,$querry);
           

				while($row=mysqli_fetch_array($result)){
				if($row['administrator']!="DA")header("Location: nemateprava.php");
			
				}


               mysqli_close($dbc);


?>
<!DOCTYPE html>
<html lang="hr">

<head>
	<title>ADMIN PAGE  - KPosavec</title>
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
			
			<form method="POST" action="upis.php">
				Naslov: <input name="naslov"></br>
				Vrsta: <select name="vrsta">
						<option value="sport">SPORT
						<option value="politika">POLITIKA
						</select></br>
				Kategorija: <input name="kategorija"></br>
				Autor: <?php
			echo $_SESSION['logged_in_user_name'];

			?>
			 <input name="autor"></br>
				Sadržaj: </br>.<textarea name="sadrzaj" rows="5" cols="60"></textarea></br>
				Link na sliku: <input type="url" name="slika"></br>
				<input type="submit">

			</form>

			

			<section>
			</div>

			
	</div>

			<footer>
			<p><a href="mailto:kposavec@tvz.hr">Krešimir Posavec</a>2018/2019</p>
			</footer>

</body>

</html>
