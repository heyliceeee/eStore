<?php
    include ("verifica.php"); //verificar a autenticacão

    if ($autenticado) {
        $idUser = $idUtil;

?>
    <script>
       '<?php $a ?>' = localStorage.getItem('idUser');
    </script>

<?php

} else {

?>

<script>
    '<?php $a ?>' = localStorage.removeItem('idUser');
</script>

<?php

}

?>


<?php

$login = "root"; $password = "!AdBp2601!"; $bd = "bd"; $host = "localhost";

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


if(isset($_POST['updateuserdata'])){

?>

    <script>
        '<?php $a ?>' = localStorage.getItem('idUser');
        console.log('<?php echo $a ?>');
    </script>

    <script>
         console.log("passou aqui");
    </script>

    <?php

    $id = $_POST['updateuser_id'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    $pass = $_POST['pass'];
    $pass = md5($pass);

    $foto = $_POST['foto'];


    $sql = "UPDATE users SET email='$email', name='$name', pass='$pass', foto='$foto' WHERE id='$a' ";
    $result = $conn->query($sql);


    if($result){

        $erro = "Alteração de dados com sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        $logs = "INSERT INTO logs (data, ecra, erro, idUser) VALUES ('$dateCurrent', 'edit_user', '$erro', '$a')";

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