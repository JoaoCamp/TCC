<?php

session_start();
require ("logica-login.php");

$titulo_pagina = "Listagem de Usuários";
require ("cabecalho.php");

   if(!autenticado()){
        $_SESSION["restrito"] = true;
        header("Location: formulario-login.php");
        die();
    } 

require("conexao.php");


$sql = "select idevento, nomeevento, dataevento, hora, ruanum, cidade, bairro, pais,
estado, cep, descricao, telefone, emailevento, preco FROM evento order by idevento";
$stmt = $conn->query($sql);

//   echo "<pre>";
//  var_dump($conn);
//  echo "</pre>";
?>


<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Em andamento
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <strong></strong> 
        

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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $stmt->fetch()) {
                        $idusuario = $row["idusuario"];
                        $tipousuario= $row["tipousuario"];
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
                            <td class="text-center">
                                <a class="btn btn-sm btn-danger" href="excluir-usuario.php?idusuario=<?= $row['idusuario'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
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
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Finalizados
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Geral
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>

<?php

require("rodape.php");

?>