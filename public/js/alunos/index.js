//Deixa os checkbox mais bonitos
$(document).ready(function () {
    $(":checkbox").wrap("<span style='background-color:burlywood;padding: 3px; border-radius: 3px;padding-bottom: 4px;'>");
});

//Marcar ou Desmarcar todos os checkbox
$(document).ready(function () {
    $('#selecionar').click(function () {
        if (this.checked) {
            $('.checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkbox').each(function () {
                this.checked = false;
            });
        }
    });
});

//Valida os checbox para editar em bloco
$(document).ready(function () {
    $('input[type=checkbox]').on('change', function () {
        var total = $('input[type=checkbox]:checked').length;
        if (total > 0) {
            $('#btEditBloc').removeAttr('disabled');
        } else {
            $('#btEditBloc').attr('disabled', 'disabled');
        }
    });
});


/* $(document).ready(function () {

    $(".btDropdown").click(function () {

        var id = $(this).attr('id');
        var btClasse = $("#" + id + "").hasClass("active");
        var value = $(this).val();

        if (btClasse) {
            alert('retira')
            $(this).removeClass('active');
            $("." + value + "").addClass('hidden');

        } else {
            alert('coloca')
            $.each($('.btDropdown'), function (index, element) {

                if ($(element).hasClass('active')) {
                    var id = $(this).attr('id')
                    var val = $(this).attr('value')
                    $("." + val + "").addClass('hidden');
                    $("#" + id + "").removeClass('active');
                    return false;
                }
            });

            $("#" + id + "").addClass('active');
            $("." + value + "").removeClass('hidden');
        }

    });
}); */
/* http://www.linhadecodigo.com.br/artigo/3531/filtrando-elementos-com-jquery.aspx
https://desenvolvedorinteroperavel.wordpress.com/2011/10/22/utilizando-o-seletor-each-do-jquery-para-percorrer-elementos/

 */
