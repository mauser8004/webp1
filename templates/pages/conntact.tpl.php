<div>

<form method="POST" action="/includes/uzenetkuldes.php">
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
