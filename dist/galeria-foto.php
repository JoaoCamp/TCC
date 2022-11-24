<?php

session_start();
require("logica-login.php");

$titulo_pagina = "Galeria de Fotos";
require("cabecalho.php");

if (!autenticado()) {
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
}

//   echo "<pre>";
//  var_dump($conn);
//  echo "</pre>";

require("conexao.php");


function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}



if (isAdmin()) {
    $sql = "select idimg, nome, tipo, tamanho, imagem FROM imagens order by idimg";
    $stmt = $conn->query($sql);

    while ($row = $stmt->fetch()) {
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

        <div class="gallery">            
                <a target="_blank" href="mostrar-foto.php?id=<?= $row["idimg"] ?>">
                    <img src="mostrar-foto.php?idimg=<?= $row["idimg"] ?>" alt="Imagem" width="200px" height="200px">
                </a>           
                     <!-- <div class="desc"><?= $row["nomeevento"] ?></div>   -->       
        </div>

    <?php
    }
} else {
    $idusuario = $_SESSION["idusuario"];

    $sql = "select i.idimg, i.nome, i.tipo, i.tamanho, i.imagem FROM 
                    imagens i 
                    join evento e on i.idevento = e.idevento
                                    WHERE e.idusuario = $idusuario order by idimg";

        $stmt = $conn->query($sql);

    while ($row = $stmt->fetch()) {

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

        <div class="gallery">     
                <a target="_blank" href="mostrar-foto.php?id=<?= $row["idimg"] ?>">
                    <img src="mostrar-foto.php?idimg=<?= $row["idimg"] ?>" alt="Imagem" />
                </a>     
                <!-- <div class="desc"><?= $row["nomeevento"] ?></div>  -->
        </div>
<?php
    }
}
require("rodape.php");
?>