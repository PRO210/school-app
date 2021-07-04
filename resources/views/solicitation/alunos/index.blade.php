<!DOCTYPE html>
<html lang="pt-br">

<head>
   <title>{{ $title ?? 'Transferências' }}</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

   <!-- Styles -->
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

   {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

   <style>
      fieldset {
         /* background-color: rgba(111, 66, 193, 0.3); */
         border-radius: 4px;
         /* border: 1px solid blue; */
         padding-bottom: 12px;
      }

      legend {
         background-color: #fff;
         border: 1px solid blue;
         border-radius: 4px;
         color: var(--purple);
         font-size: 17px;
         font-weight: bold;
         padding: 3px 5px 3px 7px;
         width: auto;
      }

      svg {
         display: inline-block !important;
      }

      tfoot input {
         width: 100%;
         padding: 3px;
         box-sizing: border-box;
      }

      .btvalidaCss:hover {
         background-color: #fff !important;
         border: none;
      }

   </style>

   @include('solicitation.alunos.index_table')
</head>

<body>
   @include('layouts.navigation')

   @include('includes.alerts')

   <div class="m-3">

      {{-- Form --}}
      <form action="{{ route('transferencias.update') }}" method="POST" class="form-horizontal" name="form">
         @csrf
         @method('PUT')
         {{-- <input id="signup-token" name="_token" type="hidden" value="{{ csrf_token() }}"> --}}
         <div class="row" style="margin-bottom:12px">
            <div class="col-sm-4">
               <!--<a href="" target="_self"><button type="submit" value="" class="btn btn-warning btn-block botoes"><span class='glyphicon glyphicon-print text-success' aria-hidden='true' style="margin-right: 12px;color: white"></span>Capa da Transferência</button></a>-->
               <button type="submit" style="margin-bottom: 12px" name="botao" value="folha_rosto" class="btn btn-outline-warning btn-block btvalida" disabled="">
                  <span class='glyphicon glyphicon-print text-success' aria-hidden='true' style="margin-right: 12px;color: white"></span>
                  <b>Capa da Transferência</b>
               </button>
            </div>
            <div class="col-sm-4">
               <button type="submit" style="margin-bottom: 12px" name="botao" value="folha_notas" class="btn btn-outline-primary btn-block btvalida" disabled=""><span
                     class='glyphicon glyphicon-print text-success' aria-hidden='true' style="margin-right: 12px;color: white"></span>Notas para a Transferência</button>
            </div>
            <div class="col-sm-4">
               <button type="button" style="margin-bottom: 12px" class="btn btn-outline-success btn-block btvalida" data-toggle="modal" data-target="#myModalEdit" disabled=""
                  onclick="json()" title="Marque ao Menos uma Das Caixinhas Para Usar Esse Botão">Atualizar a Transferência</button>
            </div>
         </div>

         {{-- Tabela --}}
         <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
            <thead>
               <tr>
                  <th style="width: 30px !important">
                     <span><input type='checkbox' id="selecionar"></span>
                  </th>
                  <th class="whitespace-normal sm:whitespace-nowrap md:whitespace-nowrap">ALUNO</th>
                  <th>TURMA</th>
                  <th class="text-xs pt-0 ">STATUS DO <br>ALUNO</th>
                  <th class="text-xs pt-0 ">STATUS DA <br>TRANSFERÊNCIA</th>
                  <th>SOLICITANTE</th>
                  <th>SOLICITADO EM</th>
            </thead>
            <tbody>
               @foreach ($solicitations as $solicitation)
                  @foreach ($solicitation->transferencias as $aluno)
                     <tr>
                        <td>
                           {{-- Em branco --}}
                        </td>
                        <td class="">
                           <!-- Example split danger button -->
                           <div class="dropdown">
                              <button type="button" class="btDropdown btn btn-outline-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true"
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
                                    </svg>
                                    <span class='glyphicon glyphicon-pencil ' aria-hidden='true'>&nbsp;</span>
                                    <b>Incluir/Retirar Turma</b>
                                 </a>
                                 <div class="dropdown-divider"></div>
                                 <div class="col-sm-4">
                                    <button type="button" style="margin-bottom: 12px" class="btn btn-light btvalida btvalidaCss" data-toggle="modal" data-target="#myModalEdit"
                                       disabled="" onclick="json()" title="Marque ao Menos uma Das Caixinhas Para Usar Esse Botão">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                          <path
                                             d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                       </svg>&nbsp;&nbsp;
                                       <span class=""> <b>Ver Transferência</b></span>
                                    </button>
                                 </div>
                                 <a class="dropdown-item" href="{{ route('transferencias.delete', ['uuid' => $aluno->pivot->uuid]) }}" target='_self'
                                    title='Marque Uma Das Caixinhas Para Usar Esse Botão'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 18 18">
                                       <path
                                          d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                       <path fill-rule="evenodd"
                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>&nbsp;
                                    <b>Excluir Transferência</b>
                                 </a>
                              </div>
                              &nbsp;
                              <span><input type='checkbox' name='aluno_selecionado[]' for='NOME' class='checkbox'
                                    value='{{ $aluno->pivot->uuid }}/{{ $aluno->pivot->turma_id }}/{{ $aluno->id }}/{{ $aluno->pivot->classification_id }}'>
                              </span>
                              &nbsp;<span class="whitespace-normal sm:whitespace-nowrap md:whitespace-nowrap">{{ $aluno->NOME }}</span>
                           </div>
                        </td>
                        <td class="whitespace-nowrap">
                           @foreach ($turmas as $turma)
                              @if ($aluno->pivot->turma_id == $turma->id)
                                 {{ $turma->TURMA }} ( {{ $turma->TURNO }}) -
                                 {{ \Carbon\Carbon::parse($solicitation->TURMA_ANO)->format('Y') }}
                              @endif
                           @endforeach
                        </td>
                        <td>
                           @foreach ($classifications as $classification)
                              @if ($aluno->pivot->classification_id == $classification->id)
                                 {{ $classification->STATUS }}
                              @endif
                           @endforeach
                        </td>
                        <td>
                           {{ $aluno->pivot->TRANSFERENCIA_STATUS }}
                        </td>
                        <td>{{ $aluno->pivot->SOLICITANTE }}</td>
                        <td>
                           {{ \Carbon\Carbon::parse($aluno->pivot->DATA_TRANSFERENCIA_STATUS)->format('d-m-Y') }}
                        </td>
                     </tr>
                  @endforeach
               @endforeach
            </tbody>
            <tfoot>
               <tr>
                  <th style=" width: 60px !important"></th>
                  <th>ALUNO</th>
                  <th>TURMA</th>
                  <th>STATUS DO <br>ALUNO</th>
                  <th>STATUS</th>
                  <th>SOLICITANTE</th>
                  <th>SOLICITADO EM</th>
            </tfoot>
         </table>
         {{-- Tabela Fim --}}

         @include('solicitation.alunos.index_json')

         <div style="margin-bottom: 60px;">
            <input type="hidden" id="usuario" value="{{ Auth::user()->name }}">
         </div>

      </form>
      {{-- Form Fim --}}

   </div>

</body>

</html>
