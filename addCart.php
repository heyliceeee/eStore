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


    //$id = $_GET['id'];
    $iduser = $_GET['iduser'];
    $idproduct = $_GET['idproduct'];
    $foto = $_GET['foto'];
    $titulo = $_GET['titulo'];
    $preco = $_GET['preco'];
    

    $sql = "INSERT INTO cart (iduser, idproduct, foto, titulo, preco) VALUES ($iduser, $idproduct, '$foto', '$titulo', '$preco')";
    $result = $conn->query($sql);


    if($result){

            $erro = "Adicionado ao carrinho com sucesso";
            $d = strtotime("now");
            $dateCurrent = date("Y-m-d h:i:sa", $d);
            $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'wishlist', '$erro', '$idUser')";

            //LIGAR TABELA LOGS
            if ($conn->query($logs) === TRUE)
                echo "";
            //echo "Novo log criado com sucesso";
            else echo "Erro: " . $logs . "<br>" . $conn->error;

            sleep(1);

            header("location:cart.php");
        
    } else {

        echo "Adicionado ao carrinho sem sucesso";
        echo "Erro: " . $sql . "<br>" . $conn->error;
        $erro = "Adicionado ao carrinho sem sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'wishlist', '$erro', '$idUser')";
    }
?>