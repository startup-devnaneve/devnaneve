<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/padrao/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/padrao/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/padrao/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
   
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="assets/img/fundo.jpg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="#" action="#">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="orange">
                                        <h4 class="card-title">Login</h4>                                        
                                    </div>
                                    <p class="category text-center">
                                        Bem vindo ao sistema, faça login para continuar.
                                    </p>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">E-mail</label>
                                                <input type="email" name="email_usu" id="email_usu" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Senha</label>
                                                <input type="password" name="senha_usu" id="senha_usu" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <!-- <button type="submit" name="btn-entrar" id="btn-entrar" class="btn btn-warning btn-lg"><i class="material-icons">input</i> Entrar</button> -->
                                        <a href="views/painel/produtos.php" name="btn-entrar" id="btn-entrar" class="btn btn-warning btn-lg"><i class="material-icons">input</i> Entrar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/padrao/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/padrao/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/padrao/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/padrao/material.min.js" type="text/javascript"></script>
<script src="assets/js/padrao/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="assets/js/padrao/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="assets/js/padrao/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="assets/js/padrao/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="assets/js/padrao/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/padrao/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="assets/js/padrao/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="assets/js/padrao/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="assets/js/padrao/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="assets/js/padrao/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="assets/js/padrao/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="assets/js/padrao/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/padrao/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="assets/js/padrao/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/padrao/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/padrao/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);

        $("#btn-entrar").click(function() {
            location.href = "produtos.php";
        });
    });
</script>

</html>