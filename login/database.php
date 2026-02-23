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

    
$Users = "localhost";
$Username = "člověk";
$Password = "heslo";
$Email = "clovek@clovek.cz";
$dbname = "First";

try {
  $conn = new PDO("mysql:host=$servername;dbname=,$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} 
catch(PDOException $e) 
{
  echo "Connection failed: " . $e->getMessage();
}
?>