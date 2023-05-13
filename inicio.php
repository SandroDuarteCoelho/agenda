<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <link rel="stylesheet" type="text/css" href="./bootstrap-5.2.3-dist/css/bootstrap.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Agenda</title>

  <?php
  session_start();
  if ((!isset($_SESSION['utilizador']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('location:index.php');
  }

  $logado = $_SESSION['utilizador'];
  $id_utilizador = $_SESSION['id'];
  ?>
</head>


<body onload="time()">

  <div class="card text-bg-light text-dark">
    <img src="./images/b7.jpg" class="card-img" alt="agenda" style="width: 300px; height: 225px;">
    <div class="card-img-overlay">
      <h2 style="text-align: center">Bem-vindo à sua Agenda, <strong><?php echo $logado; ?></strong>.</h2>
      <br>

      <script>
        dayName = new Array("domingo", "segunda", "terça", "quarta", "quinta", "sexta", "sábado")
        monName = new Array("janeiro", "fevereiro", "março", "abril", "maio", "junho", "agosto", "outubro", "novembro", "dezembro")
        now = new Date
        document.write("<div style='text-align: center'><h1> Hoje é " + dayName[now.getDay()] + ", " + now.getDate() + " de " + monName[now.getMonth()] + " de " + now.getFullYear() + ". </h1>")
      </script>


      <div id="txt" style="font-size: 50px;"></div>
      <br>
      <br>
      <br>

      <?php
      // Obtém o valor da variável "inicio" enviada por POST
      $valor = $_POST["inicio"];
      if ($valor == 1) {

      ?>
        <div class="modal modal-alert position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalChoice">
          <div class="modal-dialog" role="document">
            <div class="modal-content rounded-3 shadow">
              <div class="modal-body p-4 text-center">
                <h5 class="mb-0">Enable this setting?</h5>
                <p class="mb-0">You can always change your mind in your account settings.</p>
              </div>
              <div class="modal-footer flex-nowrap p-0">
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Yes, enable</strong></button>
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">No thanks</button>
              </div>
            </div>
          </div>
        </div>

      <?php
      }
      ?>

      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <button type="button" class="btn btn-outline-primary">Adicionar Evento</button>
        <button type="button" class="btn btn-outline-primary">Eliminar Eventos</button>
        <button type="button" class="btn btn-outline-primary">Modificar Eventos</button>
        <button type="button" class="btn btn-outline-primary">Ver Eventos</button>

        <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Outros
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Sair</a></li>
            <li><a class="dropdown-item" href="#">Gerir Conta</a></li>
            <li><a class="dropdown-item" href="#">Limpar Registos</a></li>
          </ul>
        </div>
      </div>




      <div class="container text-center">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
          <div class="col">
            <div class="p-3">
              <form method="POST" action="adicionar.php">
                <input type="hidden" name="extra" value="1">
                <button type="submit" class="btn btn-primary">Adicionar Evento</button>
              </form>
            </div>
          </div>
          <div class="col">
            <div class="p-3">
              <form method="POST" action="mev.php">
                <input type="hidden" name="extra" value="2">
                <button type="submit" class="btn btn-primary">Eliminar Eventos</button>
              </form>
            </div>
          </div>
          <div class="col">
            <div class="p-3">
              <form method="POST" action="mev.php">
                <input type="hidden" name="extra" value="3">
                <button type="submit" class="btn btn-primary">Modificar Eventos</button>
              </form>
            </div>
          </div>
          <div class="col">
            <div class="p-3">
              <form method="POST" action="mev.php">
                <input type="hidden" name="extra" value="4">
                <button type="submit" class="btn btn-primary">Ver Eventos</button>
              </form>
            </div>
          </div>
          <div class="col">
            <div class="p-6">
              <!--  <form method="POST" action="test.php"> -->
              <input type="hidden" name="extra" value="7">
              <button onclick="window.location.href = 'index.php?valor=1';" class="btn btn-light">Sair</button>
              <button type="submit" class="btn btn-secondary" onclick="window.location.href='gerir_utili.php'">Gerir conta</button>
              <br><br>
              <button onclick=limparRegistos() class="btn btn-danger"><small class="text">Limpar Registos</small></button>
              </form>
            </div>
          </div>

        </div>
      </div>


      <?php
      include "tempo_restante.php";
      ?>


    </div>
  </div>


  <script>
    function limparRegistos() {
      var resultado = confirm("Tem certeza de que deseja excluir todos os eventos? Esta ação não pode ser desfeita.");
      if (resultado == true) {
        window.location.href = "verificadb.php";
      }
    }
  </script>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>

</html>