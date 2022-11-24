<?php

session_start();
require "logica-login.php";

/**
 * 1. Estabelecer a conexão com o banco 
 */

require("conexao.php");



if (!isAdmin() && !autenticado()) {
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
}

/**
 * 2. Receber as variáveis enviadas por POST
 */

if (isAdmin()) {
    $tipousuario = filter_input(INPUT_POST, "tipousuario");
    $nome = filter_input(INPUT_POST, "nome");
    $email = filter_input(INPUT_POST, "email");
    $telefone = filter_input(INPUT_POST, "telefone");

    $sql = "UPDATE usuario SET tipousuario = ?, nome = ?, telefone = ?  WHERE email = ?";

    /**
     * 4. Executar o comando SQL
     */
    $stmt = $conn->prepare($sql);

    try {
        $result = $stmt->execute([$tipousuario, $nome, $telefone, $email]);

        if (email_user() == $email) {
            set_tipousuario_user($tipousuario);
            set_nome_user($nome);
            set_telefone_user($telefone);
            set_email_user($email);
        }


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
        $_SESSION["result"] = true;
    } else {
        $_SESSION["result"] = false;
        $_SESSION["erro"] = $error;
    }


    header("Location: listagem-usuario.php");
} else {
    $nome = filter_input(INPUT_POST, "nome");
    $email = filter_input(INPUT_POST, "email");
    $telefone = filter_input(INPUT_POST, "telefone");

    $sql = "UPDATE usuario SET nome = ?, telefone = ?  WHERE email = ?";

    /**
     * 4. Executar o comando SQL
     */
    $stmt = $conn->prepare($sql);

    try {
        $result = $stmt->execute([$nome, $telefone, $email]);
        set_nome_user($nome);
        set_telefone_user($telefone);
        set_email_user($email);
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
        $_SESSION["result"] = true;
    } else {
        $_SESSION["result"] = false;
        $_SESSION["erro"] = $error;
    }


    header("Location: listagem-usuario.php");
}
