<?php
// Definujeme adresář pro ukládání souborů
$uploadDir = "uploads/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true); // Vytvoříme adresář, pokud neexistuje
}

// Funkce pro vytvoření souboru
if (isset($_POST['createFile'])) {
    $fileName = $_POST['fileName'];
    $content = $_POST['fileContent'];
    if (!empty($fileName) && !empty($content)) {
        // Používáme fopen() pro otevření souboru pro zápis
        $file = fopen($uploadDir . $fileName, "w");
        if ($file) {
            fwrite($file, $content);
            fclose($file);
            $message = "Soubor '$fileName' byl vytvořen.<br>";
        } else {
            $message = "Chyba při vytváření souboru.<br>";
        }
    } else {
        $message = "Název souboru a obsah musí být vyplněny.<br>";
    }
}

// Funkce pro čtení souboru
if (isset($_GET['readFile'])) {
    $fileName = $_GET['readFile'];
    $filePath = $uploadDir . $fileName;
    if (file_exists($filePath)) {
        // Používáme readfile() pro přečtení a zobrazení obsahu souboru
        readfile($filePath);
        exit;
    } else {
        $message = "Soubor neexistuje.<br>";
    }
}

// Funkce pro úpravu souboru
if (isset($_POST['editFile'])) {
    $fileName = $_POST['fileName'];
    $newContent = $_POST['fileContent'];
    if (!empty($fileName) && !empty($newContent)) {
        // Používáme fopen() pro otevření souboru pro zápis
        $file = fopen($uploadDir . $fileName, "w");
        if ($file) {
            fwrite($file, $newContent);
            fclose($file);
            $message = "Soubor '$fileName' byl upraven.<br>";
        } else {
            $message = "Chyba při úpravě souboru.<br>";
        }
    } else {
        $message = "Název souboru a nový obsah musí být vyplněny.<br>";
    }
}

// Funkce pro mazání souboru
if (isset($_POST['deleteFile'])) {
    $fileName = $_POST['deleteFile'];
    $filePath = $uploadDir . $fileName;
    if (file_exists($filePath)) {
        unlink($filePath); // Používáme unlink() pro smazání souboru
        $message = "Soubor '$fileName' byl smazán.<br>";
    } else {
        $message = "Soubor neexistuje.<br>";
    }
}

// Seznam souborů v adresáři
$files = array_diff(scandir($uploadDir), array('..', '.'));
?>