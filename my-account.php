<?php
include("verifica.php"); //verificar a autenticacão

if ($autenticado) {

    $idUser = $idUtil;

    include("logout.php");
} else {
}

?>

<?php

$preco = 0.00;
$dateCurrent = 0;
$erro = "";
$ProductArrayErr = [];

$login = "root";
$password = "!AdBp2601!";
$bd = "bd";
$host = "localhost";

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT * FROM products WHERE iduser = 149 AND preco != 0 ORDER BY id DESC";
$result = $conn->query($sql);

$sqlUser = "SELECT * FROM users WHERE id = 149";
$resultUser = $conn->query($sqlUser);
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
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updateproduct.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label>Título</label>
                            <input class="form-control" id="titulo" type="text" placeholder="Introduza o Título do produto" name="titulo">
                        </div>

                        <div class="form-group">
                            <label>Preço</label>
                            <input class="form-control" id="preco" type="text" placeholder="Introduza o Preço do produto" name="preco">
                        </div>

                        <div class="form-group">
                            <label>Marca</label>
                            <input class="form-control" id="marca" type="text" placeholder="Introduza a Marca do produto" name="marca">
                        </div>

                        <div class="form-group">
                            <label>Categoria</label>

                            <select id="categoria" class="form-control" name="categoria">
                                <option selected>Escolha...</option>
                                <option>Moda & Beleza</option>
                                <option>Roupas Criança & Bebé</option>
                                <option>Roupas Homem & Mulher</option>
                                <option>Gadgets & Acessórios</option>
                                <option>Eletrônicos & Acessórios</option>
                                <option>Outro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Estado</label>
                            <select id="estado" class="form-control" name="estado">
                                <option selected>Escolha...</option>
                                <option>Novo</option>
                                <option>Semi-Novo</option>
                                <option>Usado</option>
                                <option>Outro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Localização</label>
                            <input class="form-control" id="localizacao" type="text" placeholder="Introduza a Localização do produto" name="localizacao">
                        </div>

                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" id="descricao" rows="3" name="descricao"></textarea>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn" name="updatedata">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deleteproduct.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4>Tem a certeza que quer eliminar este produto?</h4>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn" name="deletedata">Sim, elimina.</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editusermodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Dados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updateuser.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="updateuser_id" id="updateuser_id">

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" id="email" type="text" placeholder="Introduza o Email" name="email">
                        </div>

                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" id="name" type="text" placeholder="Introduza o Nome" name="name">
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input class="form-control" id="foto" type="file" placeholder="Introduza a Marca do produto" name="foto">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn" name="updateuserdata">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                        <a href="addProduct.php" class="nav-item nav-link">ADICIONAR PRODUTO</a>
                        <a href="cart.php" class="nav-item nav-link">CARRINHO DE COMPRAS</a>
                        <a href="checkout.php" class="nav-item nav-link">CHECKOUT</a>
                        <a href=" my-account.php" class="nav-item nav-link active">MINHA CONTA</a>
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

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">MINHA CONTA</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- My Account Start -->
    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Pedidos</a>
                        <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>Morada</a>
                        <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Detalhes da Conta</a>
                    </div>

                    <div class="nav flex-column nav-pills invisible" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Pedidos</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Pedidos</a>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                            <h4>Meus produtos</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th hidden>ID</th>
                                            <th>Produto</th>
                                            <th>Categoria</th>
                                            <th>Marca</th>
                                            <th>Descrição</th>
                                            <th>Estado</th>
                                            <th>Localização</th>
                                            <th>Preço</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                $id = 149;
                                                $titulo = $row["titulo"];
                                                $categoria = $row["categoria"];
                                                $marca = $row["marca"];
                                                $descricao = $row["descricao"];
                                                $estado = $row["estado"];
                                                $localizacao = $row["localizacao"];
                                                $preco = $row["preco"];
                                        ?>

                                                <tr>
                                                    <td hidden><?php echo $id ?></td>
                                                    <td><?php echo $titulo ?></td>
                                                    <td><?php echo $categoria ?></td>
                                                    <td><?php echo $marca ?></td>
                                                    <td><?php echo $descricao ?></td>
                                                    <td><?php echo $estado ?></td>
                                                    <td><?php echo $localizacao ?></td>
                                                    <td><?php echo $preco ?> €</td>
                                                    <td>
                                                        <!-- visualizar produto -->
                                                        <a href="product-detailLogin.php?id=<?php echo $id; ?>">
                                                            <button class="btn"><i class="fa fa-search"></i></button>
                                                        </a>

                                                        <!-- editar produto -->
                                                        <button type="button" class="btn editbtn"><i class="fa fa-pen"></i></button>

                                                        <!-- eliminar produto -->
                                                        <button class="btn deletebtn"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>

                                        <?php
                                            }
                                        } else {

                                            echo "No products exist.";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nº</th>
                                            <th>Produto</th>
                                            <th>Data</th>
                                            <th>Preço</th>
                                            <th>Estado</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Nome do Produto</td>
                                            <td>01 Jan 2020</td>
                                            <td>€99</td>
                                            <td>Aprovado</td>
                                            <td><button class="btn">Visualizar</button></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Nome do Produto</td>
                                            <td>01 Jan 2020</td>
                                            <td>€99</td>
                                            <td>Aprovado</td>
                                            <td><button class="btn">Visualizar</button></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Nome do Produto</td>
                                            <td>01 Jan 2020</td>
                                            <td>€99</td>
                                            <td>Aprovado</td>
                                            <td><button class="btn">Visualizar</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                            <h4>Morada</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Morada</h5>
                                    <p>123 Rua da Casa, Santo Tirso, Porto</p>
                                    <p>Telemóvel: +351 961 678</p>
                                    <button class="btn">Editar Morada</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <h4>Alterar dados</h4>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th hidden>ID</th>
                                            <th>Email</th>
                                            <th>Nome</th>
                                            <th>Foto</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        if ($resultUser->num_rows > 0) {
                                            while ($row = $resultUser->fetch_assoc()) {

                                                $id = $row["id"];
                                                $email = $row["email"];
                                                $name = $row["name"];
                                                $foto = $row["foto"];
                                        ?>

                                                <tr>
                                                    <td hidden><?php echo $id ?></td>
                                                    <td><?php echo $email ?></td>
                                                    <td><?php echo $name ?></td>
                                                    <td><img src="img/<?php echo $foto; ?>" alt="Product Image"></td>
                                                    <td>
                                                        <!-- editar dados -->
                                                        <button type="button" class="btn edituserbtn"><i class="fa fa-pen"></i></button>
                                                    </td>
                                                </tr>

                                        <?php
                                            }
                                        } else {

                                            echo "No user exist.";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account End -->

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

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#titulo').val(data[1]);
                $('#categoria').val(data[2]);
                $('#marca').val(data[3]);
                $('#descricao').val(data[4]);
                $('#estado').val(data[5]);
                $('#localizacao').val(data[6]);
                $('#preco').val(data[7]);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function() {
                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.edituserbtn').on('click', function() {
                $('#editusermodal').modal('show');


                //localStorage.setItem('idUser', a);
                //localStorage.removeItem('idUser');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#updateuser_id').val(data[0]);
                $('#email').val(data[1]);
                $('#name').val(data[2]);
                $('#foto').val(data[5]);
            });
        });
    </script>
</body>

</html>