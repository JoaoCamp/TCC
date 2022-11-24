<?php

session_start();
require("logica-login.php");

if(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
} 


$titulo_pagina = "Fotos";

require ("conexao.php");
require("cabecalho.php");

$idevento = filter_input(INPUT_POST, "idevento");
$nome = $_FILES['imagem']['name'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$extensao = pathinfo($nome, PATHINFO_EXTENSION);

//var_dump($idevento);

// Read in a binary file
$data = file_get_contents($_FILES['imagem']['tmp_name']);

// Valid image extension
$valid_extension = array("png", "jpeg", "jpg");

if (in_array($extensao, $valid_extension)) {

    $sql = "insert into imagens (idevento, nome, tipo, tamanho, imagem)  values (:idevento, :nome, :tipo, :tamanho, :data)";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $idevento);
    $stmt->bindValue(2, $nome, PDO::PARAM_STR);
    $stmt->bindValue(3, $tipo, PDO::PARAM_STR);
    $stmt->bindValue(4, $tamanho, PDO::PARAM_STR);
    $stmt->bindValue(5, $data, PDO::PARAM_LOB);
    $result = $stmt->execute();


    if ($result == true) {
?>
        <div class="alert alert-success" role="alert">
            <h4>Dados gravados com sucesso!</h4>
        </div>
        <a href="listagem-evento.php" class="btn btn-info">Voltar à listagem</a>
    <?php
    } else {
    ?>
        <div class="alert alert-danger" role="alert">
            <h4>Falha ao efetuar gravação.</h4>
            <p><?php echo $stmt->error; ?></p>
        </div>
    <?php
    }
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        <h4>Erro: tipo de arquivo não permitido.</h4>
    </div>
<?php
}

require("rodape.php");
?>