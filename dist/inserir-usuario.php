<?php

session_start();

require ("logica-login.php");

if(!isAdmin()){
    $_SESSION["restrito"] = true;
    header("Location: index.php");
    die();
}elseif(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
}

require("conexao.php");

//var_dump($conn);



$tipousuario = filter_input(INPUT_POST, "tipousuario");
$nome = filter_input(INPUT_POST, "nome");
$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "senha");
$telefone = filter_input(INPUT_POST, "telefone");

$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

/*
    echo "<pre>";
    echo "Nome: $nome<br>";
    echo "CPF: $cpf<br>";
    echo "Email: $email<br>";
    echo "DN: $data_nasc_doc<br>";
    echo "Senha: $senha<br>";
    echo "Senha com Hash: $senha_hash";
    echo "</pre>"; */

/**
 * 3. Criar o comando SQL
 */
$sql = "insert into usuario (tipousuario, nome, email, senha, telefone) values (?, ?, ?, ?, ?)";

/**
 * 4. Executar o comando SQL
 */
$stmt = $conn->prepare($sql);

try {
    $result = $stmt->execute([$tipousuario, $nome, $email, $senha_hash, $telefone]);
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


header("Location: formulario-usuario.php");
/** Quando utilizamos o header, não pode existir nenhuma saída de html na tela. Ex: header(...); echo */
