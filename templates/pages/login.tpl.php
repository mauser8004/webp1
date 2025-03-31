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
  // Mezők és hibakijelzők kiválasztása
  const csaladinevInput = document.querySelector('input[name="csaladinev"]');
  const utonevInput = document.querySelector('input[name="utonev"]');
  const lnameInput = document.querySelector('input[name="lname"]');
  const passwdInput = document.querySelector('input[name="passwd"]');

  // Eseményfigyelők hozzáadása (amikor elhagyja a mezőt)
  csaladinevInput.addEventListener('blur', validateCsaladinev);
  utonevInput.addEventListener('blur', validateUtonev);
  lnameInput.addEventListener('blur', validateLname);
  passwdInput.addEventListener('blur', validatePasswd);

  // Validáló függvények
  function validateCsaladinev() {
    const value = csaladinevInput.value.trim();
    const errorElement = document.getElementById('csaladinev-error');

    if (value.length < 3 || !/^[A-ZÁÉÍÓÖŐÚÜŰ]/.test(value)) {
      errorElement.textContent = 'Minimum 3 karakter, nagybetűvel kezdődik!';
      return false;
    } else {
      errorElement.textContent = '';
      return true;
    }
  }

  function validateUtonev() {
    const value = utonevInput.value.trim();
    const errorElement = document.getElementById('utonev-error');

    if (value.length < 3 || !/^[A-ZÁÉÍÓÖŐÚÜŰ]/.test(value)) {
      errorElement.textContent = 'Minimum 3 karakter, nagybetűvel kezdődik!';
      return false;
    } else {
      errorElement.textContent = '';
      return true;
    }
  }

  function validateLname() {
    const value = lnameInput.value.trim();
    const errorElement = document.getElementById('lname-error');

    if (value.length === 0) {
      errorElement.textContent = 'Kötelező mező!';
      return false;
    } else {
      errorElement.textContent = '';
      return true;
    }
  }

  function validatePasswd() {
    const value = passwdInput.value.trim();
    const errorElement = document.getElementById('passwd-error');

    if (value.length < 8 || value.length > 20) {
      errorElement.textContent = '8-20 karakter között kell legyen!';
      return false;
    } else {
      errorElement.textContent = '';
      return true;
    }
  }

  // Űrlap elküldése előtti utolsó ellenőrzés
  document.querySelector('form').addEventListener('submit', function(event) {
    if (!validateCsaladinev() || !validateUtonev() || !validateLname() || !validatePasswd()) {
      event.preventDefault(); // Megakadályozza az űrlap küldését
      alert('Kérjük, javítsa ki a hibákat!');
    }
    // Ha minden valid, az űrlap elküldődik a szerverre
  });
});
</script>
