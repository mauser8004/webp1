<?php
    try {
        // Kapcsolódás
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
	if(mysqli_connect_errno()){
 				echo mysqli_connect_error();
		}
	$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
	        // Felhsználó keresése
        $sqlSelect = "select  csaladinev, utonev from users where lname = :bejelentkezes and passwd = 'sha512(:passwd)'";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => 'zoli', ':passwd' => 'X94T7Duxn6RFy3CY2ZqjQP'));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $_SESSION['csn'] = $row['csaladinev']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['lname'];

	}
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
	echo "Nem sikerul";
    }      

?>
