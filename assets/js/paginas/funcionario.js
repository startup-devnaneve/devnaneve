listar_funcionario();

$(document).ready(function() {

    //mostrar_carregando();    

    /** Abrir o modal de cadastro de funcionario */
    $("#btn-adicionar").click(function() {
        $("#modal-cadastro").modal("show");
    });

    $("#form-modal-cadastro").formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nome_fun: {
                validators: {
                    notEmpty: {
                        message: "O campo Nome é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            email_pro: {
                validators: {
                    notEmpty: {
                        message: "O campo E-mail é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            senha_pro: {
                validators: {
                    notEmpty: {
                        message: "O campo Senha é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            codigo_gru: {
                validators: {
                    notEmpty: {
                        message: "O campo Grupo é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            }
        }
    }).on("success.form.fv", function(e) {
        e.preventDefault();

        var codigo_fun = $("#codigo_fun").val();

        if(codigo_fun > 0) {
            /** Alterar */
            $.ajax({
                type: "POST",
                url: "../../classes/painel/ajax/funcionario/alterar_funcionario_ajax.php",
                data: {
                    codigo_fun: codigo_fun,
                    nome_fun: $("#nome_fun").val(),
                    email_fun: $("#email_fun").val(),
                    senha_fun: $("#senha_fun").val(),
                    codigo_gru: $("#codigo_gru").val()
                },
                dataType: "json",
                success: function(data) {
                    swal({title: "Sucesso", text: "Funcionário salvo", type: "success"});

                    limpar_formulario("form-modal-cadastro");
                    listar_funcionario();

                    $("#modal-cadastro").modal("hide");
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            /** Inserir */
            $.ajax({
                type: "POST",
                url: "../../classes/painel/ajax/funcionario/inserir_funcionario_ajax.php",
                data: {
                    nome_fun: $("#nome_fun").val(),
                    email_fun: $("#email_fun").val(),
                    senha_fun: $("#senha_fun").val(),
                    codigo_gru: $("#codigo_gru").val()
                },
                dataType: "json",
                success: function(data) {
                    swal({title: "Sucesso", text: "Funcionário salvo", type: "success"});

                    limpar_formulario("form-modal-cadastro");
                    listar_funcionario();

                    $("#modal-cadastro").modal("hide");
                }, 
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });

});

$(document).on("click", ".btn-alterar", function() {
    var codigo_fun = $(this).data("codigo");

    $.ajax({
        type: "POST",
        url: "../../classes/painel/ajax/funcionario/buscar_funcionario_ajax.php",
        data: {codigo_fun: codigo_fun},
        dataType: "json",
        success: function(data) {
            if(data.retorno) {
                $("#codigo_fun").val(data.dados.codigo_fun);
                $("#nome_fun").val(data.dados.nome_fun);
                $("#email_fun").val(data.dados.email_fun);
                $("#senha_fun").val(data.dados.senha_fun);
                $("#codigo_gru").val(data.dados.codigo_gru);

                $("#modal-cadastro").modal("show");
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});

$(document).on("click", ".btn-deletar", function() {
    var codigo_fun = $(this).data("codigo");

    swal({        
        title: "Deletar",
        text: "Deseja mesmo deletar esse funcionário?",
        html: true,
        type: "warning",
        showCancelButton: true,
        //confirmButtonColor: "#18a689",
        confirmButtonText: "Deletar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true,
        allowOutsideClick: true
    },
    function () {
        //mostrar_carregando();

        $.ajax({
            type: "POST",
            url: "../../classes/painel/ajax/funcionario/deletar_funcionario_ajax.php",
            data: {codigo_fun: codigo_fun},
            dataType: "json",
            success: function(data) {
                listar_funcionario();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});

/** Listar os funcionários cadastrados */
function listar_funcionario() {
    $.ajax({
        type: "GET",
        url: "../../classes/painel/ajax/funcionario/listar_funcionario_ajax.php",
        dataType: "json",
        success: function(data) {
            montar_tabela(data.dados);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

/** Montar as colunas da tabela com os dados retornado */
function montar_tabela(dados) {
    var html = "<tr><td colspan='4' style='text-align: center;'>Nenhum registro encontrado!</td></tr>";

    if(dados !== undefined) {
        var tam = dados.length;

        if(tam > 0) {
            html = "";

            for(var i = 0; i < tam; i++) {
                var alterar = "<button name='btn-alterar' class='btn btn-simple btn-success btn-icon btn-alterar like' rel='tooltip' data-original-title='Alterar' data-codigo='" + dados[i].codigo_fun + "' style='float: left;margin-right: 3px;padding: 5px;display: block;'><i class='material-icons'>create</i></button>";
                var deletar = "<button name='btn-deletar' class='btn btn-simple btn-danger btn-icon btn-deletar like' rel='tooltip' data-original-title='Deletar' data-codigo='" + dados[i].codigo_fun + "' style='float: left;margin-right: 3px;padding: 5px;display: block;'><i class='material-icons'>close</i></button>";
                
                var acoes = alterar + deletar;

                html += "<tr>" +
                            "<td>" + dados[i].nome_fun + "</td>" +
                            "<td>" + dados[i].email_fun + "</td>" +
                            "<td>" + acoes + "</td>" +
                        "</tr>";
            }

            $("#dados-funcionario").html(html);
        } else {
            html = "<tr><td colspan='4' style='text-align: center;'>Nenhum registro encontrado!</td></tr>";
        }
    } else {
        $("#dados-funcionario").html(html);
    }

}

/** Mostrar Carregando */
function mostrar_carregando() {
    $(".pesquisando").show();
}

/** Fechar Carregando */
function fechar_carregando() {
    $(".pesquisando").hide();
}

/** 
 * Limpa o formulário passado por parâmetro
 * */
function limpar_formulario(formulario) {
    $("# "+formulario+"").each (function(){
        this.reset();
    });
}