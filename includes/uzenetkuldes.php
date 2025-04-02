<?php
$comment =  "";

if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
function test_input($data) {
      
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  try {
        // Kapcsolódás az adatbázishoz
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $dbh = new mysqli("localhost", "webp1db", "J3grvN7YjfVtBGwD2RxzdS", "webp1db");
	$dbh->set_charset("utf8");

	if(! isset($_SESSION['login']) {
	$sender = "Vendég";
	}
	
	else{
	$sender = $_SESSION['login'];
	}

        $insertQuery = $dbh->prepare("INSERT INTO users (date, sender, mess) VALUES (NOW(), ?, ?,);");
        $insertQuery->bind_param("ssss", $sender, $data);
        $insertQuery->execute();


	}



      
     catch (mysqli_sql_exception $e) {


        echo "Hiba történt: " . $e->getMessage();

      }
}


  header("Location: {$_SERVER['HTTP_REFERER']}");
  exit;
}

?>

