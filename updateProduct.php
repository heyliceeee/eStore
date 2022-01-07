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


if(isset($_POST['updatedata'])){

    $id = $_POST['update_id'];
    $titulo = $_POST['titulo'];
    $preco = $_POST['preco'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $estado = $_POST['estado'];
    $localizacao = $_POST['localizacao'];
    $descricao = $_POST['descricao'];


    $sql = "UPDATE products SET titulo='$titulo', preco='$preco', marca='$marca', categoria='$categoria', estado='$estado', localizacao='$localizacao', descricao='$descricao' WHERE id='$id' ";
    $result = $conn->query($sql);


    if($result){

        $erro = "Produto editado com sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'edit_product', '$erro', '$idUser')";

        //LIGAR TABELA LOGS
        if ($conn->query($logs) === TRUE)
         echo "";
        //echo "Novo log criado com sucesso";
        else echo "Erro: " . $logs . "<br>" . $conn->error;

        sleep(1);

        header("location:my-account.php");
    
    } else {

        $erro = "Produto editado sem sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'edit_product', '$erro', '$idUser')";
    }
}



?>