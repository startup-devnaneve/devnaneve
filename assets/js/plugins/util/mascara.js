$(document).ready(function () {
    $('.ano').mask('99/99');
    $('.placa').mask('SSS-9999');
    $('.cep').mask('99999-999');
    $('.cep2').mask('99999-999');
    $('.cep3').mask('99999-999');
    $('.cpf').mask('999.999.999-99');
    $('.data').mask('99/99/9999');
    /*$('.telefone').mask("(99)9999-9999");*/
    $(".data_hora").mask("99/99/9999 99:99:99");
    $(".hora").mask("99:99:99");
    $(".cnpj").mask('99.999.999/9999-99');
    $('.socio').keyup(function (e) {
        $(this).val(mascara_global('##.##', $(this).val()));
    });

    //$(".telefone").mask("(99)99999-9999");


    $('.numero').keyup(verificaNumero);
	
    $('.preco').keyup(function(){
            $(this).val(mascara_global('[###.]###,##', $(this).val()));
    });
        
    $('.valor').attr('maxlenght', 13);
    $('.valor').keyup(function (e) {
        $(this).val(mascara_global('[###.]###,##', $(this).val()));
    });    
});

function maiuscula(obj){
    obj.value = obj.value.toUpperCase();
}

function mascara_global(mascara, valor) {
    if (mascara == '###.###.###-##|##.###.###/####-##') {
        if (valor.length > 14) {
            return mascara_global('##.###.###/####-##', valor);
        } else {
            return mascara_global('###.###.###-##', valor);
        }
    }

    tvalor = "";
    ret = "";
    caracter = "#";
    separador = "|";
    mascara_utilizar = "";
    valor = removeEspacos(valor);
    if (valor == "") return valor;
    temp = mascara.split(separador);
    dif = 1000;

    valorm = valor;
    //tirando mascara do valor já existente
    for (i = 0; i < valor.length; i++) {
        if (!isNaN(valor.substr(i, 1))) {
            tvalor = tvalor + valor.substr(i, 1);
        }
    }

    valor = tvalor;

    //formatar mascara dinamica
    for (i = 0; i < temp.length; i++) {
        mult = "";
        validar = 0;
        for (j = 0; j < temp[i].length; j++) {
            if (temp[i].substr(j, 1) == "]") {
                temp[i] = temp[i].substr(j + 1);
                break;
            }
            if (validar == 1) mult = mult + temp[i].substr(j, 1);
            if (temp[i].substr(j, 1) == "[") validar = 1;
        }
        for (j = 0; j < valor.length; j++) {
            temp[i] = mult + temp[i];
        }
    }

    //verificar qual mascara utilizar
    if (temp.length == 1) {
        mascara_utilizar = temp[0];
        mascara_limpa = "";
        for (j = 0; j < mascara_utilizar.length; j++) {
            if (mascara_utilizar.substr(j, 1) == caracter) {
                mascara_limpa = mascara_limpa + caracter;
            }
        }
        tam = mascara_limpa.length;
    } else {
        //limpar caracteres diferente do caracter da máscara
        for (i = 0; i < temp.length; i++) {
            mascara_limpa = "";
            for (j = 0; j < temp[i].length; j++) {
                if (temp[i].substr(j, 1) == caracter) {
                    mascara_limpa = mascara_limpa + caracter;
                }
            }
            if (valor.length > mascara_limpa.length) {
                if (dif > (valor.length - mascara_limpa.length)) {
                    dif = valor.length - mascara_limpa.length;
                    mascara_utilizar = temp[i];
                    tam = mascara_limpa.length;
                }
            } else if (valor.length < mascara_limpa.length) {
                if (dif > (mascara_limpa.length - valor.length)) {
                    dif = mascara_limpa.length - valor.length;
                    mascara_utilizar = temp[i];
                    tam = mascara_limpa.length;
                }
            } else {
                mascara_utilizar = temp[i];
                tam = mascara_limpa.length;
                break;
            }
        }
    }

    //validar tamanho da mascara de acordo com o tamanho do valor
    if (valor.length > tam) {
        valor = valor.substr(0, tam);
    } else if (valor.length < tam) {
        masct = "";
        j = valor.length;
        for (i = mascara_utilizar.length - 1; i >= 0; i--) {
            if (j == 0) break;
            if (mascara_utilizar.substr(i, 1) == caracter) {
                j--;
            }
            masct = mascara_utilizar.substr(i, 1) + masct;
        }
        mascara_utilizar = masct;
    }

    //mascarar
    j = mascara_utilizar.length - 1;
    for (i = valor.length - 1; i >= 0; i--) {
        if (mascara_utilizar.substr(j, 1) != caracter) {
            ret = mascara_utilizar.substr(j, 1) + ret;
            j--;
        }
        ret = valor.substr(i, 1) + ret;
        j--;
    }
    return ret;
}

function removeEspacos(valor) {
    var valorSemEspacos = "";

    var tamanho = valor.length;
    for (i = 0; i < 30; i++) {
        if (valor.substr(i, 1) == " ") {
        } else {
            valorSemEspacos = valorSemEspacos + valor.substr(i, 1);
        }
    }
    return valorSemEspacos;
}

function verificaNumero(e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
}

function mascara(o,f){
    v_obj=o;
    v_fun=f;
    setTimeout("execmascara()",1);
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value);
}
function mtel(v){
    v = v.replace(/\D/g,"");
    v = v.replace(/^(\d{2})(\d)/g,"($1) $2");
    v = v.replace(/(\d)(\d{4})$/,"$1-$2");
    return v;
}