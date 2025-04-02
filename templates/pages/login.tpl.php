<section class="auth-container">
    <article class="auth-card">
        <h2 class="auth-title">Bejelentkezés</h2>
        <form action="/includes/belep.php" method="POST" class="auth-form">
            <div class="form-group">
                <label for="login-username" class="form-label">Felhasználónév</label>
                <input type="text" id="login-username" name="lname" class="form-input" 
                       placeholder="Add meg a felhasználóneved" required
                       pattern="[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9]{3,20}"
                       title="3-20 karakter, csak betűk és számok">
            </div>
            
            <div class="form-group">
                <label for="login-password" class="form-label">Jelszó</label>
                <input type="password" id="login-password" name="passwd" class="form-input" 
                       placeholder="Add meg a jelszavad" required
                       minlength="8">
            </div>
            
            <button type="submit" name="belepes" class="auth-button">Belépés</button>
        </form>
    </article>

    <article class="auth-card">
        <h2 class="auth-title">Regisztráció</h2>
        <p class="auth-subtitle">Még nincs fiókod? Regisztrálj most!</p>
        
        <form action="/includes/regisztral.php" method="POST" class="auth-form" id="registration-form">
            <div class="form-group">
                <label for="reg-lastname" class="form-label">Vezetéknév</label>
                <input type="text" id="reg-lastname" name="csaladinev" class="form-input"
                       placeholder="Pl.: Kovács" required
                       pattern="[A-ZÁÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]{2,}"
                       title="Minimum 3 karakter, nagybetűvel kezdődik">
                <span id="csaladinev-error" class="error-message"></span>
            </div>
            
            <div class="form-group">
                <label for="reg-firstname" class="form-label">Utónév</label>
                <input type="text" id="reg-firstname" name="utonev" class="form-input"
                       placeholder="Pl.: János" required
                       pattern="[A-ZÁÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]{2,}"
                       title="Minimum 3 karakter, nagybetűvel kezdődik">
                <span id="utonev-error" class="error-message"></span>
            </div>
            
            <div class="form-group">
                <label for="reg-username" class="form-label">Felhasználónév</label>
                <input type="text" id="reg-username" name="lname" class="form-input"
                       placeholder="Pl.: kovacsjanos" required
                       pattern="[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9]{3,20}"
                       title="3-20 karakter, csak betűk és számok">
                <span id="lname-error" class="error-message"></span>
            </div>
            
            <div class="form-group">
                <label for="reg-password" class="form-label">Jelszó</label>
                <input type="password" id="reg-password" name="passwd" class="form-input"
                       placeholder="Minimum 8 karakter" required
                       minlength="8">
                <span id="passwd-error" class="error-message"></span>
            </div>
            
            <button type="submit" name="regisztracio" class="auth-button">Regisztráció</button>
        </form>
    </article>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const registrationForm = document.getElementById('registration-form');
    
    // Modern validáció a regisztrációs formhoz
    registrationForm.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Vezetéknév validálás
        const lastName = document.getElementById('reg-lastname');
        if (!/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]{2,}$/.test(lastName.value)) {
            document.getElementById('csaladinev-error').textContent = 
                'A vezetéknév minimum 3 karakteres és nagybetűvel kezdődik!';
            isValid = false;
        } else {
            document.getElementById('csaladinev-error').textContent = '';
        }
        
        // Utónév validálás
        const firstName = document.getElementById('reg-firstname');
        if (!/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]{2,}$/.test(firstName.value)) {
            document.getElementById('utonev-error').textContent = 
                'Az utónév minimum 3 karakteres és nagybetűvel kezdődik!';
            isValid = false;
        } else {
            document.getElementById('utonev-error').textContent = '';
        }
        
        // Felhasználónév validálás
        const username = document.getElementById('reg-username');
        if (username.value.length < 3 || username.value.length > 20) {
            document.getElementById('lname-error').textContent = 
                'A felhasználónév 3-20 karakter hosszú legyen!';
            isValid = false;
        } else {
            document.getElementById('lname-error').textContent = '';
        }
        
        // Jelszó validálás
        const password = document.getElementById('reg-password');
        if (password.value.length < 8) {
            document.getElementById('passwd-error').textContent = 
                'A jelszó minimum 8 karakter hosszú legyen!';
            isValid = false;
        } else {
            document.getElementById('passwd-error').textContent = '';
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
    
    // Valós idejű visszajelzés
    registrationForm.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', function() {
            this.nextElementSibling.textContent = '';
        });
    });
});
</script>
