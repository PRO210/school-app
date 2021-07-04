@extends('layouts.app')

@section('content')

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

   </style>

   <div class="grid grid-flow-row auto-rows-max md:auto-rows-min mx-8">

      <h5 class="p-3">{{ $aluno->NOME }} &nbsp; do(a) &nbsp;
         <b>{{ $turma->TURMA }} - {{ $turma->UNICO }} &nbsp; ({{ $turma->TURNO }})
            <b>{{ \Carbon\Carbon::parse($turma->ANO)->format('Y') }}</b>
      </h5>

      <form action="{{ route('transferencias.store') }}" method="post" class="">
         @csrf
         {{-- <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">
         <input type="hidden" name="turma_id" value="{{ $turma->id }}"> --}}
         <input type="hidden" name="aluno_selecionado[]" value="{{ $aluno->uuid }}/{{ $turma->id }}/{{ $aluno->id }}">
         <div class="row justify-content-center">
            <fieldset class="col-sm-12 col-md-12 px-6">
               <legend>Solicitação de Transferência:</legend>
               <div class="row">
                  <label for="" class="col-sm-2 col-form-label">Solicitante:</label>
                  <div class="col-sm-5">
                     <input type="text" name="SOLICITANTE" id="" class="form-control" placeholder="Solicitante" required="">
                  </div>
                  <label for="" class="col-sm-2 col-form-label sm:text-right">DATA:</label>
                  <div class="col-sm-3">
                     <input type="date" name="DATA_SOLICITACAO" id="" class="form-control">
                  </div>
               </div>
            </fieldset>
         </div>
         <div class="row">
            <div class="col-sm-12 ">
               <label for="" class="col-sm-2 control-label"></label>
               <div class="col-sm-12">
                  @if ($solicitations > 0)
                     <button type="submit" class="btn btn-outline-primary btn-block " name="botao" onclick="return confirmar()"><B>Consultar</B></button>
                  @else
                     <button type="submit" class="btn btn-outline-success btn-block " name="botao" value="salvar" onclick="return confirmar()"><B>Salvar</B></button>
                  @endif
               </div>
            </div>
         </div>
         <br>
         <!-- Observações  -->
         <div class="row justify-content-center">
            @if ($solicitations > 0)
               <fieldset class="col-sm-12 col-md-12 px-6">
                  <legend>Observações:</legend>
                  <div class="row">
                     <div class="col-sm-12">
                        <textarea class="form-control" rows="2" id="" name="OBSERVACOES" placeholder="">Já Existe pelo menos uma transferência pendente. Consulte Por favor!
                                                   </textarea>
                     </div>
                  </div>
               </fieldset>
            @endif
         </div>

      </form>

   </div>

@stop
