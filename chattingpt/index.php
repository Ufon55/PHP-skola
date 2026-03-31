<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Získání dat z formuláře
    $name = $_POST['fname'] ?? '';
    $message = $_POST['message'] ?? '';

    // Ověření, že jméno a zpráva nejsou prázdné
    if (!empty($name) && !empty($message)) {

        // Cesta k souboru, kam ukládáme zprávy
        $file = 'messages.txt';

        // Formát pro ukládání: jméno + zpráva
        $logMessage = "Jméno: $name\nZpráva: $message\n--------------------------\n";

        // Otevření souboru pro přidání zprávy
        if (file_put_contents($file, $logMessage, FILE_APPEND)) {
            // Pokud je vše v pořádku, zobrazíme úspěšné hlášení
            echo "<p>Zpráva byla úspěšně uložena.</p>";
        } else {
            // Pokud došlo k chybě při ukládání zprávy
            echo "<p>Chyba při ukládání zprávy.</p>";
        }

    } else {
        // Pokud nejsou vyplněna jména nebo zprávy
        echo "<p>Prosím, vyplňte všechny údaje.</p>";
    }

} else {
    // Pokud není požadavek POST
    echo "<p>Nesprávný přístup!</p>";
}
?>