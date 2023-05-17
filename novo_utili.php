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
<?php
  $novo_utili = $_POST['novo_utili'];
  $novo_utilizador = $_POST['novo_utilizador'];
  if ($novo_utili == "1") { ?>

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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Utilizador já existe.</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <h1 class="modal-title fs-5 text-center mx-auto" id="exampleModalLabel">Escolha novas credenciais.</h1>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href='index.php'">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  <?php } elseif ($novo_utili == "0") { ?>

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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Seja bem-vindo <?php echo $novo_utilizador?> .</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <h1 class="modal-title fs-5 text-center mx-auto" id="exampleModalLabel">Utilizador gravado com sucesso.</h1>
          <h1 class="modal-title fs-5 text-center mx-auto" id="exampleModalLabel">Já pode fazer login.</h1>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href='index.php'">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>


  <br>
  <div class="container text-center">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <div class="row row-cols-1 row-cols-md-3 g-0">
          <div class="card w-200 mx-auto" style="max-width: 21em;">
            <img src="./images/u2.jpg" class="card-img-top" alt="pessoas contentes" style="height: 229px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title text-center"><b>Novo Utilizador</b></h5>
              <br>
              <form action="test.php" method="POST" autocomplete="off">
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="user" id="iutilizador" autocomplete="off" placeholder="name@example.com">
                  <input type="hidden" name="extra" value="5">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control" name="senha" id="isenha" autocomplete="off" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>
                <br>
                <div class="col-12 d-flex justify-content-center text-center">
                  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="submit" class="btn btn-warning">Registar</button>
                    <button type="submit" class="btn btn-dark" onclick="window.location.href='index.php'">Sair</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>


</html>