listar_produto();

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
            nome_pro: {
                validators: {
                    notEmpty: {
                        message: "O campo Produto é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            quantidade_pro: {
                validators: {
                    notEmpty: {
                        message: "O campo Quantidade é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            },
            valor_pro: {
                validators: {
                    notEmpty: {
                        message: "O campo Valor é obrigatório. Por favor, preencha o mesmo."
                    }
                }
            }
        }
    }).on("success.form.fv", function(e) {
        e.preventDefault();

        var codigo_pro = $("#codigo_pro").val();

        if(codigo_pro > 0) {
            /** Alterar */
            $.ajax({
                type: "POST",
                url: "../../classes/painel/ajax/produto/alterar_produto_ajax.php",
                data: {
                    codigo_pro: codigo_pro,
                    nome_pro: $("#nome_pro").val(),
                    quantidade_pro: $("#quantidade_pro").val(),
                    valor_pro: $("#valor_pro").val()                    
                },
                dataType: "json",
                success: function(data) {
                    swal({
                        title: "Sucesso",
                        text:  "Produto cadastrado",
                        type:  "success",                    
                        confirmButtonText: "Ok"
                    }).then((result) => {
                        if(result.value) {
                            location.reload();
                        }
                    });
                }, 
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            /** Inserir */
            $.ajax({
                type: "POST",
                url: "../../classes/painel/ajax/produto/inserir_produto_ajax.php",
                data: {
                    nome_pro: $("#nome_pro").val(),
                    quantidade_pro: $("#quantidade_pro").val(),
                    valor_pro: $("#valor_pro").val()
                },
                dataType: "json",
                success: function(data) {
                    swal({title: "Sucesso", text:  "Produto cadastrado", type:  "success"});
                    listar_produto();
                }, 
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });

});

$(document).on("click", ".btn-alterar", function() {
    var codigo_pro = $(this).data("codigo");

    $.ajax({
        type: "POST",
        url: "../../classes/painel/ajax/produto/buscar_produto_ajax.php",
        data: {codigo_pro: codigo_pro},
        dataType: "json",
        success: function(data) {
            if(data.retorno) {
                console.log(data.dados);

                $("#modal-cadastro").modal("show");
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});

$(document).on("click", ".btn-deletar", function() {
    swal({
        title: "Deletar",
        text: "Deseja deletar esse produto?",
        type: "info",
        showCancelButton: true,        
        confirmButtonText: "Deletar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true,
        allowOutsideClick: true
    },
    function () {
        swal("Ok", 'Excluido!', "success");
    });
});

/** Listar os produtos cadastrados */
function listar_produto() {
    $.ajax({
        type: "GET",
        url: "../../classes/painel/ajax/produto/listar_produto_ajax.php",
        dataType: "json",
        success: function(data) {
            if(data.retorno) {
                montar_tabela(data.dados)
                fechar_carregando();
            } else {
                console.log("Nada");
                fechar_carregando();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

/** Montar as colunas da tabela com os dados retornado */
function montar_tabela(dados) {
    var html = "<tr><td colspan='4'>Nenhum registro encontrado!</td></tr>";

    if(dados !== undefined) {
        var tam = dados.length;

        if(tam > 0) {
            html = "";

            for(var i = 0; i < tam; i++) {
                var alterar = "<button name='btn-alterar' class='btn btn-simple btn-success btn-icon btn-alterar like' rel='tooltip' data-original-title='Alterar' data-codigo='" + dados[i].codigo_pro + "' style='float: left;margin-right: 3px;padding: 5px;display: block;'><i class='material-icons'>create</i></button>";
                var deletar = "<button name='btn-deletar' class='btn btn-simple btn-danger btn-icon btn-deletar like' rel='tooltip' data-original-title='Deletar' data-codigo='" + dados[i].codigo_pro + "' style='float: left;margin-right: 3px;padding: 5px;display: block;'><i class='material-icons'>close</i></button>";
                
                var acoes = alterar + deletar;

                html += "<tr>" +
                            "<td>" + dados[i].nome_pro + "</td>" +
                            "<td>" + dados[i].quantidade_pro + "</td>" +
                            "<td>" + dados[i].valor_pro + "</td>" +
                            "<td>" + acoes + "</td>" +
                        "</tr>";
            }

            $("#dados-produto").html(html);
        } else {
            $("#dados-produto").html(html);
        }
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