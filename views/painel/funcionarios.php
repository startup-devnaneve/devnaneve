<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Control+ Sistema</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- Bootstrap core CSS -->
        <link href="../../assets/css/padrao/bootstrap.min.css" rel="stylesheet" />
        <!-- Material Dashboard CSS -->
        <link href="../../assets/css/padrao/material-dashboard.css" rel="stylesheet" />
        <!-- SweetAlert CSS -->
        <link href="../../assets/css/plugins/sweetalert/sweetalert.min.css" rel="stylesheet" />
        <!-- CSS for Demo Purpose, don't include it in your project -->
        <link href="../../assets/css/padrao/demo.css" rel="stylesheet" />
        <link href="../../assets/css/padrao/estilo.css" rel="stylesheet" />
        <!-- Form Validation CSS -->
        <link href="../../assets/css/plugins/formvalidation/formValidation.min.css" rel="stylesheet">
        <!-- Fonts and icons -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    </head>
    <body>

        <div class="pesquisando" style="display: none;"></div>

        <div class="wrapper">
            <div class="sidebar" data-active-color="orange" data-background-color="black" data-image="../../assets/img/fundo.jpg">
            
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
                    <ul class="nav">
                        <li>
                            <a href="home.php">
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
                                    <li  class="active">
                                        <a href="funcionarios.php">Funcionários</a>
                                    </li>
                                    <li>
                                        <a href="clientes.php">Clientes</a>
                                    </li>
                                    <li>
                                        <a href="produtos.php">Produtos</a>
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
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>                        
                        </div>                    
                    </div>
                </nav>           
                <div class="content">
                    <div class="container-fluid">

                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="orange">
                                <i class="material-icons">assignment</i>
                            </div>
                            <div class="card-content clearfix">
                                <h4 class="pull-left">Funcionários</h4>
                                
                                <div class="cabecalho-pagina card-action pull-right">
                                    <div class="cabecalho-pagina-direito">
                                        <div class="form-group botoes-com-acao clearfix">                                       
                                            <button type="button" name="btn-adicionar"  id="btn-adicionar" class="btn btn-warning btn-adicionar btn-round btn-fab btn-fab-mini" title="Adicionar"><i class="material-icons">add</i></button>                                        
                                        </div>
                                    </div>
                                </div>

                                <div class="area-tabela tabela-float">
                                    <div id="card-content table-responsive table-full-width">
                                        <table class="table table-striped table-hover table-filters">
                                            <thead>
                                                <th>Nome</th>
                                                <th>E-mail</th>
                                                <th>Ações</th>
                                            </thead>
                                            <tbody id="dados-funcionario">
                                                
                                            </tbody>
                                        </table>
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
                            <a href="#">DevNaNeve</a>, todos os direitos reservados.
                        </p>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade2" id="modal-cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-left: 17px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <fieldset class="div-interna-cadastro">
                            <form id="form-modal-cadastro" class="form-horizontal ajuste-icon fv-form fv-form-bootstrap" novalidate="novalidate">
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="orange">
                                        <i class="material-icons">playlist_add</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Cadastro</h4>

                                        <input type="hidden" name="codigo_fun" class="codigo" id="codigo_fun" value="0" />

                                        <div class="form-group is-empty has-feedback">
                                            <?php $campo = "nome_fun"; ?>
                                            <label for="<?= $campo ?>" class="control-label col-sm-3">Nome:</label>
                                            <div class="col-xs-8 input-icon icone-input-alinhado-2 input-modal-mobile-1">
                                                <input type="text" name="<?= $campo ?>" id="<?= $campo ?>" maxlength="100" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group is-empty has-feedback">
                                            <?php $campo = "email_fun"; ?>
                                            <label for="<?= $campo ?>" class="control-label col-sm-3">E-mail:</label>
                                            <div class="col-xs-8 input-icon icone-input-alinhado-2 input-modal-mobile-1">
                                                <input type="text" name="<?= $campo ?>" id="<?= $campo ?>" maxlength="100" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group is-empty has-feedback">
                                            <?php $campo = "senha_fun"; ?>
                                            <label for="<?= $campo ?>" class="control-label col-sm-3">Senha:</label>
                                            <div class="col-xs-8 input-icon icone-input-alinhado-2 input-modal-mobile-1">
                                                <input type="password" name="<?= $campo ?>" id="<?= $campo ?>" maxlength="100" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group is-empty has-feedback">
                                            <?php $campo = "codigo_gru"; ?>
                                            <label for="<?= $campo ?>" class="control-label col-sm-3">Grupo:</label>
                                            <div class="col-xs-8 input-icon icone-input-alinhado-2 input-modal-mobile-1">
                                                <select name="<?= $campo ?>" id="<?= $campo ?>" class="form-control" >
                                                    <option value="1">Gerência</option>
                                                    <option value="2">Administrativo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="botoes-cadastro-modal" style="text-align: center;">
                                        <button type="submit" class="btn btn-success"> <i class="material-icons">check</i> Salvar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="material-icons">close</i> Cancelar </button>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Modal -->

        <!-- Core JS Files -->
        <script src="../../assets/js/padrao/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../../assets/js/padrao/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../../assets/js/padrao/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../assets/js/padrao/material.min.js" type="text/javascript"></script>
        <script src="../../assets/js/padrao/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
        <!-- Forms Validations Plugin -->
        <script src="../../assets/js/padrao/jquery.validate.min.js"></script>
        <!-- Form Validation -->
        <script src="../../assets/js/plugins/formvalidation/formValidation.min.js"></script>
        <script src="../../assets/js/plugins/formvalidation/framework/bootstrap.min.js"></script>
        <script src="../../assets/js/plugins/formvalidation/language/pt_BR.js"></script>
        <!-- Plugin for Date Time Picker and Full Calendar Plugin-->
        <script src="../../assets/js/padrao/moment.min.js"></script>
        <!-- Charts Plugin -->
        <script src="../../assets/js/padrao/chartist.min.js"></script>
        <!-- Plugin for the Wizard -->
        <script src="../../assets/js/padrao/jquery.bootstrap-wizard.js"></script>
        <!-- Notifications Plugin -->
        <script src="../../assets/js/padrao/bootstrap-notify.js"></script>
        <!-- DateTimePicker Plugin -->
        <script src="../../assets/js/padrao/bootstrap-datetimepicker.js"></script>
        <!-- Vector Map plugin -->
        <script src="../../assets/js/padrao/jquery-jvectormap.js"></script>
        <!-- Sliders Plugin -->
        <script src="../../assets/js/padrao/nouislider.min.js"></script>
        <!-- Select Plugin -->
        <script src="../../assets/js/padrao/jquery.select-bootstrap.js"></script>
        <!-- DataTables.net Plugin -->
        <script src="../../assets/js/padrao/jquery.datatables.js"></script>
        <!-- Sweet Alert plugin -->
        <script src="../../assets/js/plugins/sweetalert/sweetalert.min.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="../../assets/js/padrao/jasny-bootstrap.min.js"></script>
        <!-- Full Calendar Plugin  -->
        <script src="../../assets/js/padrao/fullcalendar.min.js"></script>
        <!-- TagsInput Plugin -->
        <script src="../../assets/js/padrao/jquery.tagsinput.js"></script>
        <!-- Material Dashboard javascript methods -->
        <script src="../../assets/js/padrao/material-dashboard.js"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="../../assets/js/padrao/demo.js"></script>
        <!-- Custom JS -->
        <script src="../../assets/js/paginas/funcionario.js"></script>
        <!-- Mascara -->
        <script src="../../assets/js/plugins/jquery-mask/jquery.mask.min.js"></script>
        <script src="../../assets/js/plugins/util/mascara.js"></script>
    </body>
</html>