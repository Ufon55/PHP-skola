<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Přihlášení</h1>
        <p>Vyplňte formulář pro přihlášení.</p>
        <hr>

        <!-- Zobrazení chybové zprávy, pokud existuje -->
        <div class="error-message" id="error-message"></div>

        <form id="login-form" method="POST" action="process.php">
            <label for="username"><b>Uživatelské jméno</b></label>
            <input type="text" placeholder="Zadejte jméno" name="username" id="username" required>

            <label for="password"><b>Heslo</b></label>
            <input type="password" placeholder="Zadejte heslo" name="password" id="password" required>

            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Zapamatovat mě
            </label>

            <p>Vytvořením účtu souhlasíte s našimi <a href="#" style="color:dodgerblue">Podmínkami & Ochrana osobních údajů</a>.</p>

            <div class="clearfix">
                <button type="button" class="cancelbtn">Zrušit</button>
                <button type="submit" class="signupbtn">Přihlásit se</button>
            </div>
        </form>
    </div>

    <script>
        // Zpracování případné chyby (např. špatné přihlašovací údaje)
        <?php if(isset($_GET['error'])): ?>
            document.getElementById('error-message').innerText = "Nesprávné přihlašovací údaje!";
        <?php endif; ?>
    </script>
</body>
</html>

<?php
// Získání údajů z formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Získání uživatelského jména a hesla
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hashování hesla pro bezpečné uložení
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Uložení údajů do textového souboru (pro tento příklad)
    $file = 'users.txt'; // Soubor, do kterého budeme ukládat uživatele

    // Formát pro ukládání: uživatelské jméno a heslo
    $user_data = $username . ':' . $hashed_password . PHP_EOL;

    // Otevření souboru pro přidání údajů
    if (file_put_contents($file, $user_data, FILE_APPEND)) {
        // Přesměrování na stránku po úspěšném uložení
        header('Location: success.php');
        exit();
    } else {
        // Pokud došlo k chybě při ukládání
        echo "Chyba při ukládání uživatele.";
    }
} else {
    // Pokud byl soubor přístupný bez POST požadavku
    echo "Nesprávný přístup!";
}
?>