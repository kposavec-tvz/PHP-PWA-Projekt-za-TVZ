<?php
// start a session
session_start();
// manipulate session variables
?>

<!DOCTYPE html>
<html>

<head>
    <title>KPosavec</title>
    <meta charset="UTF-8">
    <meta name="description" content="Webstranica.">
    <meta name="keywords" content="kposavec, pwa">
    <meta name="author" content="Krešimir Posavec">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

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



<!-- NEUSPJEŠNA PRIJAVA, MOLIM VAS VRATITE SE NA <a href="admin.php">Administrator</a> -->
</BR>
    <aside>
            LOGIN PAGE:
        </aside>
<main id="clanak">
    <article>   &nbsp;

    </article>
     <article>
 
<?php
            $severname='localhost';
                $username='root';
                $password='1234';
                $basename='pwa';
                $dbc = mysqli_connect($severname,$username,$password,$basename) or die("Connection failed!");


if(isset($_POST)) {
$password=$_POST["lozinkaKorisnika"];
$usernameHtml=$_POST["imeKorisnika"];
if($usernameHtml=="")header("Location: registracija.html");


            $sql = "SELECT username, password, administrator FROM users
            WHERE username = ?";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $usernameHtml);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            }
            mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika,$levelKorisnika);
            mysqli_stmt_fetch($stmt);


//echo $query ."</br>";
     //$result = mysqli_query($dbc, $query) or die('Error inserting');
     $row = mysqli_stmt_fetch($stmt);
                //mysqli_stmt_fetch($row);

        $returnPassword= $row["password"];
    
         if (password_verify($_POST['lozinkaKorisnika'], $lozinkaKorisnika) &&
                mysqli_stmt_num_rows($stmt) > 0) {
                $_SESSION['logged_in_user_name'] = $usernameHtml;
                $uspjesnaPrijava = true;
            echo "<h1>Uspjeh</h1>";
            echo "</br>Username sa kojim ste prijavljeni je: <h3>". $usernameHtml.'</h3>';
                // Provjera da li je admin
                if($levelKorisnika == "DA") {
                    $admin = true;
                    echo "</br>Vaša razina prava je ADMINISTRATOR </br>";
                echo '</br> Možete ponovno otići na <a href="admin.php">Administrator</a><p>!</p>';
                    }
                else {
                    $admin = false;
                    echo"</br>Nažalost nemate administratorska prava </br>";
                    }
                //postavljanje session varijabli
                
                
                } else  {
                         $uspjesnaPrijava = false;
                         echo "<h2>Ne postoji korisnik sa tom kombinacijom lozinke i korisničkog imena!</h2>";
                     }
            }

          //  echo $_SESSION['logged_in_user_name'];
    ?>


   </article>

       <article>    &nbsp;

    </article>
</main>

            <footer>
            <p><a href="mailto:kposavec@tvz.hr">Krešimir Posavec</a>2018/2019</p>
            </footer>
            
</body>
</html>
<?php
mysqli_close($dbc);
?>