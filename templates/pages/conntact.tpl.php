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
  return $data;
header("Location: /conntact");
}

?>
<div>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <input type="submit" name="submit" value="Küldés">  
</form>


</div>

<?php
echo "<h2>Your Input:</h2>";
echo "<br>";
echo $comment;
echo "<br>";
?>
