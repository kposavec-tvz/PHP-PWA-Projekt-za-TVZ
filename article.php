<!DOCTYPE html>
<html lang="hr">

<head>
	<title>Članak - KPosavec</title>
	<meta charset="UTF-8">
	<meta name="description" content="Webstranica.">
	<meta name="keywords" content="kposavec, pwa">
	<meta name="author" content="Krešimir Posavec">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="clanak">
				<?php
				$severname='localhost';
                $username='root';
                $password='1234';
                $basename='pwa';
                
               	if (empty($_GET) || $_GET['klik']==0) {
								echo "<script type='text/javascript'>alert('NEMA ODABRANOG ČLANKA, MOLIM VRATITI SE NA POČETNU');</script>";    
								sleep (3);
								echo '<h1>Povratak na početnu</h1>';
							//	header("Location: index.php");
							//	die('<h1>Povratak na početnu</h1>');  
								die(header("Location: index.php")); 

			  } else $klik=$_GET['klik'];
			  $dbc = mysqli_connect($severname,$username,$password,$basename) or die("Connection failed!");
			
               
       			// echo $klik;
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

		<?php                
			$querry='SELECT * FROM clanci WHERE id="'.$klik.'"';
            $result=mysqli_query($dbc,$querry);
            $row = mysqli_fetch_assoc($result);

            ?>

		<div class="slika">
			<?php
			echo "<h1>".$row['naslov']."</h1>";
			$pagetitle=$row['naslov'];
				
			echo '<img src="'.$row['slika'].'">';
			echo " <h4>Kategorija: ".$row['kategorija'].", ";
				echo " Autor: ".$row['autor']."  ".$row['reg_date']."</h4>";
			?>
		
		<section>
			<?php

				
				echo "</br>".$row['sadrzaj'];

				?>

		</section>
		
		</div>


</br> 
	</div>

			<footer>
			<p><a href="mailto:kposavec@tvz.hr">Krešimir Posavec</a>2018/2019</p>
			</footer>

</body>

<?php
mysqli_close($dbc);
?>

</html>
