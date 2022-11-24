<?php

session_start();
require "logica-login.php";

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    header("location: index.php");
    die();
}


require("conexao.php");


$idusuario = $_SESSION["idusuario"];


$sql = "DELETE from usuario where idusuario = ?";


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


if ($result) {
    header("Location: formulario-login.php");
    session_destroy();
} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;

    header("Location: formulario-login.php");
}