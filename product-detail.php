<?php
    //require_once ("product-list.php");

    //echo "ID: $idProductClick";
?>

<?php

$foto = $titulo = $marca = $categoria = $estado = $descricao = $nameuser = $localizacao = "";
$preco = 0.00;

$login = "root"; $password = "!AdBp2601!"; $bd = "bd"; $host = "localhost";

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$a = $_GET['id']; //get id url param

$query = "SELECT * FROM products WHERE id = '$a' ";
$resultQuery = $conn->query($query);



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
                        <a href="index.php" class="nav-item nav-link">P??GINA INICIAL</a>
                        <a href="product-list.php" class="nav-item nav-link">PRODUTOS</a>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Conta de Utilizador</a>
                            <div class="dropdown-menu">
                            <a href="login.php" class="dropdown-item">Iniciar Sess??o</a>
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
            <li class="breadcrumb-item active">DETALHE DO PRODUTO</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">

                <?php

                    if($resultQuery->num_rows > 0){
                        while($row = $resultQuery->fetch_assoc()){

                            $foto = $row["foto"];
                            $titulo = $row["titulo"];
                            $preco = $row["preco"];
                            $categoria = $row["categoria"];
                            $marca = $row["marca"];
                            $estado = $row["estado"];
                            $descricao = $row["descricao"];
                            $nameuser = $row["nameuser"];
                            $localizacao = $row["localizacao"];
                ?>

                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    <img src="img/<?php echo $foto; ?>" alt="Product Image">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title">
                                        <h2><?php echo $titulo; ?></h2>
                                    </div>
                                    <div class="price">
                                        <h4>Pre??o:</h4>
                                        <p><?php echo $preco; ?>???</p>
                                    </div>
                                    <div class="p-color">
                                        <h4>Tipo:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn"><?php echo $categoria; ?></button>
                                        </div>
                                    </div>
                                    <div class="p-color">
                                        <h4>Marca:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn"><?php echo $marca; ?></button>
                                        </div>
                                    </div>
                                    <div class="p-color">
                                        <h4>Estado:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn"><?php echo $estado; ?></button>
                                        </div>
                                    </div>

                                    <div class="action">
                                        <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Adicionar ao Carrinho
                                            de Compras</a>
                                        <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Compre Agora</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                        }
                        } else {

                            echo "No products exist.";
                        }
                    ?>  
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Descri????o</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#reviews">Opini??es</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#user">Vendedor</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>Descri????o do produto</h4>
                                    <p><?php echo $descricao; ?></p>
                                </div>
                                <div id="reviews" class="container tab-pane fade">
                                    <div class="reviews-submitted">
                                        <div class="reviewer">Nuno Oliveira - <span>01 Jan 2020</span></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam.
                                        </p>
                                    </div>
                                    <div class="reviews-submit">
                                        <h4>D?? a sua opini??o:</h4>
                                        <div class="ratting">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="row form">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Nome">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Email">
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Opini??o"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <a href="login.php"><button>Comentar</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php

                
                                $queryFoto = "SELECT foto FROM users WHERE name = '$nameuser' ";
                                $resultQueryFoto = $conn->query($queryFoto);

                                if($resultQueryFoto->num_rows > 0){
                                    while($row = $resultQueryFoto->fetch_assoc()){

                                        $foto = $row["foto"];
                            ?>

                                <div id="user" class="container tab-pane fade">
                                    <div class="reviews-submitted">
                                        <div class="reviewer">
                                            <img src="img/<?php echo $foto; ?>" alt="Foto de perfil" style="width: 100px;"/>
                                            <?php echo $nameuser; ?></div>
                                    </div>

                                    <div class="reviews-submitted">
                                        <div class="reviewer">Localiza????o</div>
                                        <p><?php echo $localizacao; ?></p>
                                    </div>
                                </div>

                                <?php 
                        }
                        } else {

                            echo "N??o tem foto.";
                        }
                    ?>  
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">Categoria</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-female"></i>Moda & Beleza</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-child"></i>Roupas Crian??a &
                                        Beb??</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Roupas Homem & Mulher</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets &
                                        Acess??rios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Eletr??nicos &
                                        Acess??rios</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product Detail End -->

    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Entrar em Contato</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>123 E Store, Santo Tirso, Porto, Portugal</p>
                            <p><i class="fa fa-envelope"></i>estore.website.2021@gmail.com</p>
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
                        <h2>Informa????o da Empresa</h2>
                        <ul>
                            <li><a href="#">Sobre N??s</a></li>
                            <li><a href="#">Pol??tica de Privacidade</a></li>
                            <li><a href="#">Termos & Condi????es</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Informa????o de Compra</h2>
                        <ul>
                            <li><a href="#">Pol??tica de Pagamento</a></li>
                            <li><a href="#">Pol??tica de Envio</a></li>
                            <li><a href="#">Pol??tica de Devolu????o</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>N??s Aceitamos:</h2>
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