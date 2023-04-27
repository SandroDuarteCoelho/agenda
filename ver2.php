
<?php
$servername = "localhost";
$database = "Agenda";
$username = "root";
$password = "password";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Seleciona os dados da tabela Eventos
/* $sql = "SELECT id, nome, locale, hora, notas, datas FROM Eventos";
$result = mysqli_query($conn, $sql);

// Cria uma tabela HTML e preenche com os dados recuperados
echo "<table class=table table-striped>";
echo "<tr><th>id</th><th>Nome</th><th>Local</th><th>Hora</th><th>Notas</th><th>Data</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row["id"] . "</td>";
  echo "<td>" . $row["nome"] . "</td>";
  echo "<td>" . $row["locale"] . "</td>";
  echo "<td>" . $row["hora"] . "</td>";
  echo "<td>" . $row["notas"] . "</td>";
  echo "<td>" . $row["datas"] . "</td>";
  echo "</tr>";
}

echo "</table>";
mysqli_close($conn);
 */



$sql = "SELECT id, nome, locale, hora, notas, datas FROM Eventos";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  die('Erro ao preparar a consulta: ' . mysqli_error($conn));
}

if (mysqli_stmt_execute($stmt)) {
  $result = mysqli_stmt_get_result($stmt);

  echo "<table class=table table-striped>";
  echo "<tr><th>id</th><th>Nome</th><th>Local</th><th>Hora</th><th>Notas</th><th>Data</th></tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["locale"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["hora"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["notas"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["datas"]) . "</td>";
    echo "</tr>";
  }

  echo "</table>";
} else {
  die('Erro ao executar a consulta: ' . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>