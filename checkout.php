<?php
    include ("verifica.php"); //verificar a autenticacão

    if ($autenticado) {
        //codigo a executar se o user estiver autenticado
        //echo "Utilizador autenticado!!!<br />";
        //echo "Nome: $nomeUtil";

        //linha de exemplo
        include ("logout.php");

    } else {
        //codigo a executar se o user não estiver autenticado

        //echo "<h1>Para aceder a esta página tem de se autenticar!!!</h1><br /><br />";

        //linha de exemplo
        //include ("login.php");
}
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
                    <a href="indexLogin.php" class="nav-item nav-link">PÁGINA INICIAL</a>
                        <a href="product-listLogin.php" class="nav-item nav-link">PRODUTOS</a>
                        <a href="product-detailLogin.php" class="nav-item nav-link">DETALHE DO PRODUTO</a>
                        <a href="cart.php" class="nav-item nav-link">CARRINHO DE COMPRAS</a>
                        <a href="checkout.php" class="nav-item nav-link active">CHECKOUT</a>
                        <a href=" my-account.php" class="nav-item nav-link">MINHA CONTA</a>
                        <a href="wishlist.php" class="nav-item nav-link">LISTA DE DESEJOS</a>
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
                        <a href="indexLogin.php">
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
                        <a href="wishlist.php" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>(0)</span>
                        </a>
                        <a href="cart.php" class="btn cart">
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
                <li class="breadcrumb-item"><a href="indexLogin.php">PÁGINA INICIAL</a></li>
                <li class="breadcrumb-item"><a href="#">PRODUTOS</a></li>
                <li class="breadcrumb-item active">Checkout</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2>Morada</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nome</label>
                                    <input class="form-control" type="text" placeholder="Nome">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Nº Telemóvel</label>
                                    <input class="form-control" type="text" placeholder="Nº Telemóvel">
                                </div>
                                <div class="col-md-12">
                                    <label>Morada</label>
                                    <input class="form-control" type="text" placeholder="Morada">
                                </div>
                                <div class="col-md-6">
                                    <label>País</label>
                                    <select class="custom-select">
                                        <option selected>Portugal</option>
                                        <option>Espanha</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Cidade</label>
                                    <input class="form-control" type="text" placeholder="Cidade">
                                </div>
                                <div class="col-md-6">
                                    <label>Estado</label>
                                    <input class="form-control" type="text" placeholder="Estado">
                                </div>
                                <div class="col-md-6">
                                    <label>Código Postal</label>
                                    <input class="form-control" type="text" placeholder="Código Postal">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <h1>CARRINHO DE COMPRAS Total</h1>
                            <p>Nome do Produto<span>€99</span></p>
                            <p class="sub-total">Sub Total<span>€99</span></p>
                            <p class="ship-cost">Portes de Envio<span>€1</span></p>
                            <h2>Total<span>€100</span></h2>
                        </div>

                        <div class="checkout-payment">
                            <div class="payment-methods">
                                <h1>Métodos de Pagamento</h1>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                        <label class="custom-control-label" for="payment-1">Paypal</label>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-2" name="payment">
                                        <label class="custom-control-label" for="payment-2">Pagamento</label>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                        <label class="custom-control-label" for="payment-3">Pagamento em Cheque</label>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-4" name="payment">
                                        <label class="custom-control-label" for="payment-4">Transferência bancária
                                            direta</label>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-5" name="payment">
                                        <label class="custom-control-label" for="payment-5">Dinheiro na Entrega</label>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-btn">
                                <button>Faça a Encomenda</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

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