<?php
if(isset($_POST['lname']) && isset($_POST['passwd'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=webp1db', 'webp1db', 'J3grvN7YjfVtBGwD2RxzdS',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Felhsználó keresése
        $sqlSelect = "select id, csaladinev, utonev from users where lnmae = :bejelentkezes and passwd = sha512(:passwd)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['lname'], ':passwd' => $_POST['passwd']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $_SESSION['csn'] = $row['csaladinev']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['lname'];
        }
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }      
}
else {
    header("Location: .");
}
?>

<?php
	include('./includes/config.inc.php');
	$oldal = $_SERVER['QUERY_STRING'];
	//echo $_SERVER['QUERY_STRING'];
	if ($oldal!="") {
		if (isset($oldalak[$oldal]) && file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {
			$keres = $oldalak[$oldal];
		}
		else { 
			$keres = $hiba_oldal;
			header("HTTP/1.0 404 Not Found");
		}
	}
	else $keres = $oldalak['/'];
	include('./templates/index.tpl.php'); 
?>
