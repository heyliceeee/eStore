<?php
    include ("verifica.php"); //verificar a autenticacão

    if ($autenticado) {
        //codigo a executar se o user estiver autenticado
        //echo "Utilizador autenticado!!!<br />";
        //echo "Nome: $nomeUtil";
        $idUser = $idUtil;

        //linha de exemplo
        include ("logout.php");

    } else {
        //codigo a executar se o user não estiver autenticado

        //echo "<h1>Para aceder a esta página tem de se autenticar!!!</h1><br /><br />";

        //linha de exemplo
        //include ("login.php");
}
?>

<?php

$foto = $titulo = "";
$preco = 0.00;

$login = "root"; $password = "!AdBp2601!"; $bd = "bd"; $host = "localhost";

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$query3products = "SELECT * FROM products WHERE preco != 0 ORDER BY id DESC LIMIT 3";
$resultQuery3products = $conn->query($query3products);

$query2productsEletronicos = "SELECT * FROM products WHERE preco != 0 AND categoria='Eletrônicos &amp; Acessórios' OR categoria='Eletrônicos & Acessórios' ORDER BY id DESC LIMIT 2;";
$resultQuery2productsEletronicos = $conn->query($query2productsEletronicos);

$query1productModa = "SELECT * FROM products WHERE preco != 0 AND categoria='Moda &amp; Beleza' OR categoria='Moda & Beleza' ORDER BY id DESC LIMIT 1;";
$resultQuery1productModa = $conn->query($query1productModa);

$query1productCrianca = "SELECT * FROM products WHERE preco != 0 AND categoria='Roupas Criança &amp; Bebé' OR categoria='Roupas Criança & Bebé' ORDER BY id DESC LIMIT 1;";
$resultQuery1productCrianca = $conn->query($query1productCrianca);

$query1productHomem = "SELECT * FROM products WHERE preco != 0 AND categoria='Roupas Homem &amp; Mulher' OR categoria='Roupas Homem & Mulher' ORDER BY id DESC LIMIT 1;";
$resultQuery1productHomem = $conn->query($query1productHomem);

$query1productGadgets = "SELECT * FROM products WHERE preco != 0 AND categoria='Gadgets &amp; Acessórios' OR categoria='Gadgets & Acessórios' ORDER BY id DESC LIMIT 1;";
$resultQuery1productGadgets = $conn->query($query1productGadgets);

$query1productEletronicos = "SELECT * FROM products WHERE preco != 0 AND categoria='Eletrônicos &amp; Acessórios' OR categoria='Eletrônicos & Acessórios' ORDER BY id DESC LIMIT 1;";
$resultQuery1productEletronicos = $conn->query($query1productEletronicos);

$query1productRecent = "SELECT * FROM products WHERE preco != 0 ORDER BY id DESC LIMIT 1;";
$resultQuery1productRecent = $conn->query($query1productRecent);

$queryproductsOld = "SELECT * FROM products WHERE preco != 0 ORDER BY id LIMIT 5";
$resultQueryproductsOld = $conn->query($queryproductsOld);

$queryproductsRecents = "SELECT * FROM products WHERE preco != 0 ORDER BY id DESC LIMIT 5";
$resultQueryproductsRecents = $conn->query($queryproductsRecents);
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
                        <a href="indexLogin.php" class="nav-item nav-link active">PÁGINA INICIAL</a>
                        <a href="product-listLogin.php" class="nav-item nav-link">PRODUTOS</a>
                        <a href="addProduct.php" class="nav-item nav-link">ADICIONAR PRODUTO</a>
                        <a href="cart.php" class="nav-item nav-link">CARRINHO DE COMPRAS</a>
                        <a href="checkout.php" class="nav-item nav-link">CHECKOUT</a>
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
                    <form name="form" class="search" action="search-listLogin.php" method="get">

                    <?php
                    // Turn off all error reporting
                    error_reporting(0);
                    ?>

                    <?php $search = $_GET['search']; ?>

                        <input type="text" placeholder="Pesquisar" id="search" name="search">
                        <a href="search-listLogin.php?search=<?php echo $search; ?>">
                            <button><i class="fa fa-search"></i></button>
                        </a>
                    </form>
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

    <!-- Main Slider Start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="recentListLogin.php"><i class="fa fa-plus-square"></i>Acabaram de chegar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productListCategoryLogin.php?categoria=Moda_&_Beleza"><i class="fa fa-female"></i>Moda & Beleza</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productListCategoryLogin.php?categoria=Roupas_Criança_&_Bebé"><i class="fa fa-child"></i>Roupas Criança & Bebé</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productListCategoryLogin.php?categoria=Roupas_Homem_&_Mulher"><i class="fa fa-tshirt"></i>Roupas Homem & Mulher</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productListCategoryLogin.php?categoria=Gadgets_&_Acessórios"><i class="fa fa-mobile-alt"></i>Gadgets & Acessórios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productListCategoryLogin.php?categoria=Eletrônicos_&_Acessórios"><i class="fa fa-microchip"></i>Eletrônicos & Acessórios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productListCategoryLogin.php?categoria=Outro"><i class="fa fa-ellipsis-h"></i>Outro</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">

                        <?php

                            if($resultQuery3products->num_rows > 0){
                                while($row = $resultQuery3products->fetch_assoc()){
                                $id = $row["id"];
                                $foto = $row["foto"];
                                $titulo = $row["titulo"];

                        ?>


                        <div class="header-slider-item">
                            <img src="img/<?php echo $foto; ?>" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p><?php echo $titulo; ?></p>
                                <a class="btn" href="product-detailLogin.php?id=<?php echo $id; ?>"><i class="fa fa-shopping-cart"></i>Compre agora</a>
                            </div>
                        </div>

                        <?php 
                            }
                            } else {

                                echo "No products exist.";
                            }
                        ?>                        

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">

                    <?php

                        if($resultQuery2productsEletronicos->num_rows > 0){
                            while($row = $resultQuery2productsEletronicos->fetch_assoc()){

                            $id = $row["id"];
                            $foto = $row["foto"];
                            $titulo = $row["titulo"];

                    ?>

                        <div class="img-item">
                            <img src="img/<?php echo $foto; ?>" />
                            <a class="img-text" href="product-detailLogin.php?id=<?php echo $id; ?>">
                                <p><?php echo $titulo; ?></p>
                            </a>
                        </div>
                        
                        <?php 
                            }
                            } else {

                                echo "No products exist.";
                            }
                        ?>                 

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fa-cc-mastercard"></i>
                        <h2>Pagamento seguro</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Entrega em todo o mundo</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-sync-alt"></i>
                        <h2>Retorno de 90 dias</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>Suporte 24/7</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->

    <!-- Category Start-->
    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">


                <?php

                    if($resultQuery1productModa->num_rows > 0){
                        while($row = $resultQuery1productModa->fetch_assoc()){
                        
                        $id = $row["id"];
                        $foto = $row["foto"];
                        $titulo = $row["titulo"];

                ?>


                    <div class="category-item ch-400">
                        <img src="img/<?php echo $foto; ?>" />
                        <a class="category-name" href="product-detailLogin.php?id=<?php echo $id; ?>">
                            <p><?php echo $titulo; ?></p>
                        </a>
                    </div>
                
                <?php 
                    }
                        } else {

                        echo "No products exist.";
                    }
                ?> 


                </div>
                <div class="col-md-3">


                <?php

                    if($resultQuery1productCrianca->num_rows > 0){
                        while($row = $resultQuery1productCrianca->fetch_assoc()){

                        $id = $row["id"];
                        $foto = $row["foto"];
                        $titulo = $row["titulo"];

                ?>


                    <div class="category-item ch-250">
                        <img src="img/<?php echo $foto; ?>" />
                        <a class="category-name" href="product-detailLogin.php?id=<?php echo $id; ?>">
                            <p><?php echo $titulo; ?></p>
                        </a>
                    </div>

                <?php 
                    }
                        } else {

                        echo "No products exist.";
                    }
                ?> 


                <?php

                if($resultQuery1productHomem->num_rows > 0){
                    while($row = $resultQuery1productHomem->fetch_assoc()){
                       
                    $id = $row["id"];
                    $foto = $row["foto"];
                    $titulo = $row["titulo"];

                ?>

                    <div class="category-item ch-150">
                        <img src="img/<?php echo $foto; ?>" />
                        <a class="category-name" href="product-detailLogin.php?id=<?php echo $id; ?>">
                            <p><?php echo $titulo; ?></p>
                        </a>
                    </div>


                <?php 
                    }
                    } else {

                        echo "No products exist.";
                    }
                ?> 
                    
                </div>


                <div class="col-md-3">


                <?php

                if($resultQuery1productGadgets->num_rows > 0){
                    while($row = $resultQuery1productGadgets->fetch_assoc()){
                        
                    $id = $row["id"];
                    $foto = $row["foto"];
                    $titulo = $row["titulo"];

                ?>


                    <div class="category-item ch-150">
                        <img src="img/<?php echo $foto; ?>" />
                        <a class="category-name" href="product-detailLogin.php?id=<?php echo $id; ?>">
                            <p><?php echo $titulo; ?></p>
                        </a>
                    </div>

                    <?php 
                    }
                    } else {

                        echo "No products exist.";
                    }
                ?> 



                <?php

                if($resultQuery1productEletronicos->num_rows > 0){
                    while($row = $resultQuery1productEletronicos->fetch_assoc()){

                    $id = $row["id"];
                    $foto = $row["foto"];
                    $titulo = $row["titulo"];

                ?>


                    <div class="category-item ch-250">
                        <img src="img/<?php echo $foto; ?>" />
                        <a class="category-name" href="product-detailLogin.php?id=<?php echo $id; ?>">
                            <p><?php echo $titulo; ?></p>
                        </a>
                    </div>

                    <?php 
                    }
                    } else {

                        echo "No products exist.";
                    }
                ?> 


                </div>
                <div class="col-md-3">


                <?php

                if($resultQuery1productRecent->num_rows > 0){
                    while($row = $resultQuery1productRecent->fetch_assoc()){

                    $id = $row["id"];
                    $foto = $row["foto"];
                    $titulo = $row["titulo"];

                ?>


                    <div class="category-item ch-400">
                        <img src="img/<?php echo $foto; ?>" />
                        <a class="category-name" href="product-detailLogin.php?id=<?php echo $id; ?>">
                            <p><?php echo $titulo; ?></p>
                        </a>
                    </div>

                    <?php 
                    }
                    } else {

                        echo "No products exist.";
                    }
                ?> 
                </div>
            </div>
        </div>
    </div>
    <!-- Category End-->

    <!-- Call to Action Start -->
    <div class="call-to-action">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Ligue-nos para qualquer dúvida</h1>
                </div>
                <div class="col-md-6">
                    <a href="tel:351961678">+351-961-678</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <!-- Featured Product Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Produto em destaque</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">

            <?php

                if($resultQueryproductsOld->num_rows > 0){
                    while($row = $resultQueryproductsOld->fetch_assoc()){

                    $id = $row["id"];
                    $foto = $row["foto"];
                    $titulo = $row["titulo"];
                    $preco = $row["preco"];

            ?>

                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#"><?php echo $titulo; ?></a>
                        </div>
                        <div class="product-image">
                            <a href="product-detailLogin.php">
                                <img src="img/<?php echo $foto; ?>" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="product-detailLogin.php?id=<?php echo $id; ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><?php echo $preco; ?><span></span>€</h3>
                            <a class="btn" href="product-detailLogin.php?id=<?php echo $id; ?>"><i class="fa fa-shopping-cart"></i>Compre Agora</a>
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
        </div>
    </div>
    <!-- Featured Product End -->

    <!-- Newsletter Start -->
    <div class="newsletter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Assine o nosso boletim informativo</h1>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <input type="email" value="Your email here">
                        <button>Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Recent Product Start -->
    <div class="recent-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Produto Recente</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">

            <?php

                if($resultQueryproductsRecents->num_rows > 0){
                    while($row = $resultQueryproductsRecents->fetch_assoc()){

                    $id = $row["id"];
                    $foto = $row["foto"];
                    $titulo = $row["titulo"];
                    $preco = $row["preco"];

            ?>

                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#"><?php echo $titulo; ?></a>
                        </div>
                        <div class="product-image">
                            <a href="product-detailLogin.php">
                                <img src="img/<?php echo $foto; ?>" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="product-detailLogin.php?id=<?php echo $id; ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><?php echo $preco; ?><span></span>€</h3>
                            <a class="btn" href="product-detailLogin.php?id=<?php echo $id; ?>"><i class="fa fa-shopping-cart"></i>Compre Agora</a>
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
        </div>
    </div>
    <!-- Recent Product End -->

    <!-- Review Start -->
    <div class="review">
        <div class="container-fluid">
            <div class="row align-items-center review-slider normal-slider">
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="img/review-1.jpg" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>Maria Rita</h2>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Espetacular! Comprei uma TV de boa qualidade. SUPER RECOMENDO !!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="img/review-2.jpg" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>João Afonso</h2>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Espetacular! Comprei uma PS5 de boa qualidade. SUPER RECOMENDO !!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="img/review-3.jpg" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>Rosa Maria</h2>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Espetacular! Comprei uma carpete de boa qualidade. SUPER RECOMENDO !!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Review End -->

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