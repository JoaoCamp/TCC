<?php
session_start();

if(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
} 

require("logica-login.php");
require_once ('conexao.php');

$idimg = filter_input(INPUT_GET, "idimg");




$sql = "SELECT nome, tipo, tamanho, imagem FROM imagens WHERE idimg = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$idimg]);


$row = $stmt->fetch(PDO::FETCH_ASSOC);
$nome = $row['nome'];
$tipo = $row['tipo'];
$tamanho = $row['tamanho'];
$data = $row['imagem'];

$string = stream_get_contents($data);

header('Content-Type: ' . $tipo);
header('Content-Length: ' . $tamanho);
header("Content-Disposition: attachment; filename=\"$nome\"");
header('Content-Transfer-Encoding: binary');
header('Connection: Keep-Alive');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
echo $string;