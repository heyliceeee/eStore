<?php
    include ("verifica.php"); //verificar a autenticacão

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


if(isset($_POST['updateuserdata'])){

    $id = $_POST['updateuser_id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $foto = $_POST['foto'];


    $sql = "UPDATE users SET email='$email', name='$name', foto='$foto' WHERE id='$id' ";
    $result = $conn->query($sql);


    if($result){

        $erro = "Alteração de dados com sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'edit_user', '$erro', '$idUser')";

        //LIGAR TABELA LOGS
        if ($conn->query($logs) === TRUE)
         echo "";
        //echo "Novo log criado com sucesso";
        else echo "Erro: " . $logs . "<br>" . $conn->error;

        sleep(1);

        header("location:my-account.php");
    
    } else {

        $erro = "Alteração de dados sem sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'edit_user', '$erro', '$a')";
    }
}
?>