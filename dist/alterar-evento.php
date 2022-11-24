<?php

session_start();

require ("logica-login.php");

/*
if(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
} */

require("conexao.php");

//var_dump($conn);

/**
 * 2. Receber as variáveis enviadas por POST
 */

$idusuario = $_SESSION["idusuario"];
$nomeevento = filter_input(INPUT_POST, "nomeevento");
$banner = file_get_contents($_FILES['banner']['tmp_name']);
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
$idimg = filter_input(INPUT_POST, "idimg");
echo "<pre>";
var_dump($_POST);
var_dump($_FILES);
echo "<pre>";

/**
 * 3. Criar o comando SQL
 */
$sql = "UPDATE evento SET 
    :nomeevento, :dataevento, :hora, :descricao, :telefone, 
    :emailevento, :preco, ruanum:, :cidade, :bairro, :pais, :estado, :cep, :idimg
    WHERE :idevento = ?";

/**
 * 4. Executar o comando SQL
 */
//$stmt = $conn->prepare($sql);


try {

    $stmt->bindValue(1, $nomeevento);
    $stmt->bindValue(2, $banner, PDO::PARAM_LOB);
    $stmt->bindValue(3, $dataevento);
    $stmt->bindValue(4, $hora);
    $stmt->bindValue(5, $descricao);
    $stmt->bindValue(6, $telefone);
    $stmt->bindValue(7, $emailevento);
    $stmt->bindValue(8, $preco);
    $stmt->bindValue(9, $ruanum);
    $stmt->bindValue(10, $cidade);
    $stmt->bindValue(11, $bairro);
    $stmt->bindValue(12, $pais);
    $stmt->bindValue(13, $estado);
    $stmt->bindValue(14, $cep);
    $stmt->bindValue(15, $idimg);

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


header("Location: formulario-edicao.php");