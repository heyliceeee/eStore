<?php

    $pagina = "index.php";

   if (!isset($_SESSION)) session_start();

   if (isset($_POST['pagina'])) {
        //$pagina=$_POST['pagina'];
        session_destroy();
        header("Location: $pagina"); //no caso de quererem redirecionar a página para outro sitio
   } else{
        ?>
        <form action="logout.php" method="post" name="logout">
		<input name="pagina" type="hidden" value="<?php echo basename($_SERVER['PHP_SELF']);?>">
                <button value="Logout" name="Submit" type="submit" title="logout">Terminar Sessão</button>
        </form>
        <?php
   }
?>