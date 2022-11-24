

<?php
require ("conexao.php");

session_start();
require ("logica-login.php");

$titulo_pagina = "Listagens de Eventos";
require ("cabecalho.php");

if(!autenticado()){
    $_SESSION["restrito"] = true;
    header("Location: formulario-login.php");
    die();
} 

//   echo "<pre>";
//  var_dump($conn);
//  echo "</pre>";


  $idusuario = $_SESSION["idusuario"];

    if(isAdmin()){

?>

<div class="accordion" id="accordionPanelsStayOpenExample">
<div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
        De hoje
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body"><!--Eventos em andamento-->
      <?php

        $sql = "select idevento, idusuario, nomeevento, dataevento, hora, ruanum, cidade, bairro, pais,
        estado, cep, telefone, emailevento, preco FROM evento 
         where dataevento = CURRENT_DATE
        order by idevento";

                
        $stmt = $conn->query($sql); 

      ?>

          <div class="table-responsive">
                  <table class="table table-striped ">
                      <thead>
                          <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Usuário</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Data</th>
                              <th scope="col">Hora</th>
                              <th scope="col">Endereço</th>
                              <th scope="col">Telefone</th>
                              <th scope="col">E-mail</th>
                              <th scope="col">Preço</th>
                              <th></th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          while ($row = $stmt->fetch()) {
                              $idevento = $row["idevento"];
                              $idevento = $row["idusuario"];
                              $nomeevento = $row["nomeevento"];
                              $dataevento = $row["dataevento"];
                              $hora = $row["hora"];
                              $ruanum = $row["ruanum"];
                              $cidade = $row["cidade"];
                              $bairro = $row["bairro"];
                              $pais = $row["pais"];
                              $estado = $row["estado"];
                              $cep = $row["cep"];
                              $telefone = $row["telefone"];
                              $emailevento = $row["emailevento"];
                              $preco = $row["preco"];
                          ?>
                              <tr>
                                  <td><?= $row['idevento'] ?></td>
                                  <td><?= $row['idusuario'] ?></td>
                                  <td><?= $row['nomeevento'] ?></td>
                                  <td><?= $row['dataevento'] ?></td>
                                  <td><?= $row['hora'] ?></td>
                                  <td>
                                  <select>Endereço
                                      <option><?= $row['ruanum'] ?></option>
                                      <option><?= $row['cidade'] ?></option>
                                      <option><?= $row['bairro'] ?></option>
                                      <option><?= $row['pais'] ?></option>
                                      <option><?= $row['estado'] ?></option>
                                      <option><?= $row['cep'] ?></option>
                                  </select>
                                  </td>
                                  <td><?= $row['telefone'] ?></td>
                                  <td><?= $row['emailevento'] ?></td>
                                  <td><?= $row['preco'] ?></td>
                                  <td>
                                      <a href="formulario-edicao.php?idevento=<?= $row['idevento']  ?>" class="btn btn-sm btn-warning">
                                          Editar 
                                      </a>
                                  </td>
                                  <td class="text-center">
                                      <a class="btn btn-sm btn-danger" href="excluir-evento.php?idevento=<?= $row['idevento'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
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

                      </tbody>
                  </table>
              </div>
          </section>




      </div><!---->
    </div>

    <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Em andamento
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body"> <!--Eventos Totais--><!--Eventos em andamento-->
      <?php

        $sql = "select idevento, idusuario, nomeevento, dataevento, hora, ruanum, cidade, bairro, pais,
        estado, cep, telefone, emailevento, preco FROM evento 
         where dataevento > CURRENT_DATE
        order by idevento";

                
        $stmt = $conn->query($sql); 

      ?>

          <div class="table-responsive">
                  <table class="table table-striped ">
                      <thead>
                          <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Usuário</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Data</th>
                              <th scope="col">Hora</th>
                              <th scope="col">Endereço</th>
                              <th scope="col">Telefone</th>
                              <th scope="col">E-mail</th>
                              <th scope="col">Preço</th>
                              <th></th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          while ($row = $stmt->fetch()) {
                              $idevento = $row["idevento"];
                              $idevento = $row["idusuario"];
                              $nomeevento = $row["nomeevento"];
                              $dataevento = $row["dataevento"];
                              $hora = $row["hora"];
                              $ruanum = $row["ruanum"];
                              $cidade = $row["cidade"];
                              $bairro = $row["bairro"];
                              $pais = $row["pais"];
                              $estado = $row["estado"];
                              $cep = $row["cep"];
                              $telefone = $row["telefone"];
                              $emailevento = $row["emailevento"];
                              $preco = $row["preco"];
                          ?>
                              <tr>
                                  <td><?= $row['idevento'] ?></td>
                                  <td><?= $row['idusuario'] ?></td>
                                  <td><?= $row['nomeevento'] ?></td>
                                  <td><?= $row['dataevento'] ?></td>
                                  <td><?= $row['hora'] ?></td>
                                  <td>
                                  <select>Endereço
                                      <option><?= $row['ruanum'] ?></option>
                                      <option><?= $row['cidade'] ?></option>
                                      <option><?= $row['bairro'] ?></option>
                                      <option><?= $row['pais'] ?></option>
                                      <option><?= $row['estado'] ?></option>
                                      <option><?= $row['cep'] ?></option>
                                  </select>
                                  </td>
                                  <td><?= $row['telefone'] ?></td>
                                  <td><?= $row['emailevento'] ?></td>
                                  <td><?= $row['preco'] ?></td>
                                  <td>
                                      <a href="formulario-edicao.php?idevento=<?= $row['idevento']  ?>" class="btn btn-sm btn-warning">
                                          Editar 
                                      </a>
                                  </td>
                                  <td class="text-center">
                                      <a class="btn btn-sm btn-danger" href="excluir-evento.php?idevento=<?= $row['idevento'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
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

                      </tbody>
                  </table>
              </div>
          </section>




      </div><!---->
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Finalizados
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body"><!--Eventos Finalizados-->

      <?php

        $sql = "select idevento, idusuario, nomeevento, dataevento, hora, ruanum, cidade, bairro, pais,
                estado, cep, telefone, emailevento, preco FROM evento 
                where dataevento < CURRENT_DATE
                order by idevento";

                
        $stmt = $conn->query($sql); 

      ?>

      <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Preço</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                            $idevento = $row["idevento"];
                            $idevento = $row["idusuario"];
                            $nomeevento = $row["nomeevento"];
                            $dataevento = $row["dataevento"];
                            $hora = $row["hora"];
                            $ruanum = $row["ruanum"];
                            $cidade = $row["cidade"];
                            $bairro = $row["bairro"];
                            $pais = $row["pais"];
                            $estado = $row["estado"];
                            $cep = $row["cep"];
                            $telefone = $row["telefone"];
                            $emailevento = $row["emailevento"];
                            $preco = $row["preco"];
                        ?>
                            <tr>
                                <td><?= $row['idevento'] ?></td>
                                <td><?= $row['idusuario'] ?></td>
                                <td><?= $row['nomeevento'] ?></td>
                                <td><?= $row['dataevento'] ?></td>
                                <td><?= $row['hora'] ?></td>
                                <td>
                                <select>Endereço
                                    <option><?= $row['ruanum'] ?></option>
                                    <option><?= $row['cidade'] ?></option>
                                    <option><?= $row['bairro'] ?></option>
                                    <option><?= $row['pais'] ?></option>
                                    <option><?= $row['estado'] ?></option>
                                    <option><?= $row['cep'] ?></option>
                                </select>
                                </td>
                                <td><?= $row['telefone'] ?></td>
                                <td><?= $row['emailevento'] ?></td>
                                <td><?= $row['preco'] ?></td>
                                <td>
                                    <a href="formulario-edicao.php?idevento=<?= $row['idevento']  ?>" class="btn btn-sm btn-warning">
                                        Editar 
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-danger" href="excluir-evento.php?idevento=<?= $row['idevento'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
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
    
                    </tbody>
                </table>
            </div>
        </section>

    
      
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
        Todos
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
      <div class="accordion-body"> <!--Eventos Totais-->

      <?php
      
        $sql = "select idevento, idusuario, nomeevento, dataevento, hora, ruanum, cidade, bairro, pais,
        estado, cep, telefone, emailevento, preco FROM evento order by idevento";
        $stmt = $conn->query($sql); 

      ?>


      <div class="container">
        <section>
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Preço</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                            $idevento = $row["idevento"];
                            $idusuario = $row["idusuario"];
                            $nomeevento = $row["nomeevento"];
                            $dataevento = $row["dataevento"];
                            $hora = $row["hora"];
                            $ruanum = $row["ruanum"];
                            $cidade = $row["cidade"];
                            $bairro = $row["bairro"];
                            $pais = $row["pais"];
                            $estado = $row["estado"];
                            $cep = $row["cep"];
                            $telefone = $row["telefone"];
                            $emailevento = $row["emailevento"];
                            $preco = $row["preco"];
                        ?>
                            <tr>
                                <td><?= $row['idevento'] ?></td>
                                <td><?= $row['idusuario'] ?></td>
                                <td><?= $row['nomeevento'] ?></td>
                                <td><?= $row['dataevento'] ?></td>
                                <td><?= $row['hora'] ?></td>
                                <td>
                                <select>Endereço
                                    <option><?= $row['ruanum'] ?></option>
                                    <option><?= $row['cidade'] ?></option>
                                    <option><?= $row['bairro'] ?></option>
                                    <option><?= $row['pais'] ?></option>
                                    <option><?= $row['estado'] ?></option>
                                    <option><?= $row['cep'] ?></option>
                                </select>
                                </td>
                                <td><?= $row['telefone'] ?></td>
                                <td><?= $row['emailevento'] ?></td>
                                <td><?= $row['preco'] ?></td>
                                <td>
                                    <a href="formulario-edicao.php?idevento=<?= $row['idevento']  ?>" class="btn btn-sm btn-warning">
                                        Editar 
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-danger" href="excluir-evento.php?idevento=<?= $row['idevento'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
                                            return false;">
                                        Excluir
                                    </a>
                                </td>
                            </tr>


                          <?php
                        }
                            }else{

                            require ("conexao.php");
                            $idusuario = $_SESSION["idusuario"];

                            $sql = "select idevento, nomeevento, dataevento, hora, ruanum, cidade, bairro, pais,
                            estado, cep, telefone, emailevento, preco FROM evento WHERE idusuario = $idusuario";

                            $stmt = $conn->query($sql);
                          ?>

              <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Preço</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                            $idevento = $row["idevento"];
                            $nomeevento = $row["nomeevento"];
                            $dataevento = $row["dataevento"];
                            $hora = $row["hora"];
                            $ruanum = $row["ruanum"];
                            $cidade = $row["cidade"];
                            $bairro = $row["bairro"];
                            $pais = $row["pais"];
                            $estado = $row["estado"];
                            $cep = $row["cep"];
                            $telefone = $row["telefone"];
                            $emailevento = $row["emailevento"];
                            $preco = $row["preco"];
                        ?>
                            <tr>
                                <td><?= $row['idevento'] ?></td>
                                <td><?= $row['nomeevento'] ?></td>
                                <td><?= $row['dataevento'] ?></td>
                                <td><?= $row['hora'] ?></td>
                                <td>
                                <select>Endereço
                                    <option><?= $row['ruanum'] ?></option>
                                    <option><?= $row['cidade'] ?></option>
                                    <option><?= $row['bairro'] ?></option>
                                    <option><?= $row['pais'] ?></option>
                                    <option><?= $row['estado'] ?></option>
                                    <option><?= $row['cep'] ?></option>
                                </select>
                                </td>
                                <td><?= $row['telefone'] ?></td>
                                <td><?= $row['emailevento'] ?></td>
                                <td><?= $row['preco'] ?></td>
                                <td>
                                    <a href="formulario-edicao.php?idevento=<?= $row['idevento']  ?>" class="btn btn-sm btn-warning">
                                        Editar 
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-danger" href="excluir-evento.php?idevento=<?= $row['idevento'] ?>" onclick="if (!confirm('Tem certeza que deseja excluir?'))
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
    
                    </tbody>
                </table>
            </div>
        </section>

    </div>

      </div>
    </div>
  </div>
</div>
  
<?php
                            }                   
require("rodape.php");

?>