<?php
$comment =  "";

if (empty($_POST["comment"])) {
    $comment = "";
	}
else {
    $comment = test_input($_POST["comment"]);
  }
function test_input($data) {
      
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  try {
        // Kapcsolódás az adatbázishoz  3 modszer
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
	$dbh->set_charset("utf8");
	session_start();
        $sender = isset($_SESSION['login']) ? $_SESSION['login'] : "Vendég";	

        $insertQuery = $dbh->prepare("INSERT INTO mess (date, sender, mess) VALUES ( now(), ?, ?)");
        $insertQuery->bind_param("ss", $sender, $data);
        $insertQuery->execute();

  header("Location: {$_SERVER['HTTP_REFERER']}");
  exit;
	}
   
     catch (mysqli_sql_exception $e) {


        echo "Hiba történt: " . $e->getMessage();

      }
}


//  header("Location: {$_SERVER['HTTP_REFERER']}");
//  exit;


?>

