<?php
include "database.php";
$password = $_POST["password"];
$name = $_POST["name"];

try {
    global $conn;
    $sql = "INSERT INTO users (Password, Username, Email) 
    VALUES ('$password', '$name', 'email')";
    $conn->exec($sql);
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->g+etMessage();
  }

?>