<?php

// use Codedge\Fpdf\Fpdf\Fpdf;

include 'rotation.php';

// Instanciation of inherited class
$pdf = new PDF();

$pdf->SetLeftMargin(15);
$pdf->SetAutoPageBreak(false);
$pdf->AliasNbPages();
$pdf->AddPage();
//
$pdf->Cell(190, 5, "", '', 1, 'C');
//$pdf->Image("data:image/jpg;base64,base64_encode($imagem->blob_imagem)", 45, 5, 120, 35);
$pdf->Image('storage/tenant/timbre/Timbre-2021.png', 45, 5, 120, 35, 'PNG');
$pdf->Cell(190, 20, "", '', 1, 'C');
//
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 5, "", '', 1, 'C');
$pdf->Cell(190, 10, $escola['NOME'], '', 1, 'C');
//
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(190, 0, "Identificação Única INEP: " . $escola['INEP'] . " CADASTRO ESCOLAR: " . $escola['CADASTRO'] . "", '', 1, 'C');
// //
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 20, "Requerimento de Matrícula", '', 1, 'C');
// //
$pdf->SetFont('Arial', '', 12);
$txt = "Requeiro a matrícula no(a)  $turma->TURMA série/ano/fase do curso de  $turma->CATEGORIA, turno $turma->TURNO, declarando aceitar as disposições expressas no requerimento e me responsabilizando pela autenticidade dos documentos entregues neste ato.";
$pdf->MultiCell(0, 7, $txt, '', 'J');
// //
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 15, "Dados Pessoais do Aluno(a)", '', 1, 'C');
// //
$pdf->SetFont('Arial', '', 12);
//NIS e SUS
$pdf->Cell(10, 7, 'Nis:', 0, 0, 'L');
$pdf->Cell(90, 7, "$aluno->NIS", 0, 0, 'L');
$pdf->Line(25, 112, 110, 112);
$pdf->Cell(10, 7, 'Sus:', 0, 0, 'L');
$pdf->Cell(90, 7, "$aluno->SUS", 0, 1, 'L');
$pdf->Line(125, 112, 195, 112);
// //
//NOME
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(15, 7, 'Nome:', 0, 0, 'L');
$pdf->Cell(90, 7, $aluno->NOME, 0, 1, 'L');
$pdf->Line(30, 119, 195, 119);
// ENDEREÇO
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(22, 7, 'Endereço:', 0, 0, 'L');
$pdf->Cell(90, 7, $aluno->ENDERECO, 0, 1, 'L');
$pdf->Line(36, 126, 195, 126);
//MUNICÍPIO e ESTADO
$pdf->Cell(25, 7, 'MUNICÍPIO:', 0, 0, 'L');
$pdf->Cell(75, 7, $aluno->CIDADE, 0, 0, 'L');
$pdf->Line(40, 132.5, 110, 132.5);
$pdf->Cell(20, 7, 'ESTADO: ', 0, 0, 'L');
$pdf->Cell(60, 7, $aluno->CIDADE_ESTADO, 0, 1, 'L');
$pdf->Line(135, 132.5, 195, 132.5);
//DATA DE NASCIMENTO
$nascimento = new DateTime($aluno->DATA_NASCIMENTO);
// leitura das datas automaticamente
$dia = date_format($nascimento, 'd');
//$mes = date('m');
$mes = date_format($nascimento, 'm');
//$ano = date('Y');
$ano_nascimento = date_format($nascimento, 'Y');
$pdf->Cell(55, 7, 'DATA DE NASCIMENTO:', 0, 0, 'L');
$pdf->Cell(20, 7, "$dia" . "     DE", 0, 0, 'L');
$pdf->Line(66, 139.5, 80, 139.5);
//DATA DE NASCIMENTO MÊS
// configuração mes
switch ($mes) {

    case 1:
        $mes = "Janeiro";
        break;
    case 2:
        $mes = "Fevereiro";
        break;
    case 3:
        $mes = "Março";
        break;
    case 4:
        $mes = "Abril";
        break;
    case 5:
        $mes = "Maio";
        break;
    case 6:
        $mes = "Junho";
        break;
    case 7:
        $mes = "Julho";
        break;
    case 8:
        $mes = "Agosto";
        break;
    case 9:
        $mes = "Setembro";
        break;
    case 10:
        $mes = "Outubro";
        break;
    case 11:
        $mes = "Novembro";
        break;
    case 12:
        $mes = "Dezembro";
        break;
}
$pdf->Cell(23, 7, $mes, 0, 0, 'L');
$pdf->Line(89, 139.5, 112, 139.5);
$pdf->Cell(5, 7, 'DE', 0, 0, 'L');
//DATA DE NASCIMENTO ANO
$pdf->Cell(4, 7, "", 0, 0, 'L');
$pdf->Cell(11, 7, " $ano_nascimento .", 0, 1, 'L');
$pdf->Line(122, 139.5, 138, 139.5);
//CERTIDAO DE NASCIMENTO
$certidao_nascimento = '';
$certidao_casamento = '';
if ($aluno->CERTIDAO_CIVIL == "NASCIMENTO") {
    $certidao_nascimento = "X";
} elseif ($aluno->CERTIDAO_CIVIL == "CASAMENTO") {
    $certidao_casamento = "X";
}
$pdf->Cell(55, 7, 'CERTIDÃO CIVIL:', 0, 1, 'L');
$pdf->Cell(40, 7, "NASCIMENTO ( " . "$certidao_nascimento" . " )", 0, 0, 'L');
$pdf->Cell(35, 7, "CASAMENTO( " . " $certidao_casamento" . " )", 0, 0, 'L');
//
if ($aluno->DADOS_CERTIDAO !== "") {
    $pdf->Cell(27, 7, $aluno->DADOS_CERTIDAO, 0, 1, 'L');
} else {
    $pdf->Cell(45, 7, 'TERMO N°:', 0, 0, 'L');
    $pdf->Line(115, 153, 135, 153);
    $pdf->Cell(27, 7, 'LIVRO:', 0, 0, 'L');
    $pdf->Line(150, 153, 163, 153);
    $pdf->Cell(27, 7, 'FOLHA:', 0, 1, 'L');
    $pdf->Line(180, 153, 195, 153);
}
//DATA DE EXPEDIÇAO DA CERTIDÃO
$expedicao = date_format(new DateTime($aluno->EXPEDICAO_CERTIDAO),'d/m/Y');
$pdf->Cell(47, 7, 'DATA DE EXPEDIÇÃO:', 0, 0, 'L');
$pdf->Cell(27, 7, $expedicao, 0, 1, 'L');
//NOME DO PAI
$pdf->Cell(32, 7, 'NOME DO PAI:', 0, 0, 'L');
$pdf->Cell(27, 7, $aluno->PAI, 0, 1, 'L');
$pdf->Line(48, 168, 195, 168);
$pdf->Cell(47, 7, 'PROFISSAO DO PAI:', 0, 0, 'L');
$pdf->Cell(27, 7, $aluno->PROF_PAI, 0, 1, 'L');
$pdf->Line(60, 175, 195, 175);
//NOME DA MÃE
$pdf->Cell(32, 7, 'NOME DA MÃE:', 0, 0, 'L');
$pdf->Cell(27, 7, $aluno->MAE, 0, 1, 'L');
$pdf->Line(48, 182, 195, 182);
$pdf->Cell(47, 7, 'PROFISSAO DA MÃE:', 0, 0, 'L');
$pdf->Cell(27, 7, $aluno->PROF_MAE, 0, 1, 'L');
$pdf->Line(60, 189, 195, 189);
// //NATURAL  ESTADO
$pdf->Cell(30, 7, 'NATURAL DE:', 0, 0, 'L');
$pdf->Cell(75, 7, $aluno->NATURALIDADE, 0, 0, 'L');
$pdf->Line(45, 196, 110, 196);
$pdf->Cell(20, 7, 'ESTADO:', 0, 0, 'L');
$pdf->Cell(60, 7, $aluno->ESTADO, 0, 1, 'L');
$pdf->Line(140, 196, 195, 196);
//NACIONALIDADE
$pdf->Cell(38, 7, 'NACIONALIDADE:', 0, 0, 'L');
$pdf->Cell(90, 7, $aluno->NACIONALIDADE, 0, 1, 'L');
$pdf->Line(53, 203, 195, 203);
// //SEXO E COR
$pdf->Cell(15, 7, 'SEXO:', 0, 0, 'L');
$pdf->Cell(90, 7, $aluno->SEXO, 0, 0, 'L');
$pdf->Line(30, 210, 120, 210);
$pdf->Cell(25, 7, 'COR/RAÇA:', 0, 0, 'L');
$pdf->Cell(90, 7, $aluno->COR, 0, 1, 'L');
$pdf->Line(145, 210, 195, 210);
// //NECESSIDADES EDUCACIONAIS ESPECIAIS
$pdf->Cell(94, 7, 'NECESSIDADES EDUCACIONAIS ESPECIAIS:', 0, 0, 'L');
$pdf->Cell(90, 7, $aluno->NECESSIDADES_ESPECIAIS, 0, 1, 'L');
$pdf->Line(109, 217, 195, 217);
// //DATA DE MATRICULA
$data_matricula = new DateTime($aluno->created_at);
$pdf->Cell(47, 7, 'DATA DE MATRICULA:', 0, 0, 'L');
$pdf->Cell(90, 7, date_format($data_matricula, 'd/m/Y'), 0, 1, 'L');
$pdf->Line(62, 224, 195, 224);
$pdf->Cell(47, 7, '', 0, 1, 'L');
// //RESPONSAVEL
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(180, 7, 'Assinatura do Responsável', 0, 1, 'C');
$pdf->Line(35, 233, 165, 233);
//SECRETARIA
$pdf->Cell(180, 14, 'SECRETARIA', 0, 1, 'C');
$pdf->Line(35, 244, 165, 244);
//DESPACHO
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(55, 0, 'DESPACHO:', 0, 0, 'L');
$pdf->Line(42, 255, 70, 255);
$pdf->Cell(35, 0, 'ALAGOINHA,                             DE                    DE', 0, 1, 'L');
$pdf->Line(98, 255, 130, 255);
$pdf->Line(138, 255, 160, 255);
$pdf->Line(168, 255, 195, 255);
//DIRETORA
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(180, 10, '', 0, 1, 'C');
$pdf->Cell(180, 10, 'DIRETOR(A)', 0, 1, 'C');
$pdf->Line(35, 266, 165, 266);
//DIRETORA
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(20, 6, '', 0, 1, 'L');
$pdf->Cell(20, 3, "CNPJ: " . $escola['CNPJ'], 0, 1, 'L');
$pdf->Cell(180, 3, "End.:" . $escola['ENDERECO']. " - " . $escola['CIDADE']. " - ". $escola['ESTADO'].",
CEP: ". $escola['CEP']. ", - Email: ". $escola['EMAIL']."", 0, 1, 'L');

//for ($i = 1; $i <= 10; $i++)
//    $pdf->Cell(100, 10, 'Printing line number ' . $i, 0, 1);
$pdf->AddPage();
$pdf->Image('storage/school/timbre/Timbre-2021.png', 45, 5, 120, 35, 'PNG');
$pdf->Cell(190, 20, "", '', 1, 'C');
//
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(180, 25, 'RENOVAÇÃO DE MATRICULA', 0, 1, 'C');
$pdf->Cell(180, 220, '', 0, 1, 'C');
//
$pdf->Image('storage/school/timbre/RENOVACAO_MATRICULA.png', 10, 45, 190, 235);
$pdf->Cell(190, 5, "", '', 1, 'C');
//
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(20, 6, '', 0, 1, 'L');
$pdf->Cell(20, 3, "CNPJ: " . $escola['CNPJ'], 0, 1, 'L');
$pdf->Cell(180, 3, "End.:" . $escola['ENDERECO']. " - " . $escola['CIDADE']. " - ". $escola['ESTADO'].",
CEP: ". $escola['CEP']. ", - Email: ". $escola['EMAIL']."", 0, 1, 'L');

$pdf->Output('I', '' . $aluno->NOME . '.pdf', true);
