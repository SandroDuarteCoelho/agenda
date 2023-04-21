<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Adicionar Evento</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="./bootstrap-5.2.3-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="./css/adicionar.css">
</head>

<body>

  <div id="container">
    <?php
    $valor = $_POST['extra']; // só pode ser 0 ou 3
    $evento = $_POST['id'];  // usado apenas para modificar
    if ($valor == 3) {
      $conteudo_h1 = "Modificar Evento " . $evento;
      $v = "3";
    } else {
      $conteudo_h1 = "Adicionar Evento";
      $v = "1";
    }
    ?>
    <h1><?php echo $conteudo_h1; ?></h1>

    <form class="row g-3" action="test.php" method="POST" autocomplete="off">
      <div class="col-md-6">
        <input type="name" name="nome" class="form-control" placeholder="Nome" id="inome" required>
        <input type="hidden" name="extra" value="<?php echo $v; ?>">
        <input type="hidden" name="id" value="<?php echo $evento; ?>">
      </div>
      <div class="col-md-6">
        <input type="text" name="local" class="form-control" placeholder="Local" id="ilocal" required>
      </div>
      <div class="col-12">
        <input type="text" name="notas" class="form-control" id="inotas" placeholder="Notas" required>
      </div>
      <div class="form-group">
        <label for="ihora">Hora:</label>
        <input type="time" name="hora" id="ihora" required>
        <label for="idata">Data:</label>
        <input type="date" name="data" id="idata" required>
      </div>
   
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="submit" class="btn btn-dark" onclick="window.location.href = 'index.php';">Voltar</button>
        
      </div>
    </form>
  </div>
</body>

</html>