<?php
// Funkce pro vytvoření nového souboru
if (isset($_POST['create_new_file'])) {
    $newFileName = $_POST['new_file_name'];
    $newFilePath = 'uploads/' . $newFileName;
    if (!file_exists($newFilePath)) {
        touch($newFilePath); // Vytvoří nový prázdný soubor
        echo '<p>Nový soubor byl vytvořen: ' . $newFileName . '</p>';
    } else {
        echo '<p>Soubor již existuje.</p>';
    }
}
// Funkce pro nahrání souboru
if (isset($_POST['upload_file'])) {
    $fileTmpName = $_FILES['file_upload']['tmp_name'];
    $fileName = $_FILES['file_upload']['name'];
    $uploadDir = 'uploads/';
    // Pokud je složka pro nahrání neexistuje, vytvoříme ji
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    // Uložení souboru
    if (move_uploaded_file($fileTmpName, $uploadDir . $fileName)) {
        echo '<p>Soubor byl úspěšně nahrán: ' . $fileName . '</p>';
    } else {
        echo '<p>Chyba při nahrávání souboru.</p>';
    }
}
// Funkce pro otevření souboru
if (isset($_POST['open_file'])) {
    $fileName = $_POST['file_name'];
    $filePath = 'uploads/' . $fileName;
    if (file_exists($filePath)) {
        $fileContent = file_get_contents($filePath);
        echo '<p>Obsah souboru:</p>';
        echo '<pre>' . htmlspecialchars($fileContent) . '</pre>';
    } else {
        echo '<p>Soubor neexistuje.</p>';
    }
}
// Funkce pro uložení změn do souboru
if (isset($_POST['save'])) {
    $fileName = $_POST['file_name'];
    $content = $_POST['content'];
    $filePath = 'uploads/' . $fileName;
    if (file_put_contents($filePath, $content)) {
        echo '<p>Změny byly úspěšně uloženy do souboru ' . $fileName . '</p>';
    } else {
        echo '<p>Chyba při ukládání souboru.</p>';
    }
}
?>