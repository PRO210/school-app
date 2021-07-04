<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Alunos-Turma</title>
   <!-- Fonts -->
   <link rel="stylesheet" href="{{ url('css/css2.css') }}">

   <!-- Styles -->
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

   <style>
      .checkbox {
         display: inline-block !important;
      }

      tfoot input {
         width: 100%;
         padding: 3px;
         box-sizing: border-box;

      }

      .btn-outline-info {
         color: #007bff;
         background-color: transparent;
         background-image: none;
         border-color: #007bff !important;

      }

      /* .btn:hover {
            background-color: #007bff !important;
            transform: rotate(180deg);
            /* transition: 150ms; */
      }


      /*  .btn-outline-info:not(:disabled):not(.disabled):active,
        .btn-outline-info:not(:disabled):not(.disabled).active,
        .show>.btn-outline-info.dropdown-toggle
         {
            background-color: #007bff !important;
        }
        */

      .dropdown-item:hover {
         /* background-color: #007bff !important; */
         /* background-color: #818cf8 !important; */

      }

      svg {
         display: inline-block !important;
      }

      .btDropdown {
         padding: 4px !important;
         margin-top: -4px !important;
      }

      table.table-bordered.dataTable tbody th,
      table.table-bordered.dataTable tbody td {
      padding: 6px !important
      }

   </style>

   <link rel="stylesheet" href='{{ url('datatablesCss/bootstrap.min.css') }}'>
   <link rel="stylesheet" href='{{ url('datatablesCss/bootstrap.css') }}'>
   <link rel="stylesheet" href='{{ url('datatablesCss/dataTables.bootstrap4.min.css') }}'>
   <link rel="stylesheet" href='{{ url('datatablesCss/responsive.bootstrap4.min.css') }}'>

   <!-- Scripts -->
   {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

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
               "lengthMenu": " _MENU_ <button type= 'subimit' class='btn btn-outline-info' disabled id = 'btEditBloc' title = 'Marque ao menos uma caixinha'>Editar em Bloco</button>",
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

</head>
<body>

   @include('layouts.navigation')

   @include('includes.alerts')

   <div class="container-fluid" style="margin-top: 12px">
      {{-- <div class="xs: bg-blue-700  sm:bg-gray-900  md:bg-red-600 h-3 mx-8">
            <div class="teste h-3"></div>
        </div> --}}
      <form action="{{ route('turmas.aluno.edit.bloco') }}" method="POST" class="form" name="form">
         @csrf
         <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
            <thead>
               <tr>
                  <th style="width: 40px !important">
                     <span><input type='checkbox' id="selecionar"></span>
                  </th>
                  <th class="whitespace-normal sm:whitespace-nowrap md:whitespace-nowrap">ALUNO</th>
                  <th>TURMA</th>
                  <th>INEP</th>
                  <th>NIS</th>
                  <th>MAT. CERTIDÃO</th>
                  <th>STATUS</th>
                  <th>MÃE</th>
                  <th>PAI</th>
            </thead>
            <tbody>
               @foreach ($alunoTurmas as $keydrop => $aluno)
                  @foreach ($aluno->turmas as $Key => $turma)
                  @endforeach
                  <tr>
                     <td>
                        {{-- Em branco --}}
                     </td>
                     <td class="">
                        <!-- Example split danger button -->
                        <div class="dropdown ">
                           <button type="button" class="btDropdown btn btn-outline-info dropdown-toggle dropdown-toggle-split " data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">
                           </button>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('alunos.edit', ['uuid' => $aluno->uuid]) }}" target='_self' title='Alterar o Cadastro'>
                                 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                       d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                                    <path fill-rule="evenodd"
                                       d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                                 </svg>
                                 <b>&nbsp;&nbsp;
                                    Alterar o Cadastro
                                 </b>
                              </a>
                              <a class="dropdown-item" href="{{ route('turmas.aluno.show', ['uuid' => $aluno->uuid]) }}" target='_self' title='Incluir na Turma'>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
                                    <path
                                       d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z" />
                                 </svg>&nbsp;&nbsp;

                                 <b>Incluir/Retirar Turma</b>
                              </a>
                              <a class="dropdown-item" href="{{ route('transferencias.create', ['uuid' => $aluno->uuid, 'id' => $turma->id]) }}" target='_self'
                                 title='Solicitar Transferência'>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stickies" viewBox="0 0 20 20">
                                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                    <path
                                       d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                                 </svg>&nbsp;&nbsp;
                                 <b>Solicitar Transferência</b>
                              </a>
                              <a class="dropdown-item" href="{{ route('turmas.aluno.PdfMatricula', ['uuid' => $aluno->uuid, 'id' => $turma->id]) }}" target='_self'
                                 title='Solicitar Transferência'>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                    <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                  </svg>&nbsp;&nbsp;
                                  <b>Matricula</b>
                              </a>
                              {{-- <div class="dropdown-divider"></div> --}}
                           </div>
                           &nbsp;<span><input type='checkbox' name='aluno_selecionado[]' for='NOME' class='checkbox' value='{{ $aluno->uuid }}/{{ $turma->id }}'></span>
                           &nbsp;<span class="whitespace-normal sm:whitespace-nowrap md:whitespace-nowrap">{{ $aluno->NOME }}</span>
                        </div>
                     </td>
                     <td class="whitespace-nowrap">{{ $turma->TURMA }} {{ $turma->UNICO }}
                        ({{ $turma->TURNO }}) -
                        {{ \Carbon\Carbon::parse($turma->ANO)->format('Y') }}
                     </td>
                     <td>{{ $aluno->INEP }}</td>
                     <td>{{ $aluno->NIS }}</td>
                     <td class="whitespace-nowrap">{{ $aluno->MATRICULA_CERTIDAO }}</td>
                     <td>
                        @foreach ($classifications as $classification)
                           @if ($turma->pivot->classification_id == " $classification->id")
                              {{ $classification->STATUS }}
                           @endif
                        @endforeach
                     </td>
                     <td>{{ $aluno->MAE }}</td>
                     <td>{{ $aluno->PAI }}</td>
                  </tr>
               @endforeach
            </tbody>
            <tfoot>
               <tr>
                  <th style=" width: 60px !important"></th>
                  <th>ALUNO</th>
                  <th>TURMA</th>
                  <th>INEP</th>
                  <th>NIS</th>
                  <th>MAT. CERTIDÃO</th>
                  <th>STATUS</th>
                  <th>MÃE</th>
                  <th>PAI</th>

            </tfoot>
         </table>

      </form>
   </div>
</body>

</html>
