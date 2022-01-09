<?php

$login = "root";
$password = "!AdBp2601!";
$bd = "bd";
$host = "localhost";

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {

    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $query = "SELECT * FROM password_reset_temp WHERE key = '$key' and email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {

        $expDate = $row['expDate'];

        if ($expDate >= $curDate) {
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
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

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
                                    <a href="index.php" class="nav-item nav-link">PÁGINA INICIAL</a>
                                    <a href="product-list.php" class="nav-item nav-link">PRODUTOS</a>
                                </div>
                                <div class="navbar-nav ml-auto">
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link active dropdown-toggle" data-toggle="dropdown">Conta de Utilizador</a>
                                        <div class="dropdown-menu">
                                            <a href="login.php" class="dropdown-item">Iniciar Sessão</a>
                                            <a href="register.php" class="dropdown-item">Criar Conta</a>
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
                                    <a href="index.php">
                                        <img src="img/logo.png" alt="Logo">
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
                            <li class="breadcrumb-item active">ALTERAR A PALAVRA PASSE</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- Login Start -->
                <form class="login" method="post" action="resetPassword.php">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="login-form">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Nova Palavra Passe</label>
                                            <input class="form-control" type="password" placeholder="Palavra Passe" name="pass">
                                        </div>

                                        <div class="col-12">
                                            <button class="btn" name="submit" type="submit" value="submit_button">Alterar Palavra Passe</button>
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

    <?php

        } else {
            $error .= "<h2>Link Expired</h2>>";
        }
    }

    if ($error != "") {
        echo "<div class='error'>" . $error . "</div><br />";
    }
}


if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
    $error = "";
    $pass = mysqli_real_escape_string($con, $_POST["pass"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");

    if ($error != "") {
        echo $error;
    } else {

        $pass = md5($pass);

        $a = "UPDATE users SET pass = '$pass', trn_date = '$curDate' WHERE email = '$email' ";
        $resulta = $conn->query($a);

        $b = "DELETE FROM password_reset_temp WHERE email = '$email' ";
        $resultb = $conn->query($b);

        echo '<div class="error"><p>Parabéns! A tua palavra passe foi alterada com sucesso!.</p>';
    }
}

    ?>

            </body>

            </html>