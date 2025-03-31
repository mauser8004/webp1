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
    <form name="regForm" onsubmit="return validateForm(event)">
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
</form>
    <script>
        function validateForm(event) {
            event.preventDefault(); // Megakadályozza az űrlap elküldését, ha hibák vannak

            let csaladinev = document.forms["regForm"]["csaladinev"].value;
            let utonev = document.forms["regForm"]["utonev"].value;
            let lname = document.forms["regForm"]["lname"].value;
            let passwd = document.forms["regForm"]["passwd"].value;

            let errorMsg = "";

            // Vezetéknév és utónév ellenőrzése
            let nameRegex = /^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]{2,}$/;
            if (!nameRegex.test(csaladinev)) {
                errorMsg += "A vezetéknév nagybetűvel kell kezdődjön és legalább 3 karakter hosszú legyen!\n";
            }
            if (!nameRegex.test(utonev)) {
                errorMsg += "Az utónév nagybetűvel kell kezdődjön és legalább 3 karakter hosszú legyen!\n";
            }

            // Felhasználónév ellenőrzése
            if (lname.trim() === "") {
                errorMsg += "A felhasználónév nem lehet üres!\n";
            }

            // Jelszó ellenőrzése
            if (passwd.length < 8 || passwd.length > 20) {
                errorMsg += "A jelszónak 8 és 20 karakter között kell lennie!\n";
            }

            // Hibaüzenetek megjelenítése
            if (errorMsg !== "") {
                alert(errorMsg);
                return false;
            }

            alert("Sikeres regisztráció!");
            document.forms["regForm"].submit(); // Ha minden jó, az űrlapot elküldi
        }
    </script>
