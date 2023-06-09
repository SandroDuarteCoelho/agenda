<?php

// Conectar-se à base de dados
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "Agenda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
  die("Falha ao conectar à base de dados: " . $conn->connect_error);
}

// Obtém a data atual do sistema
$data_atual = time();

// Consulta todos os eventos na tabela "eventos"
$query = "SELECT * FROM Eventos where id_utilizador=".$id_user;
$resultado = mysqli_query($conn, $query);

// Percorre os resultados e calcula o tempo restante para cada evento
while ($evento = mysqli_fetch_assoc($resultado)) {
  // Converte a data do evento em um Unix Timestamp
  $data_evento_timestamp = strtotime($evento["datas"]);

  if ($data_evento_timestamp > $data_atual) {
    // Calcula o tempo restante para o evento
    $tempo_restante_evento = $data_evento_timestamp - $data_atual;

    // Exibe uma mensagem na tela indicando o tempo restante para o evento
    $dias = floor($tempo_restante_evento / (60 * 60 * 24));
    $horas = floor(($tempo_restante_evento % (60 * 60 * 24)) / (60 * 60));
    $minutos = floor(($tempo_restante_evento % (60 * 60)) / 60);
    $segundos = $tempo_restante_evento % 60;
    
    // vermelho até 1 semana, laranja até 1 mes, verde +1 mes
    if ($tempo_restante_evento < 604800) {
      echo "<div class='text-center'>
    <div class='alert alert-danger custom-alert d-inline-block' role='alert'>
      Faltam " . $dias . " dias, " . $horas . " horas, " . $minutos . " minutos e " . $segundos . " segundos para o evento: " . $evento["nome"] . ".
    </div>
  </div>";
      /* echo "<p><span style='color:red'>Faltam " . $dias . " dias, " . $horas . " horas, " . $minutos . " minutos e " . $segundos . " segundos para o evento --> </span><span style='color:red'>" . $evento["nome"] . "</span>.</p>"; */
    } /* elseif ($tempo_restante_evento < 2629746) {
      echo "<div class='text-center'>
    <div class='alert alert-warning custom-alert d-inline-block' role='alert'>
      Faltam " . $dias . " dias, " . $horas . " horas, " . $minutos . " minutos e " . $segundos . " segundos para o evento: " . $evento["nome"] . ".
    </div>
  </div>";
    } else {
      echo "<div class='text-center'>
    <div class='alert alert-success custom-alert d-inline-block' role='alert'>
      Faltam " . $dias . " dias, " . $horas . " horas, " . $minutos . " minutos e " . $segundos . " segundos para o evento: " . $evento["nome"] . ".
    </div>
  </div>";
    } */

  }
  
}


// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>



