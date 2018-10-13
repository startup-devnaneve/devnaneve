<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard Pro by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../../assets/img/fundo.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Control +
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com" class="simple-text">
                    C+
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="../../assets/img/faces/avatar.jpg" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            Tania Andrew
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <li>
                                    <a href="#">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                <li class="active">
                        <a href="../dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Home</p>
                        </a>
                    </li>
                    
                    
                    
                    <li class="active">
                        <a data-toggle="collapse" href="#tablesExamples" aria-expanded="true">
                            <i class="material-icons">grid_on</i>
                            <p>Gerenciamento
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse in" id="tablesExamples">
                            <ul class="nav">
                                <li class="active">
                                    <a href="../forms/funcionarios.php">Funcionários</a>
                                </li>
                                <li class="active">
                                    <a href="../forms/clientes.php">Clientes</a>
                                </li>
                                <li class="active">
                                    <a href="../forms/produtos.php">Produtos</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Clientes </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Mike John responded to your email</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 5 new tasks</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Andrew</a>
                                    </li>
                                    <li>
                                        <a href="#">Another Notification</a>
                                    </li>
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>           
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                
                            <button style="position: relative; left: 83%;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Cadastrar</button>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Cadastrar Cliente</h4>
                                </div>
                                <div class="modal-body">

                                    <!--    FORMULÁRIO DO MODAL CLIENTE-->
                                <form>
                                    <div class="form-group">
                                      <label for="Nomecliente">Nome</label>
                                      <input type="text" class="form-control" id="nomecli"  placeholder="Nome completo">
                                    </div>
                                    <div class="form-group">
                                      <label for="Emailcliente">Email</label>
                                      <input type="email" class="form-control" id="emailcli" placeholder="exemplo@exemplo.com">
                                    </div>
                                    <div class="form-group">
                                      <label for="Telefonecliente">Telefone</label>
                                      <input type="text" class="form-control" id="telefonecli"  placeholder="Telefone Fixo">
                                    </div>
                                    <div class="form-group">
                                      <label for="Celularcliente">Celular</label>
                                      <input type="text" class="form-control" id="celularcli"  placeholder="Telefone Celular">
                                    </div>
                                    <div class="form-group">
                                      <label for="Datanascimento">Daata Nascimento</label>
                                      <input type="date" class="form-control" id="datanascimentocli"  placeholder="**/**/****">
                                    </div>
                                    <div class="form-group">
                                      <label for="Cpfcliente">CPF</label>
                                      <input type="text" class="form-control" id="cpfcli"  placeholder="xxx.xxx.xxx-xx">
                                    </div>
                                    <div class="form-group">
                                      <label for="Rgcliente">RG</label>
                                      <input type="text" class="form-control" id="rgcli"  placeholder="">
                                    </div>
                                    <div class="form-group">
                                      <label for="Logradourocliente">Logradouro</label>
                                      <input type="text" class="form-control" id="logradourocli"  placeholder="">
                                    </div>
                                    <div class="form-group">
                                      <label for="Numerocliente">Número</label>
                                      <input type="number" class="form-control" id="numerocli"  placeholder="">
                                    </div>
                                    <div class="form-group">
                                      <label for="Bairrocliente">Bairro</label>
                                      <input type="text" class="form-control" id="bairrocli"  placeholder="">
                                    </div>
                                    <div class="form-group">
                                      <label for="Complementocliente">Complemento</label>
                                      <input type="text" class="form-control" id="complementocli"  placeholder="Dica para localizar">
                                    </div>
                                    <div class="form-group">
                                      <label for="Senhafuncionario">Senha</label>
                                      <input type="password" class="form-control" id="senhafun" placeholder="ex...****">
                                    </div>
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                  </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                </div>

                            </div>
                            </div>

                            
                            <!--<div style="position: relative; left: 83%;"><h3>Adicionar <span class="glyphicon glyphicon-plus"></span>  </h3></div> -->
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="green">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    
                                    <h4 class="card-title">Clientes</h4>
                                    <div class="card-content table-responsive table-full-width">
                                        <table class="table table-hover">
                                            <thead>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Celular</th>
                                                <th>Data Nascimento</th>
                                                <th>CPF</th>
                                                <th>Ações</th>
                                            </thead>
                                            <tbody>
                                                <tr class="success">
                                                    <td>1</td>
                                                    <td>Dakota Rice (Success)</td>
                                                    <td>darkota@gmail.com</td>
                                                    <td>(18)98139-5053</td>
                                                    <td>09/05/2000</td>
                                                    <td>333.333.333-33</td>
                                                    <td><span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp;</span><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Minerva Hooper</td>
                                                    <td>minerva@gmail.com</td>
                                                    <td>(18)98139-5052</td>
                                                    <td>22/08/2008</td>
                                                    <td>222.222.222/22</td>
                                                    <td><span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp;</span><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="../../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../../assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>

</html>