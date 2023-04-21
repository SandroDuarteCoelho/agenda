<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Eliminar Evento</title>


  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="./bootstrap-5.2.3-dist/css/bootstrap.css">
  <link rel="stylesheet" href="./css/tabela.css">
  <link rel="stylesheet" type="text/css" href="./css/ver.css">
</head>


<body onload="time()">
  <br>
  <script>
    dayName = new Array("domingo", "segunda", "terça", "quarta", "quinta", "sexta", "sábado")
    monName = new Array("janeiro", "fevereiro", "março", "abril", "maio", "junho", "agosto", "outubro", "novembro", "dezembro")
    now = new Date
    document.write("<div style='text-align: center'><h1> Hoje é " + dayName[now.getDay()] + ", " + now.getDate() + " de " + monName[now.getMonth()] + " de " + now.getFullYear() + ". </h1>")
  </script>

  <div id="txt" style="font-size: 50px;"></div>

  </head>



  <div class="form-wrap">
    <h1>Eliminar Evento</h1>
    <?php
    include "ver2.php";
    ?>
  </div>
  <div id="container">
    <form action="test.php" method="POST">
      <div class="row g-3">
        <div class="form-group">
          <div class="col-md-12">
            <input type="number" name="id" id="id" placeholder="Qual o evento a eliminar?" min="1" max="100" required>
            <input type="hidden" name="extra" value="2">
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Eliminar</button>
            <button type="submit" class="btn btn-dark" onclick="window.location.href = 'index.php';">Voltar</button>
          </div>
        </div>
    </form>
  </div>

  <script src="/js/script.js"></script>
</body>

</html>