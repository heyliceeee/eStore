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


if(isset($_POST['delete_wishlist_data'])){

    $id = $_POST['id'];

    $sql = "DELETE FROM wishlist WHERE id='$id' ";
    $result = $conn->query($sql);


    if($result){

        $erro = "Produto eliminado com sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'delete_wishlist', '$erro', '$idUser')";

        //LIGAR TABELA LOGS
        if ($conn->query($logs) === TRUE)
         echo "";
        //echo "Novo log criado com sucesso";
        else echo "Erro: " . $logs . "<br>" . $conn->error;

        sleep(1);

        header("location:wishlist.php");
    
    } else {

        $erro = "Produto eliminado sem sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'delete_wishlist', '$erro', '$idUser')";
    }
}
?>