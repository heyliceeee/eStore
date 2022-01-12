<?php
include("verifica.php"); //verificar a autenticacão

if ($autenticado) {

    $idUser = $idUtil;
} else {

}
?>

<?php

$login = "root"; $password = "!AdBp2601!"; $bd = "bd"; $host = "localhost";

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


if(isset($_POST['updatepassdata'])){

    $id = $_POST['updatepass_id'];
    $pass = $_POST['pass'];

    $pass = md5($pass);

    $sql = "UPDATE users SET pass='$pass' WHERE id='$id' ";
    $result = $conn->query($sql);



    if($result){

        $erro = "Alteração da palavra passe com sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'edit_user', '$erro', '$idUser')";

        //LIGAR TABELA LOGS
        if ($conn->query($logs) === TRUE)
         echo "";
        //echo "Novo log criado com sucesso";
        else echo "Erro: " . $logs . "<br>" . $conn->error;

        sleep(1);

        header("location:login.php");
    
    } else {

        $erro = "Alteração da palavra passe sem sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'edit_user', '$erro', '$idUser')";
    }
}
?>