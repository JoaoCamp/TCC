
<?php
session_start();

$titulo_pagina = "Listagem de Banners";

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

    $sql = "select idevento, nomeevento, idusuario, banner, tipo from evento";
    $stmt = $conn->query($sql);

?>
     <style>
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 180px;
        }

        div.gallery:hover {
            border: 1px solid #777;
            background-color: lightblue;
            cursor: pointer;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
    </style>

            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">Banner</th>
                            <th scope="col">Evento</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                        ?>
                            <tr>
                                <td>
                                    <div class="gallery">
                                        <a target="_blank" href="mostrar-banner.php?idevento=<?= $row["idevento"] ?>">
                                            <img src="mostrar-banner.php?idevento=<?= $row["idevento"] ?>" alt="Imagem" width="200px" height="200px">
                                        </a>
                                    </div>
                                </td>
                                <td><?= $row['nomeevento'] ?></td>
                                <td><?= $row['idusuario'] ?></td>
                                <td><?= $row['tipo'] ?></td>
                                <td class="text-center"></td>
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
}else{
    require ("conexao.php");

    $idusuario = $_SESSION["idusuario"];

    $sql = "select idevento, idusuario, tipo from evento where idusuario = $idusuario";
    $stmt = $conn->query($sql);

?>

            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">Evento</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                        ?>
                            <tr>
                                <td><?= $row['idevento'] ?></td>
                                <td><?= $row['idusuario'] ?></td>
                                <td><?= $row['tipo'] ?></td>
                                <td class="text-center">
                          
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