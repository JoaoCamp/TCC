
<?php

session_start();
require ("logica-login.php");

$titulo_pagina = "Cadastro de Eventos";
require ("cabecalho.php");

   if(!autenticado()){
        $_SESSION["restrito"] = true;
        header("Location: formulario-login.php");
        die();
    } 


//  echo "<pre>";
//var_dump($_SESSION);
//  echo "</pre>";
?>


    <div class="container">

        
        <section>
            <form action="inserir-evento.php" method="POST" enctype="multipart/form-data">
                
            <div class="col-md">
                    <div class="form-floating">
                    <input type="text" class="form-control" id="nomeevento" name="nomeevento" placeholder="Nome do evento">
                    <label for="floatingInputGrid">Nome</label>
            </div>
            <br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                    <input type="date" class="form-control" id="dataevento" name="dataevento" placeholder="dd/mm/aa">
                    <label for="floatingInputGrid">Data</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="time" class="form-control" id="hora" name="hora" placeholder="hh:mm">
                    <label for="floatingInputGrid">Hora</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="form-floating">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="E-mail para contato"  id="emailevento" name="emailevento" aria-describedby="basic-addon1" style="height: calc(3.5rem + 2px);">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                </svg>
                            </span>
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Tel. para contato" aria-describedby="basic-addon1" style="height: calc(3.5rem + 2px);">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" placeholder="Valor em R$ do ingresso" id="preco" name="preco" style="height: calc(3.5rem + 2px);">
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion" id="accordionExample" style="margin-top: 10px;">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" 
                        aria-controls="collapseOne" style="color: #000000; background: #ffffff;">
                            Endere??o
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="ruanum" name="ruanum" placeholder="Nome do evento">
                                    <label for="floatingInputGrid">Logradouro</label>
                                </div>
                            </div>
                            <br>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Cidade" id="cidade" name="cidade">
                                        <label for="floatingInputGrid">Cidade</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="Bairro" id="bairro" name="bairro">
                                        <label for="floatingInputGrid">Bairro</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="pais" name="pais" value="Brasil" readonly>
                                        <label for="floatingInputGrid" class="form-label">Pa??s</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select id="estado" name="estado" class="form-select" style="padding-top: 0.625em !important;">
                                        <label for="floatingInputGrid">Estado</label>
                                            <option selected>Estado</option>
                                            <option>Acre</option>
                                            <option>Alagoas</option>
                                            <option>Amap??</option>
                                            <option>Amazonas</option>
                                            <option>Bahia</option>
                                            <option>Cear??</option>
                                            <option>Distrito Ferederal</option>
                                            <option>Esp??rito Santo</option>
                                            <option>Goi??s</option>
                                            <option>Maranh??o</option>
                                            <option>Mato Grosso</option>
                                            <option>Mato Grosso do Sul</option>
                                            <option>Minas Gerais</option>
                                            <option>Par??</option>
                                            <option>Para??ba</option>
                                            <option>Paran??</option>
                                            <option>Pernambuco</option>
                                            <option>Piau??</option>
                                            <option>Rio de Janeiro</option>
                                            <option>Rio Grande do Norte</option>
                                            <option>Rio Grande do Sul</option>
                                            <option>Rond??nia</option>
                                            <option>Roraima</option>
                                            <option>Santa Catarina</option>
                                            <option>S??o Paulo</option>
                                            <option>Sergipe</option>
                                            <option>Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="cep" name="cep" placeholder="CEP">
                                        <label for="floatingInputGrid" class="form-label">CEP</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Comente brevemento sobre o evento a ser cadastrado" id="descricao" name="descricao" style="height: 100px; margin-top:25px"></textarea>
                        <label for="floatingInputGrid">Descri????o do evento</label>
                    </div>                    
                </div>              
                <div class="mb-3" style="margin-top: 10px;">
                    <label for="banner" class="form-label">Banner</label>
                    <input type="file" class="form-control" id="banner" name="banner">
                </div>
                <div class="col-md" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-primary">Gravar</button>
                    <button type="reset" class="btn btn-warning">Cancelar</button>
                </div>
            </form>
  
        </section>

    </div>

    <?php

    if (isset($_SESSION["result"])) {
        if ($_SESSION["result"]) {
    ?>

        <div class="alert alert-success container" role="alert">
            <h4 class="alert heading"> Evento cadastrado com sucesso!</h4>
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