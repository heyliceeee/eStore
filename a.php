<?php
    include ("verifica.php"); //verificar a autenticacão

    if ($autenticado) {
        //codigo a executar se o user estiver autenticado
        echo "Utilizador autenticado!!!<br />";
        echo "Nome: $nomeUtil";

        //linha de exemplo
        include ("logout.php");

    } else {
        //codigo a executar se o user não estiver autenticado

        //echo "<h1>Para aceder a esta página tem de se autenticar!!!</h1><br /><br />";

        //linha de exemplo
        include ("login.php");
}
?>