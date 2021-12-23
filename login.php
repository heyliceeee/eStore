<?php

$login = "root"; $password = "!AdBp2601!"; $bd = "bd"; $host = "localhost"; 
$email=""; $pass=""; $pagina="index.html"; $LoginArrayErr=[]; $back="login.php";

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    if (!isset($_SESSION)) session_start();
    if(isset($_POST['email']) && isset($_POST['pass'])) {

    //email verificações
    if (empty($_POST["email"])) {

        $LoginArrayErr['emailErr'] = "Insira o email do utilizador";
        
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);

    } else {

        if (isset($_POST['email'])) {

            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $pass = md5($pass);


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $emailErr = "Formato de email inválido";
                $LoginArrayErr['emailErr'] = $emailErr;

                $d = strtotime("now");
                $dateCurrent = date("Y-m-d h:i:sa", $d);
            }
        }
    }


    //pass verificações
    if (empty($_POST["pass"])) {

        $LoginArrayErr['passErr'] = "Insira uma password";

        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
    }



      $sql = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
      $result = $conn->query($sql);

      //$conn->close();

      if ($result->num_rows == 1) {
           $_SESSION['email'] = $email;
           $_SESSION['pass'] = $pass;
           

           //echo "<h1>Utilizador Válido!!!</h1> ";

            $erro = "Utilizador Válido!!!";
            $d = strtotime("now");
            $dateCurrent = date("Y-m-d h:i:sa", $d);

            $logs = "INSERT INTO logs (data, ecra, erro) VALUES ('$dateCurrent', 'login', '$erro')";

            //LIGAR TABELA LOGS
            if ($conn->query($logs) === TRUE)
            header("Location: $pagina"); //no caso de quererem redirecionar a página para outro sitio
            //echo "Novo log criado com sucesso!!! ";
            else echo "Erro: " . $logs . "<br>" . $conn->error;
            //header("Location: $login"); //no caso de quererem redirecionar a página para outro sitio


           
      } else {

        echo "Erro: ";

        $LoginArrayErr['passErr'] = "Utilizador Inválido";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
        //echo "<h1>ERRO - Utilizador Inválido!!!</h1>";
        
        //header("Location: $login"); //no caso de quererem redirecionar a página para outro sitio

            
        foreach($LoginArrayErr as $loginerro => $erro) {
            echo  $erro . "; ";

            $logs = "INSERT INTO logs (data, ecra, erro) VALUES ('$dateCurrent', 'login', '$erro')";


            //LIGAR TABELA LOGS
            if ($conn->query($logs) === TRUE){

                echo "Novo log criado com sucesso!!! ";
                    
            } else {

                echo "Erro: " . $logs . "<br>" . $conn->error;
            }
        }
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    suporte@email.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +351-961-678
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.html" class="nav-item nav-link">PÁGINA INICIAL</a>
                        <a href="product-list.html" class="nav-item nav-link">PRODUTOS</a>
                        <a href="product-detail.html" class="nav-item nav-link">DETALHE DO PRODUTO</a>
                        <a href="cart.html" class="nav-item nav-link">CARRINHO DE COMPRAS</a>
                        <a href="checkout.html" class="nav-item nav-link">CHECKOUT</a>
                        <a href=" my-account.html" class="nav-item nav-link">MINHA CONTA</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">MAIS PÁGINAS</a>
                            <div class="dropdown-menu">
                                <a href="wishlist.html" class="dropdown-item">LISTA DE DESEJOS</a>
                                <a href="contact.html" class="dropdown-item">CONTACTE-NOS</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Conta de Utilizador</a>
                            <div class="dropdown-menu">
                                <a href="login.html" class="dropdown-item">Iniciar Sessão</a>
                                <a href="register.html" class="dropdown-item">Criar Conta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <img src="img/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <input type="text" placeholder="Pesquisar">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="wishlist.html" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>(0)</span>
                        </a>
                        <a href="cart.html" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>(0)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">PÁGINA INICIAL</a></li>
                <li class="breadcrumb-item active">INICIAR SESSÃO</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <form class="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="login-form">
                        <div class="row">
                            <div class="col-6">
                                <label>E-mail</label>
                                <input class="form-control" type="email" placeholder="E-mail" name="email">
                            </div>


                            <div class="col-6">
                                <label>Palavra Passe</label>
                                <input class="form-control" type="password" placeholder="Palavra Passe" name="pass">
                            </div>

                            <div class="col-6">
                                <input class="form-control" type="hidden" name="pagina" value="<?php echo basename($_SERVER['PHP_SELF']);?>">
                            </div>


                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Mantenha-me conectado</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn" name="Submit" type="submit">Iniciar Sessão</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
    <!-- Login End -->

    <!-- INVISIBLE -->
    <div class="login invisible">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="login-form">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->

    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Entrar em Contato</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>123 E Store, Santo Tirso, Porto, Portugal</p>
                            <p><i class="fa fa-envelope"></i>email@example.com</p>
                            <p><i class="fa fa-phone"></i>+351-961-678</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Siga-nos</h2>
                        <div class="contact-info">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Informação da Empresa</h2>
                        <ul>
                            <li><a href="#">Sobre Nós</a></li>
                            <li><a href="#">Política de Privacidade</a></li>
                            <li><a href="#">Termos & Condições</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Informação de Compra</h2>
                        <ul>
                            <li><a href="#">Política de Pagamento</a></li>
                            <li><a href="#">Política de Envio</a></li>
                            <li><a href="#">Política de Devolução</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>Nós Aceitamos:</h2>
                        <img src="img/payment-method.png" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Assegurado por:</h2>
                        <img src="img/godaddy.svg" alt="Payment Security" />
                        <img src="img/norton.svg" alt="Payment Security" />
                        <img src="img/ssl.svg" alt="Payment Security" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="">Alice & Tiago</a>. Todos os direitos reservados</p>
                </div>

                <div class="col-md-6 template-by">
                    <p>Template By <a href="">Alice & Tiago</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
<?php
}
?>