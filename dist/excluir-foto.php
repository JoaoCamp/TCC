<?php
session_start();
require("logica-login.php");

$titulo_pagina = "Deletar Fotos do BD";

require("cabecalho.php");

if(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
} 

require ("conexao.php");

$idimg = filter_input(INPUT_GET, "idimg");


$sql = "delete from imagens where idimg = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$idimg]);

if ($result == true) {
?>

                <div class="alert alert-success" role="alert">
                    <h4>Registro removido com sucesso!</h4>
                </div>

            <?php
            } else {
            ?>

                <div class="alert alert-danger" role="alert">
                    <h4>Falha ao efetuar exclusão.</h4>
                    <p><?php echo $stmt->error; ?></p>
                </div>
            <?php
            }

            ?>
            <p>
                <a href="listagem-foto.php" class="btn btn-info">Voltar à listagem</a>
            </p>
        </section>

    </div>
<?php
require("rodape.php");

?>