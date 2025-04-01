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

            echo "Regisztráció sikeres!";
            // header("Location: /login"); // Átirányítás, ha kell
            // exit();
        } else {
            echo "A felhasználónév már foglalt!";
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
