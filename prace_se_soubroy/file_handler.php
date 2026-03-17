
<?php
$action = $_POST['action'] ?? null;

switch ($action) {

    // CREATE FILE
    case "create":
        $name = $_POST['filename'];
        $content = $_POST['content'];

        file_put_contents($name, $content);
        echo "Soubor '$name' byl vytvořen.";
        break;

    // WRITE FILE (overwrite)
    case "write":
        $name = $_POST['filename'];
        $content = $_POST['content'];

        if (file_exists($name)) {
            file_put_contents($name, $content);
            echo "Soubor '$name' byl přepsán.";
        } else {
            echo "Soubor neexistuje.";
        }
        break;

    // DELETE FILE
    case "delete":
        $name = $_POST['filename'];

        if (file_exists($name)) {
            unlink($name);
            echo "Soubor '$name' byl smazán.";
        } else {
            echo "Soubor neexistuje.";
        }
        break;

    default:
        echo "Neplatná akce.";

}

?>