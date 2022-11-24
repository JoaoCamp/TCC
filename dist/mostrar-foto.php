<?php
session_start();
require ("logica-login.php");

if(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
}

require ("conexao.php");

$idimg = filter_input(INPUT_GET, "idimg");

$sql = "select tipo, imagem FROM imagens where idimg = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$idimg]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$data = $row['imagem'];
$tipo = $row['tipo'];

$string = stream_get_contents($data);

header("Content-type: $tipo");
echo $string;