<div class="contact-form">
    <form method="POST" action="/includes/uzenetkuldes.php">
        <textarea name="comment" rows="5" placeholder="Max 50 karakter"><?= htmlspecialchars($comment ?? '') ?></textarea>
        <button type="submit" name="submit">Küldés</button>
    </form>
</div>

<script>
// JS kód változatlanul marad
document.querySelector('form').addEventListener('submit', function(e) {
    const value = document.querySelector('textarea[name="comment"]').value.trim();
    if (value.length === 0) {
        e.preventDefault();
        alert('Az üzenet nem maradhat üres');
    } else if (value.length > 50) {
        e.preventDefault();
        alert('Az üzenet maximum 50 karakter hosszú lehet');
    }
});
</script>
