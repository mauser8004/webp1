<div class="card">
    <h2>Kapcsolat</h2>
    <form method="POST" action="/includes/uzenetkuldes.php">
        <div class="form-group">
            <textarea class="form-control" name="comment" rows="5" placeholder="Max 50 karakter"><?= htmlspecialchars($comment ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn">Küldés</button>
    </form>
</div>

<script>
document.querySelector('form').addEventListener('submit', function(e) {
    const value = document.querySelector('textarea[name="comment"]').value.trim();
    if (value.length === 0) {
        e.preventDefault();
        alert('Az üzenet nem maradhat üres');
        document.querySelector('textarea[name="comment"]').focus();
    } else if (value.length > 50) {
        e.preventDefault();
        alert('Az üzenet maximum 50 karakter hosszú lehet');
        document.querySelector('textarea[name="comment"]').focus();
    }
});
</script>
