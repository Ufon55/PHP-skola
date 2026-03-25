

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