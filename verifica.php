<?php

$login = "root"; $password = "dwdmsaw"; $bd = "bd"; $host = "localhost"; 

session_start();

if (isset($_SESSION['email'])) $email = $_SESSION['email']; else $email = "";
if (isset($_SESSION['pass'])) $pass = $_SESSION['pass']; else $pass = "";



// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
$result = $conn->query($sql);

//$conn->close();

$nomeUtil = ""; $idUtil = 0; $autenticado = false;


   if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        $nomeUtil = $row["name"];
        $idUtil = $row["id"];
        $autenticado = true;

   } else {
        session_destroy();
   }
?>