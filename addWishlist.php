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


//if (isset($_POST['addWishlist'])) {

    //$idUser = $_POST['idUser'];

    $idProduct = $_GET['id'];
    $titulo = $_GET['titulo'];
    $preco = $_GET['preco'];
    $foto = $_GET['foto'];
    

    $sql = "INSERT INTO wishlist (iduser, idproduct, titulo, preco, foto) VALUES ($idUser, $idProduct, '$titulo', '$preco', '$foto')";
    
    $result = $conn->query($sql);


    if($result){
            $erro = "Produto adicionado á lista de desejos com sucesso";
            $d = strtotime("now");
            $dateCurrent = date("Y-m-d h:i:sa", $d);
            $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'wishlist', '$erro', '$idUser')";

            //LIGAR TABELA LOGS
            if ($conn->query($logs) === TRUE)
                echo "";
            //echo "Novo log criado com sucesso";
            else echo "Erro: " . $logs . "<br>" . $conn->error;

            sleep(1);

            header("location:wishlist.php");

        
    } else {

        echo "Produto adicionado á lista de desejos sem sucesso";
        echo "Erro: " . $sql . "<br>" . $conn->error;
        $erro = "Produto adicionado á lista de desejos sem sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'wishlist', '$erro', '$idUser')";
    }
//}
?>