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
  header("Location: {$_SERVER['HTTP_REFERER']}");
  exit;
}

?>

