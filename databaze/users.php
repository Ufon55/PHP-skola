<?php
include "../databaze/database.php";

try {
    $sql = "INSERT INTO users (Password, Username, Email)
    VALUES (".$_POST["password"].", ".$_POST["user"].", Email)";
    $db->exec($sql);
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

?>