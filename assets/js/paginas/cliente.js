listar_cliente();

$(document).ready(function() {

    //mostrar_carregando();    

    /** Abrir o modal de cadastro de produto */
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
            nome_cli: {
                validators: {
                    notEmpty: {
                        message: "O campo Nome é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            datanascimento_cli: {
                validators: {
                    notEmpty: {
                        message: "O campo Data de Nascimento é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            telefone_cli: {
                validators: {
                    notEmpty: {
                        message: "O campo Telefone é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            celular_cli: {
                validators: {
                    notEmpty: {
                        message: "O campo Celular é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            cpf_cli: {
                validators: {
                    notEmpty: {
                        message: "O campo CPF é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            rg_cli: {
                validators: {
                    notEmpty: {
                        message: "O campo RG é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            logradouro_cli: {
                validators: {
                    notEmpty: {
                        message: "O campo Logradouro é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            numero_cli: {
                validators: {
                    notEmpty: {
                        message: "O campo Número é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            bairro_cli: {
                validators: {
                    notEmpty: {
                        message: "O campo Bairro é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            }
        }
    }).on("success.form.fv", function(e) {
        e.preventDefault();

        var codigo_cli = $("#codigo_cli").val();

        if(codigo_cli > 0) {
            /** Alterar */
            $.ajax({
                type: "POST",
                url: "../../classes/painel/ajax/cliente/alterar_cliente_ajax.php",
                data: {
                    codigo_cli: codigo_cli,
                    nome_cli: $("#nome_cli").val(),
                    datanascimento_cli: $("#datanascimento_cli").val(),
                    telefone_cli: $("#telefone_cli").val(),
                    celular_cli: $("#celular_cli").val(),
                    email_cli: $("#email_cli").val(),
                    cpf_cli: $("#cpf_cli").val(),
                    rg_cli: $("#rg_cli").val(),
                    logradouro_cli: $("#logradouro_cli").val(),
                    numero_cli: $("#numero_cli").val(),
                    bairro_cli: $("#bairro_cli").val(),
                    complemento_cli: $("#complemento_cli").val(),
                    codigo_cid: $("#codigo_cid").val()
                },
                dataType: "json",
                success: function(data) {
                    swal({title: "Sucesso", text:  "Cliente salvo", type:  "success"});

                    limpar_formulario("form-modal-cadastro");
                    listar_cliente();

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
                url: "../../classes/painel/ajax/cliente/inserir_cliente_ajax.php",
                data: {
                    nome_cli: $("#nome_cli").val(),
                    datanascimento_cli: $("#datanascimento_cli").val(),
                    telefone_cli: $("#telefone_cli").val(),
                    celular_cli: $("#celular_cli").val(),
                    email_cli: $("#email_cli").val(),
                    cpf_cli: $("#cpf_cli").val(),
                    rg_cli: $("#rg_cli").val(),
                    logradouro_cli: $("#logradouro_cli").val(),
                    numero_cli: $("#numero_cli").val(),
                    bairro_cli: $("#bairro_cli").val(),
                    complemento_cli: $("#complemento_cli").val(),
                    codigo_cid: $("#codigo_cid").val()
                },
                dataType: "json",
                success: function(data) {
                    swal({title: "Sucesso", text:  "Cliente salvo", type:  "success"});

                    limpar_formulario("form-modal-cadastro");
                    listar_cliente();

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
    var codigo_cli = $(this).data("codigo");

    $.ajax({
        type: "POST",
        url: "../../classes/painel/ajax/cliete/buscar_cliente_ajax.php",
        data: {codigo_cli: codigo_cli},
        dataType: "json",
        success: function(data) {
            if(data.retorno) {                
                $("#codigo_cli").val(data.dados.codigo_cli);
                $("#nome_cli").val(data.dados.nome_cli),
                $("#datanascimento_cli").val(data.dados.datanascimento_cli),
                $("#telefone_cli").val(data.dados.telefone_cli),
                $("#celular_cli").val(data.dados.celular_cli),
                $("#email_cli").val(data.dados.email_cli),
                $("#cpf_cli").val(data.dados.cpf_cli),
                $("#rg_cli").val(data.dados.rg_cli),
                $("#logradouro_cli").val(data.dados.logradouro_cli),
                $("#numero_cli").val(data.dados.numero_cli),
                $("#bairro_cli").val(data.dados.bairro_cli),
                $("#complemento_cli").val(data.dados.complemento_cli),

                $("#codigo_cid").val(data.dados.codigo_cid)

                $("#modal-cadastro").modal("show");
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});

$(document).on("click", ".btn-deletar", function() {
    var codigo_cli = $(this).data("codigo");

    swal({        
        title: "Deletar",
        text: "Deseja mesmo deletar esse cliente?",
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
            url: "../../classes/painel/ajax/cliente/deletar_cliente_ajax.php",
            data: {codigo_cli: codigo_cli},
            dataType: "json",
            success: function(data) {
                listar_cliente();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});

/** Listar os clientes cadastrados */
function listar_cliente() {
    $.ajax({
        type: "GET",
        url: "../../classes/painel/ajax/cliente/listar_cliente_ajax.php",
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
                var alterar = "<button name='btn-alterar' class='btn btn-simple btn-success btn-icon btn-alterar like' rel='tooltip' data-original-title='Alterar' data-codigo='" + dados[i].codigo_cli + "' style='float: left;margin-right: 3px;padding: 5px;display: block;'><i class='material-icons'>create</i></button>";
                var deletar = "<button name='btn-deletar' class='btn btn-simple btn-danger btn-icon btn-deletar like' rel='tooltip' data-original-title='Deletar' data-codigo='" + dados[i].codigo_cli + "' style='float: left;margin-right: 3px;padding: 5px;display: block;'><i class='material-icons'>close</i></button>";
                
                var endereco = dados[i].logradouro_cli + ", " + dados[i].numero_cli + " - " + dados[i].bairro_cli + " - " + dados[i].nome_cid + "-" + dados[i].uf_est;

                var acoes = alterar + deletar;

                html += "<tr>" +
                            "<td>" + dados[i].nome_cli + "</td>" +
                            "<td>" + dados[i].telefone_cli + "</td>" +
                            "<td>" + dados[i].celular_cli + "</td>" +
                            "<td>" + endereco + "</td>" +
                            "<td>" + acoes + "</td>" +
                        "</tr>";
            }

            $("#dados-cliente").html(html);
        } else {
            html = "<tr><td colspan='4' style='text-align: center;'>Nenhum registro encontrado!</td></tr>";
        }
    } else {
        $("#dados-cliente").html(html);
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