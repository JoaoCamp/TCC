

    <section>
        <form action="inserir-usuario.php" method="POST" enctype="multipart/form-data">
        <br>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome usuário" required>
                    <label for="floatingInputGrid">Nome</label>
                </div>
            </div>

            <br>

            <div class="row g-2">
            <div class="col-md-6">
                <div class="form-floating">
                    <div class="input-group mb-3">
                        <span class="input-group-text">@</span>
                        <input type="email" id="email" name="email" class="form-control" placeholder="exemplo@exemplo.com" style="height: calc(3.5rem + 2px);">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                            </svg>
                        </span>
                        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="0123456789" aria-describedby="basic-addon1" style="height: calc(3.5rem + 2px);">
                    </div>
                </div>
            </div>
            </div>




            <div class="col-md">
                    <div class="form-floating">
                    <input type="password" class="form-control" id="senha" minlength="6" maxlength="20" name="senha" placeholder="password" style="margin-top: 10px;" required>
                    <label for="floatingInputGrid">Senha</label>
                    <span id="passwordHelpInline" class="form-text">
                        Minímo 6 e máximo 20 caracteres.
                </span>
                </div>
            </div><br>
            <div class="col-md">
                    <div class="form-floating">
                    <input class="form-control" type="password" class="form-control" id="conf_senha" name="conf_senha" 
                                onblur="verifica_senhas()" placeholder="confirmação" required>
                    <label for="floatingInputGrid">Confirme sua senha</label>
                </div>
            </div>
            
            <br>

            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label pt-0">Tipo de Usuário:</legend>
                <div class="col-sm-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipousuario" id="tipousuario" value="Usuário Padrão">
                        <label class="form-check-label" for="flexRadioDefault1">
                                Usuário Padrão
                            </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipousuario" id="tipousuario" value="Administrador">
                        <label class="form-check-label" for="flexRadioDefault2">
                                Administrador
                            </label>
                    </div>
                
                </div>
                </div>
            </fieldset>
            
            <br>

            <button type="submit" class="btn btn-primary">Gravar</button>
            <button type="reset" class="btn btn-warning">Cancelar</button>
        </form>
    </section>

                  
       
    <?php

    if (isset($_SESSION["result"])) {

        if (!$_SESSION["result"]) {
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

    <script>
        function verifica_senhas(){
            var senha = document.getElementById("senha");
            var conf_senha = document.getElementById("conf_senha");

            if(senha.value && conf_senha.value){
                if(senha.value != conf_senha.value){
                    senha.classList.add("is-invalid");
                    conf_senha.classList.add("is-invalid");
                    conf_senha.value = null;
                }else{
                    senha.classList.remove("is-invalid");
                    conf_senha.classList.remove("is-invalid");
                }
            }

        }
    </script>


<?php

require("rodape.php");

?>