<?php
    session_start();
    require ("logica-login.php");

    $titulo_pagina = "Bem-Vindo(a), " .nome_user(). "."; //Colocar nome do usuário logado
    require ("cabecalho.php");

    if(!autenticado()){
        $_SESSION["restrito"] = true;
        header("location: formulario-login.php");
        die();
    }
?>



        <div class='card-body'>
            <h5>Cadastro autenticado como: <?= tipousuario()?></h5> <!-- Definir tipo de conta por variável -->
        </div>



   


<?php

if(isset($_SESSION["result"])){

    if(!$_SESSION["result"]){
        $erro = $_SESSION["erro"];
        unset($_SESSION["erro"]);
?>    
            <div class="alert alert-danger" role="alert">
                <h4 class="alert heading"> Erro.</h4>
                <p><?= $erro ?></p> 
            </div>
<?php

}
    unset($_SESSION["result"]);
}


if(isset($_SESSION["autenticado"]) && ($_SESSION["autenticado"])){
    ?>

    <div class="alert alert-warning" role="alert">
        <h4 class="alert heading">Atenção,</h4>
        <p>usuário já está autenticado.</p>
    </div>

<?php
unset($_SESSION["autenticado"]);
}


require ("rodape.php");
?>