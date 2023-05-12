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

    <br><br>

    <div class="container text-center">
      <div class="row justify-content-md-center ">
        <div class="col-md-6 mx-2 ">

          <div class="card text-bg-light mb-3">
            <img src="./images/b7.jpg" class="card-img" alt="bloco de notas">
            <div class="card-img-overlay">

              <br>

              <h1>Novo Utilizador</h1>
              <form class="p-5 row g-3 " action="test.php" method="POST" autocomplete="off">
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" name="utilizador" class="form-control" id="iutilizador" autocomplete="off" placeholder="">
                    <input type="hidden" name="extra" value="5"> 
                    <label for="floatingInputGrid">Nome ou Email</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="password" name="senha" class="form-control" id="isenha" autocomplete="off" placeholder="">

                    <label for="floatingInputGrid">Password</label>
                  </div>


                  <!-- <label for="local">Password</label>
                  <input type="password" name="senha" class="form-control" id="isenha" autocomplete="off" placeholder="">
                  <input type="hidden" name="extra" value="5"> -->
                </div> 

                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="submit" class="btn btn-dark" onclick="window.location.href='index.php'">Voltar</button>
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