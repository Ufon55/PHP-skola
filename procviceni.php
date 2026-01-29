<?php
    $border = 1;
    $word = $_GET["word"];
    $count = $_GET["count"];
    echo "<ol>";
    for($i = 0; $i < $count; $i++)
    {
        echo "<li>";

        echo "<td>$word</td>";

        echo "</li>";
    }
    echo "</ol>";

?>