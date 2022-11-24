<?php

session_start();
require ("logica-login.php");

$titulo_pagina = "Listagem de Usuários";
require ("cabecalho.php");

   if(!isAdmin()){
        $_SESSION["restrito"] = true;
        header("Location: index.php");
        die();
    }elseif(!autenticado()){
        $_SESSION["restrito"] = true;
        header("Location: formulario-login.php");
        die();
    }
?>
  
    <section>
<?php

require ("conexao.php");



$sql = "select idusuario, tipousuario, nome, email, telefone FROM usuario order by idusuario";
$stmt = $conn->query($sql);

?>

        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $stmt->fetch()) {
                        $idUsuario = $row["idusuario"];
                        $tipoUsuario= $row["tipousuario"];
                        $nome = $row["nome"];
                        $email = $row["email"];
                        $telefone = $row["telefone"];
                    ?>
                        <tr>
                            <td><?= $row['idusuario'] ?></td>
                            <td><?= $row['tipousuario'] ?></td>
                            <td><?= $row['nome'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['telefone'] ?></td>
                            <?php
                            if(isAdmin()){
                            ?>
                            <td>
                                    <a href="formulario-edicao-usuario.php?idusuario=<?= $row['idusuario']  ?>" class="btn btn-sm btn-warning">
                                        Editar 
                                    </a>
                            </td>
                            <?php
                            }
                            ?>
                            <td class="text-center">
                                <a class="btn btn-sm btn-danger" href="excluir-usuario.php?idusuario=<?= $row['idusuario'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir este usuário, mesmo que isso acometa na exclusão dos eventos cadastrados pelo mesmo?'))
                                        return false;">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

                
      

    <?php
    
    require('rodape.php');
    
    ?>