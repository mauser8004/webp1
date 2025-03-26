<?php
if(isset($_POST['lname']) && isset($_POST['passwd'])) {
    try {
        // Kapcsolódás
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
	if(mysqli_connect_errno()){
 				echo mysqli_connect_error();
		}
	$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
	        // Felhsználó keresése
	$passwd = hash('sha512', $_POST['passwd']);
	$username = $_POST['lname'];
        $sqlSelect = "select  csaladinev, utonev from users where lname = $username and passwd = '$passwd';";
        $sth = $dbh->query($sqlSelect);
        //$sth->execute(array(':bejelentkezes' => 'zoli', ':passwd' => 'X94T7Duxn6RFy3CY2ZqjQP'));
        $row = $sth->fetch_assoc();
        if($row) {
            $_SESSION['csn'] = $row['csaladinev']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['lname'];

	}
	
    header("Location: /");
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    
    header("Location: /");
    }
}
else {
    header("Location: /");
}
?>
