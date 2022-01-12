<?php
    include ("verifica.php"); //verificar a autenticacão

    if ($autenticado) {

        $idUser = $idUtil;

        include ("logout.php");

} else {

}

?>

<?php

$preco = 0.00;
$dateCurrent = 0;
$erro = "";
$ProductArrayErr = [];

$login = "root"; $password = "!AdBp2601!"; $bd = "bd"; $host = "localhost";

// Create connection
$conn = new mysqli($host, $login, $password, $bd);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT * FROM logs ORDER BY id DESC";
$result = $conn->query($sql);

$sqlUser = "SELECT * FROM users WHERE email != '' ORDER BY id DESC";
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
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Utilizador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deleteuser.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4>Tem a certeza que quer eliminar este utilizador?</h4>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn" name="deletedata">Sim, elimina.</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletelogmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Log</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletelog.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="deletelog_id" id="deletelog_id">

                        <h4>Tem a certeza que quer eliminar este log?</h4>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn" name="deletelog">Sim, elimina.</button>
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
                        <a href="indexAdmin.php" class="nav-item nav-link active">DASHBOARD</a>
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
                <li class="breadcrumb-item active">DASHBOARD</li>
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
                        <a class="nav-link active" id="logs-nav" data-toggle="pill" href="#logs-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Logs</a>

                        <a class="nav-link" id="users-nav" data-toggle="pill" href="#users-tab" role="tab"><i class="fa fa-users"></i>Utilizadores</a>
                    </div>

                    <div class="nav flex-column nav-pills invisible" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab"
                            role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="" role="tab"><i
                                class="fa fa-shopping-bag"></i>Pedidos</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="" role="tab"><i
                                class="fa fa-shopping-bag"></i>Pedidos</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="" role="tab"><i
                                class="fa fa-shopping-bag"></i>Pedidos</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="" role="tab"><i
                                class="fa fa-shopping-bag"></i>Pedidos</a>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="logs-tab" role="tabpanel"
                            aria-labelledby="logs-nav">
                            <h4>Atividade no site</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th hidden>ID</th>
                                            <th>Data</th>
                                            <th>Ecrã</th>
                                            <th>Atividade</th>
                                            <th>ID User</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    if($result->num_rows > 0){
                                        while($row = $result->fetch_assoc()){

                                        $id = $row["id"];
                                        $data = $row["data"];
                                        $ecra = $row["ecra"];
                                        $erro = $row["erro"];
                                        $idUser = $row["idUser"];
                                    ?>

                                        <tr>
                                        <td hidden><?php echo $id ?></td>
                                            <td><?php echo $data ?></td>
                                            <td><?php echo $ecra ?></td>
                                            <td><?php echo $erro ?></td>
                                            <td><?php echo $idUser ?></td>
                                            <td>
                                                <!-- eliminar log -->
                                                <button class="btn deletelogbtn"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <?php 
                                            }
                                            } else {

                                                echo "No logs exist.";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="users-tab" role="tabpanel"
                            aria-labelledby="users-nav">
                            <h4>Atividade no site</h4>
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

                                    if($resultUser->num_rows > 0){
                                        while($row = $resultUser->fetch_assoc()){

                                        $id = $row["id"];
                                        $email = $row["email"];
                                        $name = $row["name"];
                                        $foto = $row["foto"];
                                    ?>

                                        <tr>
                                        <td hidden><?php echo $id ?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><img src="img/<?php echo $foto; ?>" alt="Foto Utilizador"></td>
                                            <td>
                                                <!-- bloquear user -->
                                                <button class="btn banbtn"><i class="fa fa-ban"></i></button>

                                                <!-- eliminar user -->
                                                <button class="btn deletebtn"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <?php 
                                            }
                                            } else {

                                                echo "No users exist.";
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
        $(document).ready(function (){
            $('.deletebtn').on('click', function(){
                $('#deletemodal').modal('show');

               $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
            });
        });
</script>

<script>
        $(document).ready(function (){
            $('.deletelogbtn').on('click', function(){
                $('#deletelogmodal').modal('show');

               $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#deletelog_id').val(data[0]);
            });
        });
</script>
</body>
</html>