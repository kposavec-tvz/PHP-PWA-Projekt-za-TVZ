<!DOCTYPE html>
<html>

<?php

$punoImeKorisnika = $_POST['punoImeKorisnika'];
$imeKorisnika = $_POST['imeKorisnika'];
$lozinkaKorisnika=$_POST['lozinkaKorisnika'];
//$lozinkaKorisnika = md5(htmlspecialchars($_POST['lozinkaKorisnika']));
$hashed_password = password_hash($lozinkaKorisnika, CRYPT_BLOWFISH);

// Registracija korisnika u bazi pazeći na SQL injection
				$severname='localhost';
                $usernamesql='root';
                $passwordsql='1234';
                $basename='pwa';
                $dbc = mysqli_connect($severname,$usernamesql,$passwordsql,$basename) or die("Connection failed!");

                $sql = "SELECT username FROM users WHERE username = ?";
				$stmt = mysqli_stmt_init($dbc);
				if (mysqli_stmt_prepare($stmt, $sql)) {
				mysqli_stmt_bind_param($stmt, 's', $imeKorisnika);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				}
				if(mysqli_stmt_num_rows($stmt) > 0){
					die('Korisničko ime već postoji!');
				}	

				$sql = "INSERT INTO users (username, password, fullname)
		VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
	mysqli_stmt_bind_param($stmt, 'sss', $imeKorisnika, $hashed_password, $punoImeKorisnika);
    mysqli_stmt_execute($stmt);
	$registriranKorisnik = true;
	//IF ($registriranKorisnik==false)die('Došlo je do pogreške');
}
mysqli_close($dbc);
?>
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
    <aside>
            REGISTRACIJA KORISNIKA:
        </aside>
		<main>
			<?php
				if($registriranKorisnik == true) {
					echo '<p>Korisnik je uspješno registriran! Molim da se prijavite na <a href="admin.php">Administrator</a></p>';
				} else {
					echo '<p>Korisnik nije uspješno registriran!</p>';
				}
			?>
		</main>
			<footer>
			<p><a href="mailto:kposavec@tvz.hr">Krešimir Posavec</a>2018/2019</p>
			</footer>

	</div>

</body>

</html>
