<?php
if (isset($_POST['csaladinev'], $_POST['utonev'], $_POST['lname'], $_POST['passwd'])) {
    try {
        // Kapcsolódás az adatbázishoz
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
        $dbh->set_charset("utf8");

        // Adatok előkészítése
        $csaladinev = $_POST['csaladinev'];
        $utonev = $_POST['utonev'];
        $username = $_POST['lname'];
        $passwd = hash('sha512', $_POST['passwd']);

        // Ellenőrizzük, hogy létezik-e már a felhasználónév
        $checkQuery = $dbh->prepare("SELECT id FROM users WHERE lname = ?");
        $checkQuery->bind_param("s", $username);
        $checkQuery->execute();
        $checkQuery->store_result(); // Fontos, hogy lekérjük az eredményt

        if ($checkQuery->num_rows === 0) {
            // Ha nem létezik, akkor regisztráljuk
            $insertQuery = $dbh->prepare("INSERT INTO users (csaladinev, utonev, lname, passwd) VALUES (?, ?, ?, ?)");
            $insertQuery->bind_param("ssss", $csaladinev, $utonev, $username, $passwd);
            $insertQuery->execute();

            $uzenet = "Regisztráció sikeres!";

	    $ujra = false;
            // header("Location: /login"); // Átirányítás, ha kell
            // exit();
        } else {
            $uzenet ="A felhasználónév már foglalt!";
	    $ujra = true;
        }

        $checkQuery->close();
    } catch (mysqli_sql_exception $e) {
        echo "Hiba történt: " . $e->getMessage();
    }
} else {
    echo "Hiányzó adatok!";
    // header("Location: /"); // Átirányítás, ha kell
    // exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Regisztráció</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($uzenet)) { ?>
            <h1><?= $uzenet ?></h1>
            <?php if($ujra) { ?>
                <a href="/login">Próbálja újra!</a>
	    <?php
		}
		else { ?>
	        
		
                <a href="/login">Kérjük jelentkezzen be!</a>

        <?php } } ?>
    </body>
</html>
