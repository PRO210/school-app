
//
//Deixa os checkbox mais bonitos
 /* $(document).ready(function() {
    $(":checkbox").wrap(
        "<span style='background-color:burlywood;padding: 4px; border-radius: 3px;padding-bottom: 4px;'>"
    );
}); */

//Marcar ou Desmarcar todos os checkbox
$(document).ready(function() {
   
    $('#selecionar').click(function() {

        if (this.checked) {
            $('.checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkbox').each(function() {
                this.checked = false;
            });
        }
    });
});
