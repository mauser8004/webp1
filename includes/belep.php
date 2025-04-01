<?php
if (isset($_POST['lname'], $_POST['passwd'])) {
    try {
        // Database connection
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
        
        if (mysqli_connect_errno()) {
            throw new mysqli_sql_exception(mysqli_connect_error());
        }
        
        $dbh->set_charset("utf8");
        
        // User authentication with prepared statement
        $username = $dbh->real_escape_string($_POST['lname']); // Additional safety
        $passwd = hash('sha512', $_POST['passwd']);
        
        $stmt = $dbh->prepare("SELECT csaladinev, utonev FROM users WHERE lname = ? AND passwd = ?");
        $stmt->bind_param("ss", $username, $passwd);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row) {
            //session_start();
	    session_start([
		    'cookie_lifetime' => 86400,
    		    'read_and_close'  => true,
		]);
            $_SESSION['csn'] = $row['csaladinev'];
            $_SESSION['un'] = $row['utonev'];
            $_SESSION['login'] = $username;
            
            // Regenerate session ID for security
            session_regenerate_id(true);
        }
        
        $stmt->close();
        $dbh->close();
        
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
