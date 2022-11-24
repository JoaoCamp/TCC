
<?php

session_start();
require ("logica-login.php");

$titulo_pagina = "Visualizar Foto";
require ("cabecalho.php");



   if(!autenticado()){
        $_SESSION["restrito"] = true;
        header("Location: formulario-login.php");
        die();
    } 

$idimg = filter_input(INPUT_GET, "idimg");
?>

<img src="mostrar-foto.php?idimg=<?= $idimg ?>" alt="imagem" style="max-width: 100vh;">
<br><br>
<p>
    <a href="listagem-foto.php" class="btn btn-info">Voltar à listagem</a>
</p>

<?php

require("rodape.php");

?>
