<?php

function autenticado(){
    
    if(!isset($_SESSION['email'])){
        return false;
    }else{
        return true;
    }
}

function isAdmin(){
    if(isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == "Administrador"){
        return true;
    }else{
        return false;
    }
}


function nome_user(){
    return $_SESSION['nome'];
}

function telefone_user(){
    return $_SESSION['telefone'];
}

function tipousuario(){
    return $_SESSION['tipousuario'];
}

function email_user(){
    return $_SESSION['email'];
}

function set_nome_user($nome){
    $_SESSION['nome'] = $nome;
}

function set_email_user($email){
    $_SESSION['email'] = $email;
}

function set_telefone_user($telefone){
    $_SESSION['telefone'] = $telefone;
}

function set_tipousuario_user($tipousuario){
    $_SESSION['tipousuario'] = $tipousuario;
}

?>