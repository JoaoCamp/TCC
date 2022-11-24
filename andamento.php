<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Eventos Manager</title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap'>
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link rel="icon" href="./img/logosite.png">



</head>

<body>
  <!-- partial:index.partial.html -->
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos Manager</title>
  </head>

  <body>

    <script>

      const dropItems = document.getElementById("drop-items");

      new Sortable(dropItems, {
        animation: 150,
        chosenClass: "sortable-chosen",
        dragClass: "sortable-drag",
        store: {
          set: (sortable) => {
            const order = sortable.toArray();
            localStorage.setItem(sortable.options.group.name, order.join("|"));
          },

          get: (sortable) => {
            const order = localStorage.getItem(sortable.options.group.name);
            return order ? order.split("|") : [];
          }
        }
      });

    </script>

    <style>
      :root {
        --first-color: #272a3a;
        --first-color-light: #8a8eaa;
        --first-color-lighten: #f8f8fc;
        --body-font: "Poppins", sans-serif;
        --normal-font-size: 1rem;
        --smaller-font-size: 0.813rem;
      }

      *,
      ::before,
      ::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: var(--body-font);
        background-color: var(--first-color-lighten);
      }

      header {
        display: grid;
        justify-items: center;
        align-items: center;
      }

      h1 {
        margin: 0;
      }

      a {
        text-decoration: none;
      }

      img {
        max-width: 100%;
        height: auto;
      }

      .drop {
        height: 100vh;
        display: grid;
        align-items: center;
        justify-content: center;
      }

      .drop__container {
        display: grid;
        row-gap: 1rem;
        padding: 1.5rem;
        box-shadow: 1px 2px 50px 2px rgba(0, 0, 0, 0.3);

        border-radius: 1rem;
      }

      .drop__list {
        display: grid;
        row-gap: 1rem;
      }

      .drop__card,
      .drop__data {
        display: flex;
        align-items: center;
      }

      .drop__card {
        width: 360px;
        justify-content: space-between;
        padding: 0.75rem 1.25rem 0.75rem 0.75rem;
        background-color: var(--first-color-lighten);
        box-shadow: 4px 4px 16px #e1e1e1, -2px -2px 16px #fff;
        border-radius: 1rem;
      }

      .drop__img {
        width: 55px;
        height: 55px;
        border-radius: 1rem;
        margin-right: 1rem;
      }

      .drop__name {
        font-size: var(--normal-font-size);
        color: var(--first-color);
        font-weight: 500;
      }

      .drop__profession {
        font-size: var(--smaller-font-size);
        color: var(--first-color-light);
      }

      .drop__social {
        margin: 0 0.375rem;
        color: var(--first-color-light);
        transition: 0.4s;
      }

      .drop__social:hover {
        color: var(--first-color);
      }

      .sortable-chosen {
        box-shadow: 8px 8px 32px #e1e1e1;
        cursor: grabbing;
      }

      .sortable-drag {
        opacity: 0;
      }

      .button {
        background-color: white;
        border: none;
        color: black;
        padding: 1vh 3vw;
        font-size: 8px;
        cursor: pointer;
        margin: 0px 20px;
        border-radius: 10px;
        text-decoration: none;
      }


      .button:hover {
        background-color: black;
        color: white;
      }
    </style>

    <nav class="navbar navbar-dark" style="background-color:black">

      <img class="fade-in" src="./img/logo.png" style="width:20vh; padding: 10px 0px 10px 25px;">

      <a class="button" href="eventos.php">

        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="auto" fill="currentColor" class="bi bi-chevron-left"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
        </svg>

      </a>

    </nav>

    <div class="drop">
      <div class="drop__container">
        <header>
          <h1>
            <center> Eventos atuais </center>
          </h1>
        </header>
        <div class="drop__list" id="drop-items">
          <div class="drop__card">
            <div class="drop__data">
              <img src="https://media.discordapp.net/attachments/875534250802290728/1040792905192849488/djarana.jpg"
                alt="" class="drop__img">
              <div>
                <h1 class="drop__name">Baile do mago </h1>
                <span class="drop__profession">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Descrição...
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong>

<!-- (conteudo) -->



                        </strong>
                      </div>
                    </div>
                  </div>



                </span>
              </div>
            </div>


          </div>


          <div class="drop__card">
            <div class="drop__data">
              <img src="https://media.discordapp.net/attachments/875534250802290728/1040792904920207430/circo.jpg"
                alt="" class="drop__img">
              <div>
                <h1 class="drop__name"> Circo du Sol</h1>
                <span class="drop__profession">

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Descrição...
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong> <!-- (conteudo) -->

                        </strong>
                      </div>
                    </div>
                  </div>
              </div>


              </span>
            </div>
          </div>

          <div>

          </div>
        </div>

        <div class="drop__card">
          <div class="drop__data">
            <img
              src="https://media.discordapp.net/attachments/875534250802290728/1040792904626622554/barzin.jpg?width=901&height=676"
              alt="" class="drop__img">
            <div>
              <h1 class="drop__name">Inauguração da Julio'sBar</h1>
              <span class="drop__profession">

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Descrição...
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong> <!-- (conteudo) -->
                     

                      </strong>
                    </div>
                  </div>
                </div>
            </div>

            </span>
          </div>
        </div>


      </div>



      <div>

      </div>

    </div>
    </div>
    </div>
  </body>

  </html>
  <!-- partial -->
  <script src='https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js'></script>
  <script src='https://unpkg.com/boxicons@2.1.2/dist/boxicons.js'></script>
  <script src="./script.js"></script>

</body>

</html>