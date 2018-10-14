$(document).ready(function() {

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

    });

});

$(document).on("click", "#btn-alterar", function() {
    $("#modal-cadastro").modal("show");
});