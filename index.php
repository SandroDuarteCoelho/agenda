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




<body class="text-center" ; onload="time()" ;>
  <?php



  /*  $conn = new mysqli('localhost', 'root', 'password', 'Agenda');

 
  if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
  }

  
  $sql = "SELECT MAX(id) as last_id FROM Utilizadores";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $last_id = $row["last_id"];

  $usuarios = array();
  for ($id = 1; $id <= $last_id; $id++) {
    $sql = "SELECT nome, pass FROM Utilizadores WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      
      $row = $result->fetch_assoc();
      $usuarios["nome$id"] = $row["nome"];
      $usuarios["pass$id"] = $row["pass"];
    }
  }
  $conn->close();
 
  print_r($usuarios); */

  // Faça a validação com os valores armazenados nos arrays
  // ...








  ?>





  <br><br>
  <h3>Agenda Pessoal</h3>
  <br>
  <div class="container text-center">
    <div class="row justify-content-md-center">
      <div class="col col-lg-8">


        <div class="card mb-3" style="max-width: 840px;">
          <div class="row g-0">
            <div class="col-md-5">
              <img src="./images/porta.jpg" class="img-fluid rounded-start" alt="Porta de entrada">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title">Faça o Registo</h5>
                <br>

                <form method="post" action="test.php">
                  <div class="col-md">
                    <div class="form-floating">
                      <input type="text" name="utilizador" class="form-control" id="iutilizador" autocomplete="off" placeholder="">
                      <label for="floatingInputGrid">Utilizador</label>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-floating">
                      <input type="password" name="senha" class="form-control" id="isenha" autocomplete="off" placeholder="">
                      <input type="hidden" name="extra" value="0">
                      <label for="floatingInputGrid">Password</label>
                    </div>
                  </div>
                  <br>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-primary" type="submit">Entrar</button>
                    <button class="btn btn-warning" type="button">Novo Utilizador</button>
                  </div>
                  <p class="card-text"><small class="text-muted">Hoje é <span id="diaSemana"></span>, <time datetime="now"></time></a><a id="txt"></a></small></p>
                  <div id="txt"></div>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>


  </div>
  </div>
  <script>
    const diasSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
    const dataAtual = new Date();
    const diaAtual = dataAtual.getDay();
    document.getElementById('diaSemana').innerHTML = diasSemana[diaAtual];
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>

</html>