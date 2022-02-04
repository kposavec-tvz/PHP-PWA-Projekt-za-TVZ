<!DOCTYPE html>
<html lang="hr">

<head>
	<title>KPosavec</title>
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
			


		<?php
				$severname='localhost';
                $username='root';
                $password='1234';
                $basename='pwa';
                
               	$dbc = mysqli_connect($severname,$username,$password,$basename) or die("Connection failed!");
				
				$naslov=$_POST['naslov'];
				$vrsta=$_POST['vrsta'];
				$kategorija=$_POST['kategorija'];
				$autor=$_POST['autor'];
				$sadrzaj=$_POST['sadrzaj'];
				$slika=$_POST['slika'];
				$timestamp = date("Y-m-d H:i:s");
               
       			// echo $klik;

				/*
       			$querry='INSERT INTO clanci (naslov,vrsta,kategorija,autor,sadrzaj,slika,reg_date)
				VALUES ("'.$naslov.'","'.$vrsta.'","'.$kategorija.'","'.$autor.'","'.$sadrzaj.'","'.$slika.'","'.$timestamp.'");';
            	$result=mysqli_query($dbc,$querry);
            	echo $querry;
				if ( $result ) 
				{ 
				  // results found 
				  //echo mysqli_num_rows($result);
					echo "<div>.</br></div><h4>uspješan upis</h4>";
				}
				else
				{ 
				  // 
				die("nije uspio upis");
				}  
				*/


				$sql='INSERT INTO clanci (naslov,vrsta,kategorija,autor,sadrzaj,slika,reg_date)
				VALUES (?,?,?,?,?,?,?);';
				/* Inicijalizira statement objekt nad konekcijom */
				$stmt=mysqli_stmt_init($dbc);
				/* Povezuje parametre statement objekt s upitom */
				if (mysqli_stmt_prepare($stmt, $sql)){
				/* Povezuje parametre i njihove tipove s statement objektom */
				mysqli_stmt_bind_param($stmt,'sssssss',$naslov,$vrsta,$kategorija,$autor,$sadrzaj,$slika,$timestamp);
				/* Izvršava pripremljeni upit */
				mysqli_stmt_execute($stmt);
				}


				$querry1='SELECT * FROM clanci  ORDER BY id DESC LIMIT 1';
				$result1=mysqli_query($dbc,$querry1);
				while($row=mysqli_fetch_array($result1)){
					echo $row['id'].'</br><a href="article.php?klik='.$row['id'].'">KLIKNI ZA OTICI NA CLANAK</a>';
				}

			  	mysqli_close($dbc);
				?>

			</form>

			<section>
			</div>

			
	</div>

			<footer>
			<p><a href="mailto:kposavec@tvz.hr">Krešimir Posavec</a>2018/2019</p>
			</footer>

</body>

</html>
