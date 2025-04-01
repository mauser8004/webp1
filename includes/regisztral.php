<?php
if(isset($_POST['csaladinev']) && isset($_POST['utonev']) && isset($_POST['lname']) && isset($_POST['passwd'])) {
    try {
        // Kapcsolódás
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
        
        $dbh->set_charset("utf8");

        // Felhasználó keresése
        $csaladinev = $_POST['csaladinev'];
        $utonev = $_POST['utonev'];
        $passwd = hash('sha512', $_POST['passwd']);
        $username = $_POST['lname'];
        
        // Check if username exists using prepared statement
        $stmt = $dbh->prepare("SELECT id FROM users WHERE lname = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 0) {
            // Insert new user
            $insert = $dbh->prepare("INSERT INTO users (csaladinev, utonev, lname, passwd) VALUES (?, ?, ?, ?)");
            $insert->bind_param("ssss", $csaladinev, $utonev, $username, $passwd);
            $insert->execute();
            
            echo "Regisztráció sikeres";
            // header("Location: /login");
            // exit();
        } else {
            echo "Létezik a felhasználónév";
        }
        
        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        $errormessage = "Hiba: ".$e->getMessage();
        echo $errormessage;
    }
} else {
    echo "NINCS minden adat megadva";
    header("Location: /");
    exit();
}
?>
