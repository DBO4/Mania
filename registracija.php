<form method="post" action="unesiPodatkeZaKorisnika.php" onsubmit="return validateForm()">
  <div>
        <label for="ime">Ime:</label> 
        <input type="text" id="ime" name="ime" maxlength="100" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" maxlength="100" required>
    </div>
    <div>
        <label for="sifra">Šifra:</label>
        <input type="password" id="sifra" name="sifra" maxlength="100" required>
    </div>
    <div>
        <label for="potvSifre">Ponovi šifru:</label>
        <input type="password" id="potvSifre" name="potvSifre" maxlength="100" required>
    </div>
    <div>
        <label for="jeAdmin">Admin?:</label>
        <input type="checkbox" id="jeAdmin" name="jeAdmin">
    </div>
  
  <button type="submit">Registracija</button>
</form>