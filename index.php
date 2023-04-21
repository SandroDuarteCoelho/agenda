<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="./css/estilo.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="./bootstrap-5.2.3-dist/css/bootstrap.css">
  
  <title>Agenda</title>
</head>


<body onload="time()">

  <h2>Bem-vindo à sua Agenda.</h2>
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
  <a class="btn btn-primary" href="adicionar.php?extra=1">Adicionar Evento</a>
  <a class="btn btn-primary" href="eliminar.php">Eliminar Evento</a>
  <a class="btn btn-primary" href="modificar.php">Modificar Evento</a>
  <a class="btn btn-primary" href="ver.php">Ver Eventos</a>
  
  <button onclick="limparRegistos()">Limpar Registos</button>

  <?php
  include "tempo_restante.php";
  ?>

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

  <script src="./js/script.js"></script>
</body>

</html>