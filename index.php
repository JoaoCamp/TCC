<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title> Eventos Manager </title>
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css%22/%3E
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js%22%3E">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link rel="icon" href="./img/logosite.png">
</head>

<style>

button {
  background-color: #53475e;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  margin: 20px 4px;
  border-radius: 4px;
}


button:hover {
  background-color: #ba8de0;
}

</style>

<body>

  <div class="splash">

    <img class="fade-in" src="./img/logo.png">
    
  </div>

  <script src="./script.js"></script>

  <center>
 
    <div id="container-vertical">
      <div id="container-horizontal">
        <div id="painel-botoes">

          <p style="font-size:3vh;"> <strong> Seja Bem-Vindo(a), ao Eventos Manager! </strong></p>

          <br>

          <p style="font-size:2.25vh;"> Aqui você encontrará os mais diversificados eventos que estão ocorrendo ao seu
            redor. Sinta-se livre para explorar nossas listagens e visualizar todo o conteúdo disponível. </p>

          <br>

          <form action="eventos.php">
            <button type="submit" class="btn-list"
              style="width: auto; text-align: center; background: black; padding: 15px 15px; border-radius: 20px; height: 30%; justify-content: center; font-size: 2vh; color: white;">
              Acessar
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-arrow-right-circle" viewBox="0 0 16 16" style="width: 25px;">
                <path fill-rule="evenodd"
                  d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
              </svg>
            </button>
          </form>
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