<div class="auth-container">
    <form action="/includes/belep.php" method="POST" class="auth-form">
        <fieldset>
            <legend>Bejelentkezés</legend>
            <input type="text" name="lname" placeholder="Felhasználó" required>
            <input type="password" name="passwd" placeholder="Jelszó" required>
            <input type="submit" name="belepes" value="Belépés">
        </fieldset>
    </form>

    <div class="auth-form">
        <h3>Regisztrálja magát, ha még nem felhasználó!</h3>
        <form action="/includes/regisztral.php" method="POST">
            <fieldset>
                <legend>Regisztráció</legend>
                <input type="text" name="csaladinev" placeholder="Vezetéknév" required>
                <span id="csaladinev-error" class="error"></span>
                
                <input type="text" name="utonev" placeholder="Utónév" required>
                <span id="utonev-error" class="error"></span>
                
                <input type="text" name="lname" placeholder="Felhasználói név" required>
                <span id="lname-error" class="error"></span>
                
                <input type="password" name="passwd" placeholder="Jelszó" required>
                <span id="passwd-error" class="error"></span>
                
                <input type="submit" name="regisztracio" value="Regisztráció">
            </fieldset>
        </form>
    </div>
</div>

<script>
/* A JS validáció VÁLTOZATLANUL MARAD! */
document.addEventListener('DOMContentLoaded', function() {
    // ... (eredeti JS kód változatlan) ...
});
</script>
