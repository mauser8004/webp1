<div>

<form method="POST" action="/includes/uzenetkuldes.php">
 <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <input type="submit" name="submit" value="Küldés">  
</form>
<script>
document.querySelector('form').addEventListener('submit', function(e) {
  const value = document.querySelector('textarea[name="comment"]').value.trim();
  if (value.length === 0) {
    e.preventDefault(); // megakadályozza az űrlap elküldését
    alert('Az üzenet nem maradhat üres');
    document.querySelector('textarea[name="comment"]').focus();
  }
  if (value.length > 50) {
    e.preventDefault(); // megakadályozza az űrlap elküldését
    alert('Az üzenet maximum 50 karakter hosszú lehet');
    document.querySelector('textarea[name="comment"]').focus();
  }
});
</script>

</div>

