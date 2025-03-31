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
  const form = document.querySelector('fieldset');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Megállítjuk az alapértelmezett űrlapküldést

    // Mezők kinyerése
    const vezeteknev = document.querySelector('input[name="csaladinev"]').value.trim();
    const utonev = document.querySelector('input[name="utonev"]').value.trim();
    const felhasznalonev = document.querySelector('input[name="lname"]').value.trim();
    const jelszo = document.querySelector('input[name="passwd"]').value.trim();

    // Validálás
    let isValid = true;
    let errorMessage = "";

    // Vezetéknév: min 3 karakter, nagybetűvel kezdődik
    if (vezeteknev.length < 3 || !/^[A-ZÁÉÍÓÖŐÚÜŰ]/.test(vezeteknev)) {
      errorMessage += "- A vezetéknév minimum 3 karakteres és nagybetűvel kezdődik!\n";
      isValid = false;
    }

    // Utónév: min 3 karakter, nagybetűvel kezdődik
    if (utonev.length < 3 || !/^[A-ZÁÉÍÓÖŐÚÜŰ]/.test(utonev)) {
      errorMessage += "- Az utónév minimum 3 karakteres és nagybetűvel kezdődik!\n";
      isValid = false;
    }

    // Felhasználónév: nem lehet üres
    if (felhasznalonev === "") {
      errorMessage += "- A felhasználónév megadása kötelező!\n";
      isValid = false;
    }

    // Jelszó: 8-20 karakter
    if (jelszo.length < 8 || jelszo.length > 20) {
      errorMessage += "- A jelszó 8 és 20 karakter között kell legyen!\n";
      isValid = false;
    }

    // Ha hibás, hibaüzenet; ha jó, elküldjük POST-tal
    if (!isValid) {
      alert("Hibás adatok:\n" + errorMessage);
    } else {
      // Adatok összeállítása POST-hoz
      const formData = new FormData();
      formData.append('csaladinev', vezeteknev);
      formData.append('utonev', utonev);
      formData.append('lname', felhasznalonev);
      formData.append('passwd', jelszo);

      // Fetch API-val POST kérés a regisztracio.php-hoz
      fetch('regisztracio.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        alert("Sikeres regisztráció! Szerver válasza: " + data);
        form.reset(); // Űrlap törlése
      })
      .catch(error => {
        alert("Hiba történt a küldés során: " + error);
      });
    }
  });
});
</script>
