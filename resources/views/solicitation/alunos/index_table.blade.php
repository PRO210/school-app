<link rel="stylesheet" href='{{ url('datatablesCss/bootstrap.min.css') }}'>
<link rel="stylesheet" href='{{ url('datatablesCss/bootstrap.css') }}'>
<link rel="stylesheet" href='{{ url('datatablesCss/dataTables.bootstrap4.min.css') }}'>
<link rel="stylesheet" href='{{ url('datatablesCss/responsive.bootstrap4.min.css') }}'>

<!-- jQuery -->
<script src='{{ url('js/jquery-3.5.1.js') }}' type="text/javascript"></script>

{{-- DataTable Js --}}
<script src='{{ url('dataTablesJs/jquery.dataTables.min.js') }}' type="text/javascript"></script>
<script src='{{ url('dataTablesJs/dataTables.bootstrap4.min.js') }}' type="text/javascript"></script>
<script src='{{ url('dataTablesJs/dataTables.responsive.min.js') }}' type="text/javascript"></script>
<script src='{{ url('dataTablesJs/responsive.bootstrap4.min.js') }}' type="text/javascript"></script>

<script src="{{ url('js/alunos/index.js') }}"></script>
<script src="{{ url('bootstrap-4/js/popper.min.js') }}"></script>
<script src="{{ url('bootstrap-4/js/bootstrap.min.js') }}"></script>


<script>
   $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#example tfoot th').each(function() {
         var title = $(this).text();
         $(this).html('<input type="text" placeholder="' + title + '" />');
      });
      var table = $('#example').DataTable({

         "columnDefs": [{
            "targets": [0, 1],
            "orderable": false
         }],
         "lengthMenu": [
            [7, 10, 15, 20, 25, 30, 35, 40, 50, 70, 100, -1],
            [7, 10, 15, 20, 25, 30, 35, 40, 50, 70, 100, "All"]
         ],
         "language": {
            "lengthMenu": " _MENU_ <button type= 'subimit' class='btn btn-outline-info'>Editar em Bloco</button>",
            "zeroRecords": "Nenhum aluno encontrado",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Sem registros",
            "search": "Busca:",
            "infoFiltered": "(filtrado de _MAX_ total de alunos)",
            "paginate": {
               "first": "Primeira",
               "last": "Ultima",
               "next": "Proxima",
               "previous": "Anterior"
            },
         },
      });
      // Apply the search
      table.columns().every(function() {
         var that = this;
         $('input', this.footer()).on('keyup change', function() {
            if (that.search() !== this.value) {
               that
                  .search(this.value)
                  .draw();
            }
         });
      });
   });

</script>
