<!-- The Modal -->
<div class="container">
   <div class="modal fade" id="myModalEdit" data-backdrop="static">
      <div class="modal-dialog modal-dialog modal-xl">
         <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title text-left">Atualizar Pedido</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               <div class="container-fluid">
                  <fieldset class="col-sm-12 col-md-12 px-6">
                     {{-- <legend>Atualizar os Dados:</legend> --}}
                     <div class="row pt-2">
                        <label for="" class="col-sm-3 col-form-label">Requerente:</label>
                        <div class="col-sm-9">
                           <input type="text" placeholder="ALTERE O NOME DO REQUERENTE SE DESEJAR" class="form-control" name="SOLICITANTE" id="SOLICITANTE"
                              onkeyup="maiuscula(this)">
                        </div>
                  </fieldset>
                  <fieldset class="col-sm-12 col-md-12 px-6 ">
                     {{-- <legend>Status da Transferência</legend> --}}
                     <div class="row pt-2">
                        <label for="" class="col-sm-3 col-form-label">Status da Transferência</label>
                        <div class="col-sm-4">
                           <select name="TRANSFERENCIA_STATUS" class="form-control" id="TRANSFERENCIA_STATUS">
                              <option value="ENTREGUE">ENTREGUE</option>
                              <option value="PRONTA">PRONTA</option>
                              <option value="PENDENTE">PENDENTE</option>
                           </select>
                        </div>
                        <label for="" class="col-sm-2 col-form-label  sm:text-right" id="labelDataEntregue">Data </label>
                        <div class="col-sm-3">
                           <input type="date" class="form-control" name="DATA_TRANSFERENCIA_STATUS" id="DATA_TRANSFERENCIA_STATUS">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset class="col-sm-12 col-md-12 px-6">
                     {{-- <legend>Atualizar os Dados:</legend> --}}
                     <div class="row pt-2">
                        <label for="" class="col-sm-3 col-form-label">Responsável pela Declaração:</label>
                        <div class="col-sm-9">
                           <input type="text" placeholder="DIGITE O NOME DO RESPONSÁVEL" class="form-control" id="RESPONSAVEL_DECLARACAO" name="RESPONSAVEL_DECLARACAO" value=""
                              onkeyup="maiuscula(this)">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset class="col-sm-12 col-md-12 px-6 ">
                     {{-- <legend>Status da Transferência</legend> --}}
                     <div class="row pt-2">
                        <label for="" class="col-sm-3 col-form-label" id="labelDataEntregue">Declaração</label>
                        <div class="col-sm-4">
                           <select class="form-control" name="DECLARACAO" id="DECLARACAO">
                              <option value="NAO">NAO</option>
                              <option value="SIM">SIM</option>
                           </select>
                        </div>
                        <label for="" class="col-sm-2 col-form-label sm:text-right">Data :</label>
                        <div class="col-sm-3">
                           <input type="date" class="form-control" name="DATA_DECLARACAO" id="DATA_DECLARACAO">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset class="col-sm-12 col-md-12 px-6">
                     {{-- <legend>Atualizar os Dados:</legend> --}}
                     <div class="row pt-2">
                        <label for="" class="col-sm-3 col-form-label">Responsável pela Transferência:</label>
                        <div class="col-sm-9">
                           <input type="text" placeholder="DIGITE O NOME DO RESPONSÁVEL" class="form-control" id="RESPONSAVEL_TRANSFERENCIA" name="RESPONSAVEL_TRANSFERENCIA"
                              onkeyup="maiuscula(this)">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset class="col-sm-12 col-md-12 px-6 ">
                     {{-- <legend>Status da Transferência</legend> --}}
                     <div class="row pt-2">
                        <label for="" class="col-sm-3 col-form-label" id="">Transferência:</label>
                        <div class="col-sm-4">
                           <select class="form-control" name="TRANSFERENCIA" id="TRANSFERENCIA">
                              <option value="NAO">NÃO</option>
                              <option value="SIM">SIM</option>
                           </select>
                        </div>
                        <label for="" class="col-sm-2 col-form-label sm:text-right">Data :</label>
                        <div class="col-sm-3">
                           <input type="date" class="form-control" name="DATA_TRANSFERENCIA" id="DATA_TRANSFERENCIA">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset class="col-sm-12 col-md-12 px-6 ">
                     {{-- <legend>Status da Transferência</legend> --}}
                     <div class="row pt-2">
                        <label for="" class="col-sm-3 col-form-label" id="">Registrado:</label>
                        <div class="col-sm-4">
                           <select class="form-control" name="REGISTRADO" id="REGISTRADO">
                              <option value="NAO_ESPECIFICADO">NAO ESPECIFICADO</option>
                              <option value="LIVRO">LIVRO</option>
                              <option value="OFICIO">OFICÍO</option>
                           </select>
                        </div>
                        <label for="" class="col-sm-2 col-form-label sm:text-right">NÚMERO:</label>
                        <div class="col-sm-3">
                           <input type="number" min="0" class="form-control" name="NUMERO" id="NUMERO">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset class="col-sm-12 col-md-12 px-6 ">
                     {{-- <legend>Status da Transferência</legend> --}}
                     <div class="row pt-2">
                        <label for="" class="col-sm-3 col-form-label" id="">Status Atual do Aluno:</label>
                        <div class="col-sm-9">
                           <select class="form-control" name="classification_id" id="classification_id">
                              <option value="0" disabled="">ESCOLHA UMA DAS OPÇÕES ABAIXO</option>
                              <option value="1" disabled>CURSANDO</option>
                              <option value="2" disabled>ADIMITIDO DEPOIS</option>
                              <option value="3" disabled>TRANSFERIDO</option>
                              <option value="4" disabled>DESISTENTE</option>
                              <option value="5" disabled>NÃO RENOVADO</option>
                              <option value="6" disabled="">APROVADO</option>
                              <option value="7" disabled="">REPROVADO</option>
                              <option value="8" disabled="">REPROVADO</option>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <div class="container mt-3">
                     <div class="row">
                        <div class="col">
                           <button type="submit" name="botao" value="update" class="btn btn-outline-success btn-block" onclick="return confirmar()">Salvar as Alterações
                           </button>
                        </div>
                        <div class="col">
                           <button type="button" class="btn btn-outline-warning btn-block" data-dismiss="modal">Voltar para as Solicitações</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
<!-- The Modal -->

<script>
   function json() {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      //
      camposMarcados = new Array();
      $("input[type=checkbox][name='aluno_selecionado[]']:checked").each(function() {
         camposMarcados.push($(this).val());
         //alert(camposMarcados);
      });
      //e.preventDefault();  Caso queira impedir o submit
      $.ajax({
         type: 'POST',
         url: '{{ route('transferencias.edit') }}',
         //  url: 'http://school-app/dashboard/transferidos/alunos/edit',
         dataType: 'html',
         data: {
            'id': camposMarcados,
            _token: $('#signup-token').val()
         },
         success: function(data) {

            $txt = JSON.parse(data);
            for (var i in $txt) {
               var nome = $txt[i]["NOME"];
               $('#SOLICITANTE').val($txt[i]["SOLICITANTE"]);
               $('#TRANSFERENCIA_STATUS').val($txt[i]["TRANSFERENCIA_STATUS"]);
               $('#DATA_TRANSFERENCIA_STATUS').val($txt[i]["DATA_TRANSFERENCIA_STATUS"]);
               //
               $('#DECLARACAO').val($txt[i]["DECLARACAO"]);
               $('#RESPONSAVEL_DECLARACAO').val($txt[i]["RESPONSAVEL_DECLARACAO"]);
               $('#DATA_DECLARACAO').val($txt[i]["DATA_DECLARACAO"]);
               //
               $('#TRANSFERENCIA').val($txt[i]["TRANSFERENCIA"]);
               $('#RESPONSAVEL_TRANSFERENCIA').val($txt[i]["RESPONSAVEL_TRANSFERENCIA"]);
               //
               $('#DATA_TRANSFERENCIA').val($txt[i]["DATA_TRANSFERENCIA"]);
               $('#classification_id').val($txt[i]["classification_id"]);
               // $('#classification_id :selected').text(classification_id);
               $('#REGISTRADO').val($txt[i]["REGISTRADO"]);
               $('#NUMERO').val($txt[i]["NUMERO"]);
            }
         }
      });
   };

</script>
<script type="text/javascript">
   $('input[type=checkbox]').on('change', function() {
      var total = $('input[type=checkbox]:checked').length;
      if (total > 0) {
         //alert(total);
         $('#btEditBloc').removeAttr('disabled');
      } else {
         $('#btEditBloc').attr('disabled', 'disabled');
      }
      //
      if (total === 1) {
         $('.btvalida').removeAttr('disabled');
      } else {
         $('.btvalida').attr('disabled', 'disabled');
      }
   });

</script>
<script type="text/javascript">
   //Marcar ou Desmarcar todos os checkbox
   $(document).ready(function() {
      $('.selecionar').click(function() {
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

</script>
<script type="text/javascript">
   // INICIO FUNÇÃO DE MASCARA MAIUSCULA
   function maiuscula(z) {
      v = z.value.toUpperCase();
      z.value = v;
   }

</script>
<!--Confimar se pode Salvar-->
<script type="text/javascript">
   function confirmar() {
      var u = $('#usuario').val();
      var r = confirm("Já Posso Enviar " + u + "? ");
      if (r == true) {
         return true;
      } else {
         return false;
      }
   }

</script>
