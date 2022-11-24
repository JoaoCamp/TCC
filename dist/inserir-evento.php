<?php

session_start();

require ("logica-login.php");

/**
 * 1. Estabelecer a conexão com o banco 
 */

if(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
} 

require("conexao.php");

var_dump($_SESSION);

/**
 * 2. Receber as variáveis enviadas por POST
*/

$idusuario = $_SESSION["idusuario"];
$nomeevento = filter_input(INPUT_POST, "nomeevento");
$banner = file_get_contents($_FILES['banner']['tmp_name']);
$tipo = $_FILES['banner']['type'];
$dataevento = filter_input(INPUT_POST, "dataevento");
$hora = filter_input(INPUT_POST, "hora");
$descricao = filter_input(INPUT_POST, "descricao");
$telefone = filter_input(INPUT_POST, "telefone");
$emailevento = filter_input(INPUT_POST, "emailevento");
$preco = filter_input(INPUT_POST, "preco");
$ruanum = filter_input(INPUT_POST, "ruanum");
$cidade = filter_input(INPUT_POST, "cidade");
$bairro = filter_input(INPUT_POST, "bairro");
$pais = filter_input(INPUT_POST, "pais");
$estado = filter_input(INPUT_POST, "estado");
$cep = filter_input(INPUT_POST, "cep");

echo "<pre>";
var_dump($_POST);
var_dump($_FILES);
echo "<pre>";

/**
 * 3. Criar o comando SQL
 */
$sql = "insert into evento 
    (idusuario, nomeevento, banner, tipo, dataevento, hora, descricao, telefone, 
    emailevento, preco, ruanum, cidade, bairro, pais, estado, cep) 
    values (:idusuario, :nomeevento, :data, :tipo, :dataevento, :hora, :descricao, :telefone, 
    :emailevento, :preco, :ruanum, :cidade, :bairro, :pais, :estado, :cep)";

/**
 * 4. Executar o comando SQL
 */
$stmt = $conn->prepare($sql);


try {
    $stmt->bindValue(1, $idusuario);    
    $stmt->bindValue(2, $nomeevento);
    $stmt->bindValue(3, $banner, PDO::PARAM_LOB);
    $stmt->bindValue(4, $tipo);
    $stmt->bindValue(5, $dataevento);
    $stmt->bindValue(6, $hora);
    $stmt->bindValue(7, $descricao);
    $stmt->bindValue(8, $telefone);
    $stmt->bindValue(9, $emailevento);
    $stmt->bindValue(10, $preco);
    $stmt->bindValue(11, $ruanum);
    $stmt->bindValue(12, $cidade);
    $stmt->bindValue(13, $bairro);
    $stmt->bindValue(14, $pais);
    $stmt->bindValue(15, $estado);
    $stmt->bindValue(16, $cep);

    $result = $stmt->execute();

    /*$result = $stmt->execute([$nomeevento, $dataevento, $hora, $descricao, $telefone, 
    $emailevento, $preco, $ruanum, $cidade, $bairro, $pais, $estado, $cep]);*/
    if (!$result) {
        $erro0 = $stmt->errorInfo();
        $error = $erro0[2]. " - xx $dataevento";
    }
} catch (Exception $e) {
    $result = false;
    $error = $e->getMessage();
}

/**
 * 5. Testar o resultado e apresentar isso ao usuário
 */

if ($result) {
    $_SESSION["result"] = true;
} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;
}


header("Location: formulario-evento.php");
/** Quando utilizamos o header, não pode existir nenhuma saída de html na tela. Ex: header(...); echo */
