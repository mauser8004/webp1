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
    <form action = "/includes/regisztral.php" method = "POST">
      <fieldset>
        <legend>Regisztráció</legend>
        <br>
        <input type="text" name="csaladinev" placeholder="Vezetéknév" required><br><br>
        <input type="text" name="utonev" placeholder="Utónév" required><br><br>
        <input type="text" name="lname" placeholder="Felhasználói név" required><br><br>
        <input type="password" name="passwd" placeholder="Jelszó" required><br><br>
        <input type="submit" name="regisztracio" value="Regisztráció">
        <br>&nbsp;
      </fieldset>
    </form>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const regForm = document.querySelector('form[action="/includes/regisztral.php"]');

  regForm.addEventListener('submit', function(event) {
    event.preventDefault();

    // Mezők kinyerése
    const vezeteknev = regForm.querySelector('input[name="csaladinev"]').value.trim();
    const utonev = regForm.querySelector('input[name="utonev"]').value.trim();
    const felhasznalonev = regForm.querySelector('input[name="lname"]').value.trim();
    const jelszo = regForm.querySelector('input[name="passwd"]').value.trim();

    // Validálás
    let isValid = true;
    let errorMessage = "";

    if (vezeteknev.length < 3 || !/^[A-ZÁÉÍÓÖŐÚÜŰ]/.test(vezeteknev)) {
      errorMessage += "- A vezetéknév minimum 3 karakteres és nagybetűvel kezdődik!\n";
      isValid = false;
    }

    if (utonev.length < 3 || !/^[A-ZÁÉÍÓÖŐÚÜŰ]/.test(utonev)) {
      errorMessage += "- Az utónév minimum 3 karakteres és nagybetűvel kezdődik!\n";
      isValid = false;
    }

    if (felhasznalonev === "") {
      errorMessage += "- A felhasználónév megadása kötelező!\n";
      isValid = false;
    }

    if (jelszo.length < 8 || jelszo.length > 20) {
      errorMessage += "- A jelszó 8 és 20 karakter között kell legyen!\n";
      isValid = false;
    }

    if (!isValid) {
      alert("Hibás adatok:\n" + errorMessage);
    } else {
      const formData = new FormData(regForm); // Az egész űrlap adatait elküldjük

      fetch('/includes/regisztral.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        alert("Sikeres regisztráció! Szerver válasza: " + data);
        regForm.reset();
      })
      .catch(error => {
        alert("Hiba történt a küldés során: " + error);
      });
    }
  });
});
</script>
