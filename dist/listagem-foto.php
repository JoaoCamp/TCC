
<?php
session_start();

$titulo_pagina = "Listagem de Fotos";

require("logica-login.php");
require("cabecalho.php");

if(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
} 

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}


if(isAdmin()){

    require ("conexao.php");

    $sql = "select idimg, idevento, nome, tipo, tamanho, imagem FROM imagens order by idimg";
    $stmt = $conn->query($sql);

?>

            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Evento</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Tamanho</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                        ?>
                            <tr>
                                <td><?= $row['idimg'] ?></td>
                                <td><?= $row['idevento'] ?></td>
                                <td><?= $row['nome'] ?></td>
                                <td>
                                    <?= $row['tipo'] ?>
                                </td>
                                <td>
                                    <?= formatBytes($row['tamanho']); ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="visualizar-foto.php?idimg=<?= $row['idimg'] ?>" title="Visualizar" target="_blank">
                                    Visualizar
                                    </a>
                                    <a class="btn btn-sm btn-primary" href="baixar-foto.php?idimg=<?= $row['idimg'] ?>" title="Baixar" target="_blank">
                                    Baixar
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="excluir-foto.php?idimg=<?= $row['idimg'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
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

    </div>
<?php
}elseif(autenticado()){

require ("conexao.php");

$idusuario = $_SESSION["idusuario"];

$sql = "select i.idimg, i.idevento, i.nome, i.tipo, i.tamanho, i.imagem FROM 
                imagens i 
                join evento e on i.idevento = e.idevento
                                WHERE e.idusuario = $idusuario order by idimg";

    $stmt = $conn->query($sql);

?>

        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Tamanho</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $stmt->fetch()) {
                    ?>
                        <tr>
                            <td><?= $row['idimg'] ?></td>
                            <td><?= $row['idevento'] ?></td>
                            <td><?= $row['nome'] ?></td>
                            <td>
                                <?= $row['tipo'] ?>
                            </td>
                            <td>
                                <?= formatBytes($row['tamanho']); ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-primary" href="visualizar-foto.php?idimg=<?= $row['idimg'] ?>" title="Visualizar" target="_blank">
                                Visualizar
                                </a>
                                <a class="btn btn-sm btn-primary" href="baixar-foto.php?idimg=<?= $row['idimg'] ?>" title="Baixar" target="_blank">
                                Baixar
                                </a>
                                <a class="btn btn-sm btn-danger" href="excluir-foto.php?idimg=<?= $row['idimg'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
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

</div>
<?php
}
require("rodape.php")
?>