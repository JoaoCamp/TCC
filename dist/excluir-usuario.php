<?php

session_start();
require "logica-login.php";

if(!isAdmin()){
    $_SESSION["restrito"] = true;
    header("Location: index.php");
    die();
}elseif(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
}

/**
 * 1. Estabelecer a conexão com o banco 
 */

require("conexao.php");

/**
 * 2. Receber as variáveis enviadas por POST
 */
$idusuario = $_GET["idusuario"];
//$email = email_user();

/*
    echo "<pre>";
    echo "Nome: $nome<br>";
    echo "Email: $email<br>";
    echo "Senha: $senha<br>";
    echo "Senha com Hash: $senha_hash";
    echo "</pre>"; */

/**
 * 3. Criar o comando SQL
 */
$sql = "DELETE from usuario where idusuario = ?";

/**
 * 4. Executar o comando SQL
 */
$stmt = $conn->prepare($sql);

try {
    $result = $stmt->execute([$idusuario]);
    if (!$result) {
        $erro0 = $stmt->errorInfo();
        $error = $erro0[2];
    }
} catch (Exception $e) {
    $result = false;
    $error = $e->getMessage();
}

/**
 * 5. Testar o resultado e apresentar isso ao usuário
 */

if ($result) {
    header("Location: listagem-usuario.php");
} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;

    header("Location: formulario-login.php");
}