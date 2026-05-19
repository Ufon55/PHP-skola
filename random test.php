<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div width="50%" style="display: inline; text-align: center;">
        <h1>BMI Kalkulača</h1>
            <table>
                <tr>
                    <td><h3>Zadej výšku</h3></td>
                    <td><input type="number" name="height" id="">cm</td>
                    <?php
                        if(isset($_GET["height"]))
                        {
                            $height = $_GET["height"];
                        }
                    ?>
                </tr>

                <tr>
                    <td><h3>Zadej Váhu</h3></td>
                    <td><input type="number" name="weight" id="">kg</td>
                </tr>

                <tr>
                    <td><input type="submit" value="Vypočítat"></td>
                </tr>
            </table>
    </div>
    
    
</body>
</html>

