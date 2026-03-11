<?php
// Adresář pro uložení souborů
$uploadDir = "uploads/";

// Pokud adresář neexistuje, vytvoříme ho
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Zprávy
$message = '';

// Přidání souboru
if (isset($_POST['createFile'])) {
    $fileName = $_POST['fileName'];
    $fileContent = $_POST['fileContent'];

    if (!empty($fileName) && !empty($fileContent)) {
        // Uložení souboru na server
        file_put_contents($uploadDir . $fileName, $fileContent);
        $message = "Soubor '$fileName' byl vytvořen a uložen.";
    } else {
        $message = "Název souboru a obsah musí být vyplněny.";
    }
}

// Úprava souboru
if (isset($_POST['editFile'])) {
    $fileName = $_POST['fileName'];
    $fileContent = $_POST['fileContent'];

    if (!empty($fileName) && !empty($fileContent)) {
        // Přepsání souboru na serveru
        file_put_contents($uploadDir . $fileName, $fileContent);
        $message = "Soubor '$fileName' byl upraven.";
    } else {
        $message = "Název souboru a obsah musí být vyplněny.";
    }
}

// Smazání souboru
if (isset($_POST['deleteFile'])) {
    $fileName = $_POST['deleteFile'];
    $filePath = $uploadDir . $fileName;

    if (file_exists($filePath)) {
        unlink($filePath); // Mazání souboru
        $message = "Soubor '$fileName' byl smazán.";
    } else {
        $message = "Soubor neexistuje.";
    }
}

// Načítání seznamu souborů v adresáři
$files = array_diff(scandir($uploadDir), array('..', '.'));
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Správa souborů</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            margin: 0 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h1>Správa souborů</h1>

<!-- Zobrazení zprávy o operaci -->
<?php if ($message) { echo "<p>$message</p>"; } ?>

<!-- Sekce pro přidání souboru -->
<h2>Přidat soubor</h2>
<form method="POST" action="database.php">
    <input type="text" name="fileName" placeholder="Název souboru" required><br><br>
    <textarea name="fileContent" rows="4" cols="50" placeholder="Obsah souboru" required></textarea><br><br>
    <button type="submit" name="createFile">Přidat soubor</button>
</form>

<hr>

<!-- Tabulka pro zobrazení seznamu souborů -->
<h2>Seznam souborů</h2>
<table>
    <thead>
        <tr>
            <th>Název souboru</th>
            <th>Akce</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($files as $file) { ?>
            <tr>
                <td><?php echo $file; ?></td>
                <td>
                    <a href="#" onclick="editFile('<?php echo $file; ?>')">Upravit</a> | 
                    <a href="#" onclick="deleteFile('<?php echo $file; ?>')">Smazat</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Sekce pro úpravu souboru -->
<h2>Upravit soubor</h2>
<form method="POST" id="editForm" style="display:none;" action="database.php">
    <input type="hidden" name="fileName" id="editFileName" required><br><br>
    <textarea name="fileContent" id="editFileContent" rows="4" cols="50" required></textarea><br><br>
    <button type="submit" name="editFile">Upravit soubor</button>
</form>

<script>
    function editFile(fileName) {
        // Načte obsah souboru pro úpravu
        fetch('uploads/' + fileName)
            .then(response => response.text())
            .then(content => {
                document.getElementById('editFileName').value = fileName;
                document.getElementById('editFileContent').value = content;
                document.getElementById('editForm').style.display = 'block';
            });
    }

    function deleteFile(fileName) {
        // Potvrzení smazání souboru
        if (confirm('Opravdu chcete tento soubor smazat?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'deleteFile';
            input.value = fileName;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

</body>
</html>