<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css%22/%3E
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js%22%3E</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <title>Eventos Manager</title>
  <link rel="icon" href="./img/logosite.png">
</head>

<style>
  @import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css');

  #container-vertical {
    font-family: arial;
    display: flex;
    align-items: center;
    height: 100%;
    background: #efefef;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;

  }

  #container-horizontal {
    width: 100%;
    padding: 10%;
  }

  #painel-botoes {
    display: block;
    flex-wrap: wrap;

  }

  .botao1 {
    background: #f9f9f9;
    width: 70%;
    flex-grow: 1;
    margin: 10px;
    height: 20vh;
    border-radius: 10px;
    border-color: #0e0e0e;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    cursor: pointer;
    box-shadow: 4px 6px 10px gray;
  }

  .botao2 {
    background: #f9f9f9;
    width: 70%;
    flex-grow: 1;
    margin: 10px;
    height: 20vh;
    border-radius: 10px;
    border-color: #0e0e0e;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    cursor: pointer;
    margin-top: 20px;
    box-shadow: 4px 6px 10px gray;
  }

  .botao:hover {
    box-shadow: 4px 6px 43px -10px #CCC !important;
    position: relative;
    bottom: -2px;


    transition: 0.2s;
  }

  .icone-botao {
    font-size: 7vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 70%;
  }

  .nome-botao {
    width: 100%;
    text-align: center;
    background: #ffffff;
    padding: 5px 0px;
    border-radius: inherit;
    box-shadow: -1px -6px 7px -10px #696969;
    display: flex;
    flex-direction: column;
    height: 30%;
    justify-content: center;
    font-size: 2vh;
    text-transform: uppercase;
    color: #151515;
  }

  .b1 {
    color: #2ec908;
  }

  .b2 {
    color: #ff0000;
  }
</style>

<body>

  <center>

    <div id="container-vertical">
      <div id="container-horizontal">
        <div id="painel-botoes">

          <a class="botao1" href="andamento.php" style="text-decoration: none;">
            <div class="icone-botao b1">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-calendar2-check" viewBox="0 0 16 16" style="width: 100%; height: 60%;">
                <path
                  d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                <path
                  d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
              </svg>
            </div>
            <div class="nome-botao">
              Eventos em andamento
            </div>

          </a>

          <a class="botao2" href="encerrado.php" style="text-decoration: none;">
            <div class="icone-botao b2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-calendar2-x" viewBox="0 0 16 16" style="width: 100%; height: 60%;">
                <path
                  d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z" />
                <path
                  d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
              </svg>
            </div>
            <div class="nome-botao">
              Eventos encerrados
            </div>
          </a>
        </div>
      </div>
    </div>
    </div>
  </center>

  <nav class="navbar navbar-dark" style="background-color:black">

    <img class="fade-in" src="./img/logo.png" style="width:20vh; padding: 10px 0px 10px 25px;">

  </nav>

  <footer class="fixed-bottom">
    <nav class="navbar navbar-dark" style="background-color:black; height:6.5vh;">

    </nav>
  </footer>

</body>

</html>