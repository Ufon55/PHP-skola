
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <?php
        $rows = 10;
        $columns = 10;
        $count = 0;
        $lichy = 1;
        $sudy = 0;

        for($i=1;$i<=10;$i++)
        {
            echo "<tr>";
            if($lichy>$sudy)
            {
                
            }
            
            for($j=1;$j<=10;$j++)
               {
                $count++;
                echo "<td>".$count."</td>";
                
               }
            echo "</tr>";
        }
        

        ?>
    </table>
    
</body>
</html>