<?php
    $checkbox = $_POST["checkbox"] ?? "off";
    $date = $_POST["date"];
    $datetime = $_POST["datetime"];
    $email = $_POST["email"];
    $file = $_POST["file"];
    $month = $_POST["month"];
    $password = $_POST["password"];
    $range = $_POST["range"];
    $search = $_POST["search"];
    $tel = $_POST["tel"];
    $number = $_POST["number"];

    echo "Checkbox: " .$checkbox. "<br>";
    echo "date: " .$date. "<br>";
    echo "datetime: " .$datetime. "<br>";
    echo "email: " .$email. "<br>";
    echo "file: " .$file. "<br>";
    echo "month: " .$month. "<br>";
    echo "password: " .$password. "<br>";
    echo "range: " .$range. "<br>";
    echo "search: " .$search. "<br>";
    echo "tel: " .$tel. "<br>";
    echo "number: " .$number. "<br>";

?>