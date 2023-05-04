<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Adicionar Evento</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="./bootstrap-5.2.3-dist/css/bootstrap.css">
</head>

<body>

  <div id="container">
    <?php
    $valor = $_POST['extra']; // só pode ser 1 ou 3
    $id = $_POST['id'];  // usado apenas para modificar
    if ($valor == 3) {
      $conteudo_h1 = "Modificar Evento " . $id;
      $v = "3";

      $conexao = mysqli_connect('localhost', 'root', 'password', 'Agenda');
      // Busca os dados do usuário com o ID selecionado
      $query = "SELECT * FROM Eventos WHERE id = ?";
      $stmt = mysqli_prepare($conexao, $query);
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);
      $resultado = mysqli_stmt_get_result($stmt);
      $dados_usuario = mysqli_fetch_array($resultado);
      // Preenche os campos do formulário com os valores do usuário
      $nomevelho = $dados_usuario['nome'];
      $localvelho = $dados_usuario['locale'];
      $notasvelho = $dados_usuario['notas'];
      $horavelho = $dados_usuario['hora'];
      $datavelho = $dados_usuario['datas'];
      mysqli_close($conexao);
    } else {
      $conteudo_h1 = "Adicionar Evento";
      $v = "1";
      $nomevelho = "";
      $localvelho = "";
      $notasvelho = "";
      $datavelho = "";
    }
    ?>

    <br><br>

    <div class="container text-center">
      <div class="row justify-content-md-center ">
        <div class="col-md-6 mx-2 ">

          <div class="card text-bg-light mb-3">
            <img src="./images/b8_.jpg" class="card-img" alt="bloco de notas">
            <div class="card-img-overlay">

              <br>

              <h1><?php echo $conteudo_h1; ?></h1>
              <form class="p-5 row g-3 " action="test.php" method="POST" autocomplete="off">
                <div class="col-md-6">
                  <label for="nome">Nome</label>
                  <input type="name" name="nome" class="form-control" value="<?php echo $nomevelho; ?>" id="inome" required>
                  <input type="hidden" name="extra" value="<?php echo $v; ?>">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="col-md-6">
                  <label for="local">Local</label>
                  <input type="text" name="local" class="form-control" value="<?php echo $localvelho; ?>" id="ilocal" required>
                </div>
                <div class="col-12">
                  <label for="notas">Notas</label>
                  <input type="text" name="notas" class="form-control" value="<?php echo $notasvelho; ?>" id="inotas" required>
                </div>
                <div class="form-group">
                  <label for="ihora">Hora:</label>
                  <input type="time" name="hora" value="<?php echo $horavelho; ?>" id="ihora" required>
                  <div class="cs-form">
                    <input type="time" class="form-control" value="10:05 AM" />
                  </div>
                  <label for="idata">Data:</label>
                  <input type="date" name="data" value="<?php echo $datavelho; ?>" id="idata" required>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="submit" class="btn btn-dark" onclick="window.history.back()">Voltar</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <br>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>