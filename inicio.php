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

  <!-- <div class="card mb-1"> -->
  <div class="row g-0">
    <div class="col-md-4">
      <img src="./images/b7.jpg" class="img-fluid rounded-start" alt="agenda">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <br><br>
        <h2 style="text-align: center">Bem-vindo à sua Agenda, <strong><?php echo $logado; ?></strong>.</h2>
        <br>
        <script>
          dayName = new Array("domingo", "segunda", "terça", "quarta", "quinta", "sexta", "sábado")
          monName = new Array("janeiro", "fevereiro", "março", "abril", "maio", "junho", "agosto", "outubro", "novembro", "dezembro")
          now = new Date
          document.write("<div style='text-align: center'><h1> Hoje é " + dayName[now.getDay()] + ", " + now.getDate() + " de " + monName[now.getMonth()] + " de " + now.getFullYear() + ". </h1>")
        </script>
        <div id="txt" style="font-size: 50px;"></div>
      </div>
    </div>
  </div>

  </div>
  <br>
  <div class="container text-center">
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
      <div class="col">
        <div class="p-2">
          <form method="POST" action="adicionar.php">
            <input type="hidden" name="extra" value="1">
            <button type="submit" class="btn btn-outline-primary">Adicionar Evento</button>
          </form>
        </div>
      </div>
      <div class="col">
        <div class="p-2">
          <form method="POST" action="mev.php">
            <input type="hidden" name="extra" value="2">
            <button type="submit" class="btn btn-outline-primary">Eliminar Eventos</button>
          </form>
        </div>
      </div>
      <div class="col">
        <div class="p-2">
          <form method="POST" action="mev.php">
            <input type="hidden" name="extra" value="3">
            <button type="submit" class="btn btn-outline-primary">Modificar Eventos</button>
          </form>
        </div>
      </div>
      <div class="col">
        <div class="p-2">
          <form method="POST" action="mev.php">
            <input type="hidden" name="extra" value="4">
            <button type="submit" class="btn btn-outline-primary">Ver Eventos</button>
          </form>
        </div>
      </div>

      <div class="col">
        <div class="p-2">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Outros
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?valor=1">Sair</a></li>
              <li><a class="dropdown-item" href="gerir_utili.php">Gerir Conta</a></li>
              <li><button onclick=limparRegistos() class="dropdown-item">Limpar Registos</button></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- <div class="modal modal-signin position-static d-block py-2" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-3 pb-2 border-bottom-0">
          <h1 class="fw-bold mb-0 fs-5">Código de segurança</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3 pt-0">
          <form>
            <div class="form-floating mb-3">
              <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 mb-2 btn btn rounded-3 btn-primary" type="submit">Verificar</button>
          </form>
        </div>
      </div>
    </div>
  </div> -->




  <?php
  include "tempo_restante.php";
  ?>



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