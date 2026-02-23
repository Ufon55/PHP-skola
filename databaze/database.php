<?php
    // echo "dostal jsem:  " .$_POST["uname"]. "<br>";
    // echo "dostal jsem:  " .$_POST["psw"];
    // session_start();

    // if ($_POST["uname"] == "admin" && $_POST["psw"] == "admin")
    // {

    //     $_SESSION["uname"] = $_POST["uname"];
    //     $_SESSION["psw"] = $_POST["psw"];

    // }

    // if (isset($_SESSION["uname"]))
    // {
        
    //     $pass = $_SESSION["psw"];
    //     $user = $_SESSION["uname"];

    //     echo "uživatel $user a heslo $pass";
    //     echo '<form action="" method="get">
    //     <input type="submit" name="logout" value="Odhlásit se">
    //   </form>';

    // }


  $dsn = "mysql:host=localhost;dbname=test;charset=utf8";
  $Username = "uzivatel";
  $Password = "admin";

  try {
    $conn = new PDO($dsn, $Username, $Password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } 
  catch(PDOException $e) 
  {
    echo "Connection failed: " . $e->getMessage();
  }

  function get($table, $id) {
    global $db;

    $sql = "SELECT * FROM $table WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id'=> $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  function getAll($table) {
    global $db;

    $sql = "SELECT * FROM $table";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

?>