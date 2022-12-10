<?php
use Source\Core\Connect;

$query = "SELECT * FROM sales";
$stmt = Connect::getInstance()->prepare($query);
$stmt->execute();

// Informacoes para o PDF
$data = "<!DOCTYPE html>";
$data .= "<html lang='pt-br'>";
$data .= "<head>";
$data .= "<meta charset='UTF-8'>";
//$data .= "<link rel='stylesheet' href='http://localhost/playground/assets/adm/css/home-pdf.css'";
$data .= "<title>Relatório de Vendas</title>";
$data .= "</head>";
$data .= "<body>";
$data .= "<h1>Vendas</h1>";

// Ler os registros retornado do BD
while($sale = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($sale);
    $data .= "Total da Venda: R$ $total <br>";
    $data .= "ID do Usuário: $idUser <br>";
    $data .= "Realizada em: $created_at <br>";
    $data .= "<hr>";
}

$data .= "</body>";

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(['enable_remote' => true]);

$dompdf->loadHtml($data); 

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("relatorio_vendas");

