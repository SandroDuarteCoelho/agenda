<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Adicionar Evento</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="./bootstrap-5.2.3-dist/css/bootstrap.css">

  <?php
  session_start();
  if ((!isset($_SESSION['utilizador']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('location:index.php');
  }

  $logado = $_SESSION['utilizador'];
  $senha = $_SESSION['senha'];
  $id_utilizador = $_SESSION['id'];
  ?>
</head>

<body>

  <?php $user = $_GET['user'];
  $id_user = $_GET['id_user'];
  /* $user = $_POST['user'];
  $id_user = $_POST['id_user']; */
  $gerir_utili = $_GET['gerir_utili'];

  if ($gerir_utili == "1") { ?>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById("exampleModal"));
        myModal.show();
      });
    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Utilizador já existe.</h1> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h1 class="modal-title fs-5 text-center mx-auto" id="exampleModalLabel">Alterações efetuadas com sucesso.</h1>
          </div>
          <div class="modal-footer">

            <form action="inicio.php" method="POST">
              <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
              <input type="hidden" name="user" value="<?php echo $user; ?>">
              <button onclick="window.location.href='inicio.php';" class="btn btn-dark ms-2">Fechar</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <br>
  <div class="container text-center">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <div class="row row-cols-1 row-cols-md-2 g-0">

          <div class="card text-center w-200 mx-auto">
            <div class="card-header">
              Gerir Conta
            </div>
            <div class="card-body">
              <h5 class="card-title">Atualize os seus dados pessoais</h5>
              <p class="card-text">Qualquer alteração feita só terá efeitos práticos na próxima vez que fizer login.</p>

              <div class="d-flex justify-content-center">
                <form class="row g-3" action="test.php" method="POST">
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Alterar Email</button>
                  </div>
                  <div class="col-auto">
                    <label for="inputEmail" class="visually-hidden">Email</label>
                    <input type="email" class="form-control" name="user" id="iutilizador" value=<?php echo "$user" ?> placeholder=<?php echo "$user" ?>>
                    <!-- <input type="email" class="form-control" name="utilizador" id="iutilizador" value=<?php echo "$logado" ?> placeholder=<?php echo "$logado" ?>> -->
                    <input type="hidden" name="extra" value="6">
                    <input type="hidden" name="id_user" value=<?php echo "$id_user" ?>>
                    <!-- <input type="hidden" name="id_utilizador" value=<?php echo "$id_utilizador" ?>> -->
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Alterar Password</button>
                  </div>
                  <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Password</label>
                    <input type="password" class="form-control" name="senha" id="isenha" value=<?php echo "$senha" ?> placeholder=<?php echo "$senha" ?>>
                  </div>
                </form>
              </div>

              <div class="d-flex flex-row justify-content-center">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Apagar conta
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar conta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tem a certeza? Vai perder todos os dados!</h1>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                        <form action="test.php" method="POST">
                          <div class="d-flex justify-content-center">
                            <input type="hidden" name="extra" value="7">
                            <!-- <input type="hidden" name="id_utilizador" value="<?php echo $id_utilizador; ?>"> -->
                            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                            <input type="hidden" name="user" value="<?php echo $user; ?>">
                            <button class="btn btn-outline-danger" type="submit">Sim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


                <form action="inicio.php" method="POST">
                  <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                  <input type="hidden" name="user" value="<?php echo $user; ?>">
                  <button onclick="window.location.href='inicio.php';" class="btn btn-dark ms-2">Voltar</button>
                </form>
              </div>

            </div>
            <div class="card-footer text-muted">
              Agenda Pessoal
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <script>
    function apagarConta() {
      var id_utilizador = <?php echo $id_utilizador; ?>;

      // Redirecionar para test.php com os parâmetros desejados
      window.location.href = 'test.php?extra=7&id_utilizador=' + id_utilizador;
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>


</html>