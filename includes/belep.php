<?php
session_start();
if (isset($_POST['lname'], $_POST['passwd'])) {
    try {
        // Database connection
        /*mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");*/

	$dbh = new PDO('mysql:host=localhost;dbname=webp1db', 'webp1db', 'J3grvN7YjfVtBGwD2RxzdS',
	array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
	$sqlSelect = "select csaladinev, utonev from users where lname = :bejelentkezes and passwd = :jelszo ";

        $passwd = hash('sha512', $_POST['passwd']);
	$sth = $dbh->prepare($sqlSelect);
	// Az űrlapnál POST módszerrel küldjük el az adatokat.
	$sth->execute(array(':bejelentkezes' => $_POST['lname'], ':jelszo' => $passwd ));
	$row = $sth->fetch(PDO::FETCH_ASSOC);



        /*if (mysqli_connect_errno()) {
            throw new mysqli_sql_exception(mysqli_connect_error());
        }
        
	$dbh->set_charset("utf8");*/
        
        // User authentication with prepared statement
        /*$username = $dbh->real_escape_string($_POST['lname']); // Additional safety
        $passwd = hash('sha512', $_POST['passwd']);
        
        $stmt = $dbh->prepare("SELECT csaladinev, utonev FROM users WHERE lname = ? AND passwd = ?");
        $stmt->bind_param("ss", $username, $passwd);
        $stmt->execute();
        $result = $stmt->get_result();
	$row = $result->fetch_assoc();*/

        
        if ($row) {
            session_start();
            $_SESSION['csn'] = $row['csaladinev'];
            $_SESSION['un'] = $row['utonev'];
            $_SESSION['login'] = $username;
            
            // Regenerate session ID for security
            session_regenerate_id(true);
        }
	else {
		
            session_start();
        $_SESSION['hiba'] = '1';
        header("Location: /login");
        exit();
	    } 
        
        
        //$stmt->close();
       // $dbh->close();
        
        header("Location: /");
        exit();
    } catch (mysqli_sql_exception $e) {
        // Log the error (in production you'd log to a file)
        error_log("Login error: " . $e->getMessage());
        
        header("Location: /");
        exit();
    }
} else {
    header("Location: /");
    exit();
}
?>
