<?php if(isset($_POST['csaladinev']) && isset($_POST['utonev']) && isset($_POST['lname']) && isset($_POST['passwd']) ) {
	      echo "Redisztrácios sikeres, kérjük jelentkezzen be!";
	}
?>

    <form action = "/includes/belep.php" method = "POST">
      <fieldset>
        <legend>Bejelentkezés</legend>
        <br>
        <input type="text" name="lname" placeholder="Felhasználó" required><br><br>
        <input type="password" name="passwd" placeholder="Jelszó" required><br><br>
        <input type="submit" name="belepes" value="Belépés">
        <br>&nbsp;
      </fieldset>
    </form>
    <h3>Regisztrálja magát, ha még nem felhasználó!</h2>
<form action="/includes/regisztral.php" method="POST">
  <fieldset>
    <legend>Regisztráció</legend>
    <input type="text" name="csaladinev" placeholder="Vezetéknév" required>
    <span id="csaladinev-error" class="error"></span><br><br>

    <input type="text" name="utonev" placeholder="Utónév" required>
    <span id="utonev-error" class="error"></span><br><br>

    <input type="text" name="lname" placeholder="Felhasználói név" required>
    <span id="lname-error" class="error"></span><br><br>

    <input type="password" name="passwd" placeholder="Jelszó" required>
    <span id="passwd-error" class="error"></span><br><br>

    <input type="submit" name="regisztracio" value="Regisztráció">
  </fieldset>
</form>
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
  document.querySelector('input[name="lname"]').addEventListener('blur', function() {
    if (this.value.trim() === "") {
      alert('A felhasználónév megadása kötelező!');
      this.focus();
    }
  });

  // Jelszó validálása - JAVÍTOTT változat
  document.querySelector('input[name="passwd"]').addEventListener('blur', function() {
    const value = this.value.trim();
    if (value.length < 8 || value.length > 20) {
      alert('A jelszó 8 és 20 karakter között kell legyen!');
      this.focus();
    }
  });
});
</script>
