<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <link rel="stylesheet" type="text/css" href="./bootstrap-5.2.3-dist/css/bootstrap.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Agenda</title>
</head>


<body onload="time()">

  <div class="card text-bg-light text-dark">
    <img src="./images/b7.jpg" class="card-img" alt="agenda" style="width: 300px; height: 225px;">
    <div class="card-img-overlay">
      <h2 style="text-align: center">Bem-vindo à sua Agenda.</h2>
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
            <div class="p-3">
              <button onclick="limparRegistos()" class="btn btn-light">Limpar Registos</button>
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
      // Exibe uma caixa de diálogo de confirmação com uma mensagem e dois botões "OK" e "Cancelar"
      var resultado = confirm("Tem certeza de que deseja excluir todos os eventos? Esta ação não pode ser desfeita.");

      // Verifica se o usuário clicou no botão "OK"
      if (resultado == true) {
        // Redireciona para o arquivo PHP que executará a exclusão dos registros
        window.location.href = "verificadb.php";
      }
    }
  </script>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>

</html>