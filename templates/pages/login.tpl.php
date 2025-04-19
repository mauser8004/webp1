<?php
session_start();
?>
<div class="auth-container">
<?php if (isset($_SESSION['hiba'])){  ?> <p style = "color: red; font-family: verdana;"> Hibás felhasználóinév vagy Jelszó!</p><?php session_unset(); } ?>
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
                
                <input type="text" name="loginname" placeholder="Felhasználói név : min 3 karakter" required>
                <span id="lname-error" class="error"></span>
                
                <input type="password" name="password" placeholder="Jelszó min: 8 karakter" required>
                <span id="passwd-error" class="error"></span>
                
                <input type="submit" name="regisztracio" value="Regisztráció">
            </fieldset>
        </form>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Vezetéknév validálása
  document.querySelector('input[name="csaladinev"]').addEventListener('blur', function() {
    const value = this.value.trim();
    if (value.length < 3 || !/^[A-ZÁÉÍÓÖŐÚÜŰ]/.test(value)) {
      alert('A vezetéknév minimum 3 karakteres és nagybetűvel kezdődik!');
      this.focus();
    }
  });

  // Utónév validálása
  document.querySelector('input[name="utonev"]').addEventListener('blur', function() {
    const value = this.value.trim();
    if (value.length < 3 || !/^[A-ZÁÉÍÓÖŐÚÜŰ]/.test(value)) {
      alert('Az utónév minimum 3 karakteres és nagybetűvel kezdődik!');
      this.focus();
    }
  });

  // Felhasználónév validálása
  document.querySelector('input[name="loginname"]').addEventListener('blur', function() {
    const value = this.value.trim();
    if (this.value.trim() === "" || value.lenght < 3) {
      alert('A felhasználónév megadása kötelező! Min 3 karakter!');
      this.focus();
    }
  });

  // Jelszó validálása - JAVÍTOTT változat
  document.querySelector('input[name="password"]').addEventListener('blur', function() {
    const value = this.value.trim();
    if (value.length < 8 || value.length > 20) {
      alert('A jelszó 8 és 20 karakter között kell legyen!');
      this.focus();
    }
   });
});
</script>
