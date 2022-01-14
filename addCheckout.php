<?php
include("verifica.php"); //verificar a autenticacão

if ($autenticado) {

    $idUser = $idUtil;
    $emailUser = $emailUtil;
    $nameUser = $nomeUtil;

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

    //$iduser = $_GET['iduser'];
    //$portes = $_GET['portes'];
    //$subtotal = $_GET['subtotal'];
    $total = $_GET['total'];

    $morada = $_POST['morada'];
    $pais = $_POST['pais'];
    $cidade = $_POST['cidade'];
    $codpostal = $_POST['codpostal'];

    $d = strtotime("now");
    $dateCurrent = date("Y-m-d h:i:sa", $d);
    

    $sql = "INSERT INTO checkout (iduser, nome, email, morada, pais, cidade, codpostal, total, data) VALUES ($idUser, '$nameUser', '$emailUser', '$morada', '$pais', '$cidade', '$codpostal', '$total', '$dateCurrent')";
    $result = $conn->query($sql);


    if($result){

            $erro = "Pagamento com sucesso";
            $d = strtotime("now");
            $dateCurrent = date("Y-m-d h:i:sa", $d);
            $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'checkout', '$erro', '$idUser')";

            //LIGAR TABELA LOGS
            if ($conn->query($logs) === TRUE)
                echo "";
            //echo "Novo log criado com sucesso";
            else echo "Erro: " . $logs . "<br>" . $conn->error;

            sleep(1);

            header("location:indexLogin.php");
        
    } else {

        echo "Pagamento sem sucesso";
        echo "Erro: " . $sql . "<br>" . $conn->error;
        $erro = "Pagamento sem sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'checkout', '$erro', '$idUser')";
    }
?>