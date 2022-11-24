<?php
function ativa($nome_pagina){

   if(basename($_SERVER["PHP_SELF"]) == $nome_pagina){
       return " active ";
   }else{
       return null;
   }
}


?>

<!DOCTYPE html>
<html lang="pt-br" >
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script><script  src="./script.js"></script>

  <title>Eventos Manager</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css'>
  <link rel="stylesheet" href="style.css"> 
  <link rel="icon" href="./img/icon.png">

</head>
<body>
<!-- partial:index.partial.html -->
<div class='dashboard'>
    <div class="dashboard-nav">
        <header style="margin-bottom: 10px; margin-top: 5px;"><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            <a href="#" class="brand-logo">
                <img src="./img/logo.png" width="200px">
                <span></span>
            </a>
        </header>

<?php
    if(isAdmin()){
?>
        <nav class="dashboard-nav-list">
            <a href="index.php" class="dashboard-nav-item">
                <i class="fas fa-home"></i>
                    Início 
            </a>

            <div class='dashboard-nav-dropdown'>
                <a href="#" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-users"></i> 
                        Usuários 
                </a>
                <div class='dashboard-nav-dropdown-menu'>
                <a href="formulario-usuario.php" class="dashboard-nav-dropdown-item">
                    Cadastrar
                </a>
                <a href="listagem-usuario.php" class="dashboard-nav-dropdown-item">
                    Listagem
                </a>
            </div>

            <div class='dashboard-nav-dropdown'>
                <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-calendar"></i>
                        Eventos 
                </a>
                <div class='dashboard-nav-dropdown-menu'>
                    <a href="formulario-evento.php" class="dashboard-nav-dropdown-item">
                        Cadastrar
                    </a>
                    <a href="listagem-evento.php" class="dashboard-nav-dropdown-item">
                        Listagens
                    </a>
                </div>

                <div class='dashboard-nav-dropdown'>
                <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-photo-video"></i>
                        Fotos e Banners 
                </a>
                <div class='dashboard-nav-dropdown-menu'>
                    <a href="listagem-banner.php" class="dashboard-nav-dropdown-item">
                        Listagem Banners
                    </a>
                    <a href="listagem-foto.php" class="dashboard-nav-dropdown-item ">
                        Listagem Fotos
                    </a>
                    <a href="galeria-foto.php" class="dashboard-nav-dropdown-item ">
                        Galeria Fotos
                    </a>
                    
                </div>
            </div>

            
            <div class="nav-item-divider"></div>
                <a href="formulario-perfil.php" class="dashboard-nav-item">
                    <i class="fas fa-user"></i> 
                        <?= nome_user() ?>
                    </a>
                <a href="sair.php" class="dashboard-nav-item">
                    <i class="fas fa-sign-out-alt"></i> 
                        Sair 
                </a>
        </nav>
    </div>

    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
        </header>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1><?=$titulo_pagina?></h1>
                    </div>
                    <div class='card-body'>

            <?php
                }elseif(autenticado()){
            ?>

        <nav class="dashboard-nav-list">
            <a href="index.php" class="dashboard-nav-item">
                <i class="fas fa-home"></i>
                    Início 
            </a>

            <div class='dashboard-nav-dropdown'>
                <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-calendar"></i>
                        Eventos 
                </a>
                <div class='dashboard-nav-dropdown-menu'>
                    <a href="formulario-evento.php" class="dashboard-nav-dropdown-item">
                        Cadastrar
                    </a>
                    <a href="listagem-evento.php" class="dashboard-nav-dropdown-item">
                        Listagens
                    </a>
                </div>

            <div class='dashboard-nav-dropdown'>
                <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-photo-video"></i>
                        Fotos e Banners 
                </a>
                <div class='dashboard-nav-dropdown-menu'>
                    <a href="galeria-foto.php" class="dashboard-nav-dropdown-item">
                        Galeria Fotos
                    </a>
                    <a href="listagem-foto.php" class="dashboard-nav-dropdown-item ">
                        Listagem Fotos
                    </a>
                    <a href="listagem-banner.php" class="dashboard-nav-dropdown-item ">
                        Listagem Banners
                    </a>
                </div>
            </div>

            
            <div class="nav-item-divider"></div>
                <a href="formulario-perfil.php" class="dashboard-nav-item">
                    <i class="fas fa-user"></i> 
                        <?= nome_user() ?>
                    </a>
                <a href="sair.php" class="dashboard-nav-item">
                    <i class="fas fa-sign-out-alt"></i> 
                        Sair 
                </a>
        </nav>
    </div>

    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
        </header>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1><?=$titulo_pagina?></h1> <!-- Definir nome de usuário por variável -->
                    </div>
                    <div class='card-body'>
<?php
    }else{
?>
    <nav class="dashboard-nav-list">
            <a href="formulario-login.php" class="dashboard-nav-item">
                <i class="fas fa-user"></i>
                    Login 
            </a>

        </nav>
    </div>

    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
        </header>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1><?=$titulo_pagina?></h1> <!-- Definir nome de usuário por variável -->
                    </div>
                    <div class='card-body'>
<?php
    }
?>


