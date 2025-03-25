<?php
    try {
        // Kapcsolódás
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
	if(mysqli_connect_errno()){
 				echo mysqli_connect_error();
		}
	$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
	$result = $dbh->query("SELECT * FROM users", MYSQLI_USE_RESULT);
	$sqlSelect = "select id, csaladinev, utonev from users where lname = zoli and passwd = sha512(X94T7Duxn6RFy3CY2ZqjQP)";
	$sth = $dbh->query($sqlSelect);
        //$sth->execute(array(':bejelentkezes' => $_POST['lname'], ':passwd' => $_POST['passwd']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $_SESSION['csn'] = $row['csaladinev']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['lname'];

	}
	echo "";
        $result->close();
        echo $_SESSION['csn'] = $row['csaladinev']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['lname'];
}
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
	echo "Nem sikerul";
    }      

?>
