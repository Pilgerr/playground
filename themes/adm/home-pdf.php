<?php
use Source\Core\Connect;

$query = "SELECT * FROM users";
$stmt = Connect::getInstance()->prepare($query);
$stmt->execute();

// Informacoes para o PDF
$data = "<!DOCTYPE html>";
$data .= "<html lang='pt-br'>";
$data .= "<head>";
$data .= "<meta charset='UTF-8'>";
//$data .= "<link rel='stylesheet' href='http://localhost/playground/assets/adm/css/home-pdf.css'";
$data .= "<title>Teste - Gerar PDF</title>";
$data .= "</head>";
$data .= "<body>";
$data .= "<h1>Listar os Usuário</h1>";

// Ler os registros retornado do BD
while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($user);
    $data .= "Nome: $phoneNumber <br>";
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
//$dompdf->stream("PDF_file");
$dompdf->stream();

