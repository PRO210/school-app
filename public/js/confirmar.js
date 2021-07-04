//
//Confirmar se pode salvar
function confirmar() {
    var u = $('#usuario').val();
    var r = confirm("Já Posso Enviar " + u + "? ");
    if (r == true) {
        return true;
    } else {
        return false;
    }
}
//
//Confirmar se pode atualizar os dados
function atualizar() {
    var u = $('#usuario').val();
    var r = confirm("Já Posso Atualizar os Dados  " + u + "? ");
    if (r == true) {
        return true;
    } else {
        return false;
    }
}
//Confirmar se pode excluir os dados
function excluir() {
    var u = $('#usuario').val();
    var r = confirm("Já Posso Excluir os Dados  " + u + "? ");
    if (r == true) {
        return true;
    } else {
        return false;
    }
}

