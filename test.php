<?php
/* include "verificadb.php"; */
$id = $_POST['id'];
$nome = $_POST["nome"];
$local = $_POST["local"];
$hora = $_POST['hora'];
$notas = $_POST["notas"];
$data = $_POST["data"];
$utilizador = $_POST["utilizador"];
$password = $_POST["password"];

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

$fazer = $_POST["extra"];
if ($fazer == 0) login($utilizador, $password);
if ($fazer == 1) adicionar($nome, $local, $hora, $notas, $data);
if ($fazer == 2) eliminar($id);
if ($fazer == 3) modificar($id, $nome, $local, $hora, $notas, $data);

mysqli_close($conn);
echo "<script>alert(" . json_encode($utilizador) . ");</script>";
echo "<script>alert('Operação executada com sucesso! Clique em OK para continuar.');</script>";
echo "<script>window.location.href = 'inicio.php';</script>";

function login($utilizador, $password)
{
      global $conn;
      // Obtém o último ID inserido na tabela "Utilizadores"
      $sql = "SELECT MAX(id) as last_id FROM Utilizadores";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $last_id = $row["last_id"];

      // Cria um array associativo para armazenar o conteúdo dos campos "nome" e "pass"
      $usuarios = array();
      for ($id = 1; $id <= $last_id; $id++) {
            $sql = "SELECT nome, pass FROM Utilizadores WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                  // Salva o resultado em um array associativo
                  $row = $result->fetch_assoc();
                  $usuarios["nome$id"] = $row["nome"];
                  $usuarios["pass$id"] = $row["pass"];
            }
      }
     


      if ($usuarios["nome1"] === $utilizador && $usuarios["pass1"] === $password) {
            echo "Bem-vindo, Alice!";
            echo "<script>alert('Bem-vindo, Alice!  Clique em OK para continuar.');</script>";
      } else {
            echo "Nome de usuário ou senha inválidos.";
      }
}



function adicionar($nome, $local, $hora, $notas, $data)
{
      global $conn;

      // Prepara a query com os placeholders
      $sql = "INSERT INTO Eventos (nome, locale, hora, notas, datas) VALUES (?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($conn, $sql);

      // Verifica se a query foi preparada com sucesso
      if ($stmt === false) {
            echo "Erro ao preparar a query: " . mysqli_error($conn);
            return;
      }

      // Bind dos valores aos placeholders
      mysqli_stmt_bind_param($stmt, "sssss", $nome, $local, $hora, $notas, $data);

      // Executa a query
      if (mysqli_stmt_execute($stmt)) {
            echo "Novo registro criado com sucesso";
      } else {
            echo "Erro ao executar a query: " . mysqli_error($conn);
      }

      // Fecha o statement e a conexão com o banco de dados
      mysqli_stmt_close($stmt);
      /*  mysqli_close($conn); */
}


function eliminar($id)
{

      global $conn;

      $id = mysqli_real_escape_string($conn, $id);

      // Prepare a statement
      $stmt = mysqli_prepare($conn, "DELETE FROM Eventos WHERE id = ?");

      // Bind the parameter
      mysqli_stmt_bind_param($stmt, "i", $id);

      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
            echo "Registro excluído com sucesso";
      } else {
            echo "Erro ao excluir registro: " . mysqli_error($conn);
      }

      // Close the statement
      mysqli_stmt_close($stmt);

      // Reset AUTO_INCREMENT to 1
      $sql = "ALTER TABLE Eventos AUTO_INCREMENT = 1;";

      if (mysqli_query($conn, $sql)) {
            echo "Tabela ordenada com sucesso";
      } else {
            echo "Erro ao ordenar tabela: " . mysqli_error($conn);
      }

      // Update the ids of the remaining records
      $sql = "UPDATE Eventos SET id = id - 1 WHERE id > " . $id . " ORDER BY id ASC;";

      if (mysqli_query($conn, $sql)) {
            echo "Tabela ordenada com sucesso";
      } else {
            echo "Erro ao ordenar tabela: " . mysqli_error($conn);
      }
}


function modificar($id, $nome, $local, $hora, $notas, $data)
{
      global $conn;
      // Prepare a consulta SQL com parâmetros
      $sql = "UPDATE Eventos SET nome = ?, locale = ?, hora = ?, notas = ?, datas = ? WHERE id = ?";
      $stmt = $conn->prepare($sql);

      // Verifique se a preparação da consulta foi bem sucedida
      if (!$stmt) {
            die('Erro ao preparar a consulta: ' . $conn->error);
      }

      // Defina os valores dos parâmetros e execute a consulta
      $stmt->bind_param('sssssi', $nome, $local, $hora, $notas, $data, $id);
      $result = $stmt->execute();

      // Verifique se a execução da consulta foi bem sucedida
      if (!$result) {
            die('Erro ao executar a consulta: ' . $conn->error);
      }
}
