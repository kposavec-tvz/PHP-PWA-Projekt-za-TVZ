<!DOCTYPE html>
<html lang="hr">

<head>
	<title>Početna - KPosavec</title>
	<meta charset="UTF-8">
	<meta name="description" content="Webstranica.">
	<meta name="keywords" content="kposavec, pwa">
	<meta name="author" content="Krešimir Posavec">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
				<?php
				$severname='localhost';
                $username='root';
                $password='1234';
                $basename='pwa';
                $dbc = mysqli_connect($severname,$username,$password,$basename) or die("Connection failed!");
				?>

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

		<aside>
			Politika
		</aside>
		<main>
			<?php                
			$querry='SELECT * FROM clanci WHERE vrsta="politika" and arhiviran is null ORDER BY id DESC LIMIT 3';
            $result=mysqli_query($dbc,$querry);
           

			while($row=mysqli_fetch_array($result)){
			echo "<article>";
				echo '<img src="'.$row['slika'].'">';
				echo "<h4>".$row['kategorija']." ";
				//echo " ".$row['autor']." ".$row['reg_date']."</h4>";
				echo "<h1>".$row['naslov']."</h1>";
				echo "</br>".substr($row['sadrzaj'], 0,400);
				if(strlen($row['sadrzaj'])>399)echo"...";
				echo '<form action="article.php" method="GET"><button name="klik" type="submit" value="'.$row['id'].'">See more</button></form>';
			echo "</article>";
		}

			 ?>
		</main>

		<aside>
			Sport
		</aside>
		<main>
			<?php                
			$querry='SELECT * FROM clanci WHERE vrsta="sport" and arhiviran is null ORDER BY id DESC LIMIT 3';
            $result=mysqli_query($dbc,$querry);
           

			while($row=mysqli_fetch_array($result)){
			echo "<article>";
				echo '<img src="'.$row['slika'].'">';
				echo "<h4>".$row['kategorija']." ";
				//echo " ".$row['autor']." ".$row['reg_date']."</h4>";
				echo "<h1>".$row['naslov']."</h1>";
				echo "</br>".substr($row['sadrzaj'], 0,400);
				if(strlen($row['sadrzaj'])>399)echo"...";
				echo '<form action="article.php" method="GET"><button name="klik" type="submit" value="'.$row['id'].'">See more</button></form>';

			echo "</article>";
		}

			 ?>
		</main>

 	&nbsp;

	</div>

			<footer>
			<p><a href="mailto:kposavec@tvz.hr">Krešimir Posavec</a>2018/2019</p>
			</footer>

</body>

<?php
mysqli_close($dbc);
?>

</html>
