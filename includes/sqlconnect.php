<?php
    try {
        // Kapcsolódás
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysqli = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
	$result = $mysqli->query("SELECT * FROM users", MYSQLI_USE_RESULT);
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
	echo "Nem sikerul";
    }      

?>
