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
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("form").addEventListener("submit", function (event) {
            let csaladinev = document.querySelector("[name='csaladinev']").value.trim();
            let utonev = document.querySelector("[name='utonev']").value.trim();
            let lname = document.querySelector("[name='lname']").value.trim();
            let passwd = document.querySelector("[name='passwd']").value.trim();
            let errorMsg = [];

            // Vezetéknév és utónév ellenőrzése (Nagybetűvel kezdődjön, min. 3 karakter)
            let nameRegex = /^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéíóöőúüű]{2,}$/;
            if (!nameRegex.test(csaladinev)) {
                errorMsg.push("A vezetéknév nagybetűvel kell kezdődjön és legalább 3 karakter hosszú legyen!");
            }
            if (!nameRegex.test(utonev)) {
                errorMsg.push("Az utónév nagybetűvel kell kezdődjön és legalább 3 karakter hosszú legyen!");
            }

            // Felhasználónév ellenőrzése (nem lehet üres)
            if (lname.length === 0) {
                errorMsg.push("A felhasználónév nem lehet üres!");
            }

            // Jelszó ellenőrzése (min. 8, max. 20 karakter)
            if (passwd.length < 8 || passwd.length > 20) {
                errorMsg.push("A jelszónak 8 és 20 karakter között kell lennie!");
            }

            // Hibaüzenetek megjelenítése
            if (errorMsg.length > 0) {
                alert(errorMsg.join("\n"));
                event.preventDefault(); // Megakadályozza az űrlap elküldését, ha hiba van
            }
        });
    });
</script>
