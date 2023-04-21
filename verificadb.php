
<?php

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "Agenda";

// Cria conexão com o servidor MySQL
$conn = new mysqli($servername, $username, $password);

// Verifica se houve erro de conexão
if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}

// Consulta SQL para eliminar a base de dados
$sql = "DROP DATABASE $dbname";

if ($conn->query($sql) === TRUE) {
  echo "Base de dados eliminada com sucesso!";
} else {
  echo "Erro ao eliminar a base de dados: " . $conn->error;
}

// Verifica se a base de dados existe
$result = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");

if ($result->num_rows > 0) {
  echo "A base de dados '$dbname' já existe.<br>";
} else {
  // Cria a base de dados
  $sql = "CREATE DATABASE $dbname";
  if ($conn->query($sql) === TRUE) {
    echo "Base de dados '$dbname' criada com sucesso.<br>";
  } else {
    echo "Erro ao criar a base de dados: " . $conn->error . "<br>";
  }
}

// Seleciona a base de dados
$conn->select_db($dbname);

// Verifica se a tabela existe
$result = $conn->query("SHOW TABLES LIKE 'Eventos'");

if ($result->num_rows > 0) {
  echo "A tabela 'Eventos' já existe.<br>";
} else {
  // Cria a tabela
  $sql = "CREATE TABLE Eventos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    locale VARCHAR(30) NOT NULL,
    hora TIME,
    notas TEXT,
    datas DATE
  )";

  if ($conn->query($sql) === TRUE) {
    echo "Tabela 'Eventos' criada com sucesso.<br>";
  } else {
    echo "Erro ao criar a tabela: " . $conn->error . "<br>";
  }
}

$conn->close();

header("Location: index.php");
exit;

?>
