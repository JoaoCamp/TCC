<?php

    session_start();    

    require ("logica-login.php");

    require ("conexao.php");
    
    

    $email = filter_input(INPUT_POST, "email"); 
    $senha = filter_input(INPUT_POST, "senha");


    $sql = "select idusuario, tipousuario, nome, email, senha, telefone from usuario where email = ?";

  
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$email]);

    $row = $stmt->fetch();

    if(!empty($row["senha"])){
        if(password_verify($senha, $row["senha"])){
            $_SESSION["idusuario"] = $row["idusuario"];
            $_SESSION["tipousuario"] = $row["tipousuario"];
            $_SESSION["nome"] = $row["nome"];
            $_SESSION["email"] = $email;
            $_SESSION["telefone"] = $row["telefone"];
            header("Location: index.php");
        }else{
            $_SESSION["result"] = false;
            $_SESSION["email"] = null;
            $_SESSION["erro"] = "Senha não confere";
            header("Location: formulario-login.php");
        } 
        }else{ 
            $_SESSION["result"] = false;
            $_SESSION["email"] = null;
            $_SESSION["erro"] = "Usuário não foi encontrado.";
            header("Location: formulario-login.php");
       
        }


?>