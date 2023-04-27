<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Adicionar Evento</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="./bootstrap-5.2.3-dist/css/bootstrap.css">
  <!-- <link rel="stylesheet" type="text/css" href="./css/adicionar.css"> -->
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
    <h1><?php echo $conteudo_h1; ?></h1>

    <form class="row g-3" action="test.php" method="POST" autocomplete="off">
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
        <label for="idata">Data:</label>
        <input type="date" name="data" value="<?php echo $datavelho; ?>" id="idata" required>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="submit" class="btn btn-dark" onclick="window.location.href = 'index.php';">Voltar</button>

      </div>
    </form>



    <div class="container text-center">
      <div class="row row-cols-4">
        <div class="col">Column</div>
        <div class="col">Column</div>
        <div class="col-6">Column</div>
        <div class="col">Column</div>
      </div>
    </div>


  </div>
</body>

</html>