<?php
include("verifica.php"); //verificar a autenticacão

if ($autenticado) {

    $idUser = $idUtil;
} else {
}
?>

<?php

$login = "root";
$password = "!AdBp2601!";
$bd = "bd";
$host = "localhost";
global $idUser;

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


if (isset($_POST['createdata'])) {

    $idUser = $_POST['idUser'];

    $d = strtotime("now");
    $expDate = date("Y-m-d h:i:sa", $d);

    $reason = $_POST['reason'];
    

    $sql = "INSERT INTO bans (idUser, expDate, reason) VALUES ($idUser, '$expDate', '$reason')";
    $result = $conn->query($sql);

    $sqlUser = "UPDATE users SET ban='1' WHERE id='$idUser'";
    $resultUser = $conn->query($sqlUser);


    if($result){
        if($resultUser){

            $erro = "Utilizador banido com sucesso";
            $d = strtotime("now");
            $dateCurrent = date("Y-m-d h:i:sa", $d);
            $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'ban_user', '$erro', '$idUser')";

            //LIGAR TABELA LOGS
            if ($conn->query($logs) === TRUE)
                echo "";
            //echo "Novo log criado com sucesso";
            else echo "Erro: " . $logs . "<br>" . $conn->error;

            sleep(1);

            header("location:indexAdmin.php");
        
        } else {

            echo "Utilizador banido sem sucesso";
            echo "Erro: " . $sql . "<br>" . $conn->error;
            $erro = "Utilizador banido sem sucesso";
            $d = strtotime("now");
            $dateCurrent = date("Y-m-d h:i:sa", $d);
            $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'ban_user', '$erro', '$idUser')";
        }

        
    } else {

        echo "Utilizador banido sem sucesso";
        echo "Erro: " . $sql . "<br>" . $conn->error;
        $erro = "Utilizador banido sem sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'ban_user', '$erro', '$idUser')";
    }
}
?>