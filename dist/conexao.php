<?php

$servidor = "localhost";
$usuario = "postgres";
$senha = "postdba";
$base = "TCC";

try {    
    $conn = new PDO(
                    "pgsql:dbname=$base;host=$servidor;port=5432", 
                    $usuario, 
                    $senha
                    );
} catch (Exception $e) {
    echo "Erro ao se conectar no banco de dados. <br>";
    echo $e->getMessage();
}
