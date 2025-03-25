<?php
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=webp1db', 'webp1db', 'J3grvN7YjfVtBGwD2RxzdS',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Felhsználó keresése
        $sqlSelect = "select id, csaladinev, utonev from users where lname = zoli and passwd = sha512(X94T7Duxn6RFy3CY2ZqjQP)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['lname'], ':passwd' => $_POST['passwd']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $_SESSION['csn'] = $row['csaladinev']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['lname'];

	}
	echo "Sikerült";
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
	echo "Nem sikerul";
    }      

?>
