
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
$sql = "SELECT id, nome, locale, hora, notas, datas FROM Eventos";
$result = mysqli_query($conn, $sql);

// Cria uma tabela HTML e preenche com os dados recuperados
echo "<table class=table table-striped>";
/* echo "<table>"; */
echo "<tr><th>id</th><th width='170'>Nome</th><th width='130'>Local</th><th width='90'>Hora</th><th width='300'>Notas</th><th width='110'>Data</th></tr>";

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

// Fecha a conexão com a base de dados
mysqli_close($conn);
 ?>