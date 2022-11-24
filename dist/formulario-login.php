<?php

    session_start();

    require ("logica-login.php");

    $titulo_pagina = "Login";

    require ("cabecalho.php");

/*
    if(autenticado()){
        $_SESSION["autenticado"] = true;
    }*/
?>

    <center>
        <form action="login-usuario.php" method="POST" enctype="multipart/form-data" style="margin-top: 10%; margin-bottom: 10%;">
                <div class="input-group w-50">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                        </svg>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                </div>
            <br>
                <div class="input-group w-50">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"></path>
                        </svg>
                    </span>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                </div>

                <br>
                
                <button class="btn btn-primary">Entrar</button>
                <button class="btn btn-dark">Cancelar</button>
        </form>

    </center>

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


if(isset($_SESSION["restrito"]) && ($_SESSION["restrito"])){
    ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert heading">Alerta!</h4>
        <p>Você está tentando acessar conteúdo restrito.</p>
    </div>

<?php
unset($_SESSION["restrito"]);
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