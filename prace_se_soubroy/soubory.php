<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- CREATE FILE -->
<form action="file_handler.php" method="POST">
    <h2>Vytvořit soubor</h2>
    <input type="hidden" name="action" value="create">

    <p>Název souboru:</p>
    <input type="text" name="filename" required>

    <p>Obsah souboru:</p>
    <textarea name="content" required></textarea>

    <button type="submit">Vytvořit</button>
</form>

<hr>

<!-- WRITE FILE -->
<form action="file_handler.php" method="POST">
    <h2>Přepsat soubor</h2>
    <input type="hidden" name="action" value="write">

    <p>Název souboru:</p>
    <input type="text" name="filename" required>

    <p>Nový obsah:</p>
    <textarea name="content" required></textarea>

    <button type="submit">Přepsat</button>
</form>

<hr>

<!-- DELETE FILE -->
<form action="file_handler.php" method="POST">
    <h2>Smazat soubor</h2>
    <input type="hidden" name="action" value="delete">

    <p>Název souboru:</p>
    <input type="text" name="filename" required>

    <button type="submit">Smazat</button>
</form>

    
</body>
</html>