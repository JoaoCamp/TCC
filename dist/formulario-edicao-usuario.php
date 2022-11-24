<?php
    session_start();
    require ("logica-login.php");

    if(!autenticado()){
        $_SESSION["restrito"] = true;
        header("Location: formulario-login.php");
        die();
    } 

    $titulo_pagina = "Alterar Usuário";
    require ("cabecalho.php");

    

    //   echo "<pre>";
    //  var_dump($conn);
    //  echo "</pre>";

    require("conexao.php");


    // $email = filter_input(INPUT_POST, 'email');

    $idusuario = filter_input(INPUT_GET, "idusuario");

    //var_dump($_SESSION);

    $sql = "select tipousuario, nome, email, telefone from usuario WHERE idusuario = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$idusuario]);

    $row = $stmt->fetch();
?>


        <section>
            <form action="alterar-usuario.php" method="POST">
            <br>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome usuário" value="<?= $row["nome"] ?>">
                        <label for="floatingInputGrid">Nome</label>
                    </div>
                </div>

                <br>
                <div class="form-floating">
                            <div class="input-group mb-3">
                                <span class="input-group-text">@</span>
                                <input type="email" id="email" name="email" class="form-control" placeholder="exemplo@exemplo.com" style="height: calc(3.5rem + 2px);" value="<?= $row["email"] ?>">
                            </div>
                        </div>


                    <div class="form-floating">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                </svg>
                            </span>
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="" aria-describedby="basic-addon1" style="height: calc(3.5rem + 2px);" value="<?= $row["telefone"] ?>">
                        </div>
                    </div>
  


                <br>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label pt-0">Tipo de Usuário:</legend>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipousuario" id="tipousuario1" <?php if($row["tipousuario"] != "Administrador"){ echo "checked"; } ?> value="Usuário Padrão">
                                    <label class="form-check-label" for="tipousuario1">
                                            Usuário Padrão
                                        </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Administrador" name="tipousuario" id="tipousuario2" <?php if($row["tipousuario"] == "Administrador"){ echo "checked"; } ?> >
                                    <label class="form-check-label" for="tipousuario2">
                                            Administrador
                                        </label>
                                </div>
                            </div>
                        </div>
                </fieldset>
     


                <br>

                <button type="submit" class="btn btn-primary">Gravar</button>
                
            </form>
        </section>

    </div><br>

    <?php

if (isset($_SESSION["result"])) {
    if ($_SESSION["result"]) {
?>

        <div class="alert alert-success container" role="alert" >
            <h4 class="alert heading"> Sucesso!</h4>
            <p>Usuário alterado corretamente.</p>
        </div>

    <?php
    } else {
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


?>

<?php

require("rodape.php");

?>