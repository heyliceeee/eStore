<?php
    include ("verifica.php"); //verificar a autenticacão

    if ($autenticado) {
        //codigo a executar se o user estiver autenticado
        //echo "Utilizador autenticado!!!<br />";
        //echo "Nome: $nomeUtil";
        //echo "ID USER: $idUtil";

        //linha de exemplo
        //include ("logout.php");

    } else {
        //codigo a executar se o user não estiver autenticado

        //echo "<h1>Para aceder a esta página tem de se autenticar!!!</h1><br /><br />";

        //linha de exemplo
        //include ("login.php");
}
?>

<?php
    
$foto = $titulo = $marca = $categoria = $estado = $descricao = $localizacao = "";
$preco = 0.00;
$dateCurrent = 0;
$erro = "";
$ProductArrayErr = [];

$login = "root"; $password = "!AdBp2601!"; $bd = "bd"; $host = "localhost";

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["foto"])){

        $ProductArrayErr['fotoErr'] = "Insira a foto do produto";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);

    } else {

        $foto = product_input($_POST["foto"]);
    }


    if(empty($_POST["titulo"])){

        $ProductArrayErr['tituloErr'] = "Insira o titulo do produto";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);

    } else {

        $titulo = product_input($_POST["titulo"]);
    }


    if(empty($_POST["preco"])){

        $ProductArrayErr['precoErr'] = "Insira o preço do produto";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);

    } else {

        $preco = product_input($_POST["preco"]);
    }


    if(empty($_POST["marca"])){

    } else {

        $marca = product_input($_POST["marca"]);
    }


    if(empty($_POST["categoria"])){

    } else {

        $categoria = product_input($_POST["categoria"]);
    }


    if(empty($_POST["estado"])){

    } else {

        $estado = product_input($_POST["estado"]);
    }


    if(empty($_POST["descricao"])){

    } else {

        $descricao = product_input($_POST["descricao"]);
    }


    if(empty($_POST["localizacao"])){

    } else {

        $localizacao = product_input($_POST["localizacao"]);
    }


    if(isset($_POST['submit'])){
        if(!empty($_POST['checkArr'])){
          foreach($_POST['checkArr'] as $checked){
            echo $checked, "</br>";
          }
        }
    }
}


    function product_input($data) {
        if(is_array($data)) {
            return array_map('product_input', $data);
        }
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    if(empty($ProductArrayErr)){

        // sql para inserir registos
        $sql = "INSERT INTO products (iduser, nameuser, foto, titulo, preco, marca, categoria, estado, descricao, localizacao) 
        VALUES ($idUtil, '$nomeUtil', '$foto', '$titulo', '$preco', '$marca', '$categoria', '$estado', '$descricao', '$localizacao')";


        if ($conn->query($sql) === TRUE) 
        //header("Location: $pagina"); //no caso de quererem redirecionar a página para outro sitio
        echo "Novo produto criado com sucesso";
        else echo "Erro: " . $sql . "<br>" . $conn->error;

        echo "";


        $erro = "Novo produto criado com sucesso";
        $d = strtotime("now");
        $dateCurrent = date("Y-m-d h:i:sa", $d);
  
        $logs = "INSERT INTO logs (data, ecra, erro) VALUES ('$dateCurrent', 'add_product', '$erro')";
  
        //LIGAR TABELA LOGS
        if ($conn->query($logs) === TRUE)
            echo "";
            //echo "Novo log criado com sucesso";
        else echo "Erro: " . $logs . "<br>" . $conn->error;
    
    } else {

        echo "Erro: ";


        foreach($ProductArrayErr as $producterro => $erro){

            echo $erro, "; ";

            $logs = "INSERT INTO logs (data, ecra, erro) VALUES ('$dateCurrent', 'add_product', '$erro')";


            //LIGAR TABELA LOGS
            if ($conn->query($logs) === TRUE){
    
                //echo "Novo log criado com sucesso!!! ";
                echo "";
                
            } else {
        
                echo "Erro: " . $logs . "<br>" . $conn->error;
            }
        }
}

?>

<!DOCTYPE html>
<html>

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
                        <a href="addProduct.php" class="nav-item nav-link active">ADICIONAR PRODUTO</a>
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
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">ADICIONAR PRODUTO</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <!-- Login Start -->
    <form class="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="register-form">
                        <div class="row">
                            <div class="col-12">
                                <label>Fotos</label>
                                <input class="form-control" type="file" placeholder="Selecione as fotos do produto" name="foto">
                            </div>

                            <div class="col-12">
                                <label>Título</label>
                                <input class="form-control" type="text" placeholder="Introduza o Título do produto" name="titulo">
                            </div>

                            <div class="col-6">
                                <label>Preço</label>
                                <input class="form-control" type="text" placeholder="Introduza o Preço do produto" name="preco">
                            </div>

                            <div class="col-6">
                                <label>Marca</label>
                                <input class="form-control" type="text" placeholder="Introduza a Marca do produto" name="marca">
                            </div>

                            <div class="col-6">
                                <label for="inputTipo">Categoria</label>
                                <select id="inputTipo" class="form-control" name="categoria">
                                    <option selected>Escolha...</option>
                                    <option>Moda & Beleza</option>
                                    <option>Roupas Criança & Bebé</option>
                                    <option>Roupas Homem & Mulher</option>
                                    <option>Gadgets & Acessórios</option>
                                    <option>Eletrônicos & Acessórios</option>
                                    <option>Outro</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="inputEstado">Estado do Produto</label>
                                <select id="inputEstado" class="form-control" name="estado">
                                    <option selected>Escolha...</option>
                                    <option>Novo</option>
                                    <option>Semi-Novo</option>
                                    <option>Usado</option>
                                    <option>Outro</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label>Localização</label>
                                <input class="form-control" type="text" placeholder="Introduza a Localização lidade do produto" name="localizacao">
                            </div>

                            <div class="col-12">
                                <label for="exampleFormControlTextarea1">Descrição</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
                            </div>
                            
                            <div class="col-6">
                                <input class="form-control" type="hidden" name="pagina" value="<?php echo basename($_SERVER['PHP_SELF']);?>">
                            </div>


                            <div class="col-12">
                                <button class="btn" name="submit" type="submit">Criar Produto</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            
        </div>
    </form>
</div>
    <!-- Login End -->
    <!-- Login End -->

    <!-- INVISIBLE -->
    <div class="login invisible">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="login-form">
                        <div class="row">
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