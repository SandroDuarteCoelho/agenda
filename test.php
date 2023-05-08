<?php
session_start();

$id = $_POST['id'];
$nome = $_POST["nome"];
$local = $_POST["local"];
$hora = $_POST['hora'];
$notas = $_POST["notas"];
$data = $_POST["data"];
$utilizador = $_POST["utilizador"];
$senha = $_POST["senha"];
/* var_dump($utilizador);
var_dump($senha); */

$servername = "localhost";
$database = "Agenda";
$username = "root";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$fazer = $_POST["extra"];
if ($fazer == 0) login($utilizador, $senha);
if ($fazer == 1) adicionar($nome, $local, $hora, $notas, $data);
if ($fazer == 2) eliminar($id);
if ($fazer == 3) modificar($id, $nome, $local, $hora, $notas, $data);
if ($fazer == 4) logout();


function login($utilizador, $senha)
{
      global $conn;
      $query = "SELECT * FROM Utilizadores WHERE utilizador='$utilizador' AND senha='$senha'";
      $resultado = mysqli_query($conn, $query);
      /*      echo $query;
      echo "<br>";
      echo mysqli_num_rows($resultado); */
      /* die(); */

      if (mysqli_num_rows($resultado) > 0) {
            $_SESSION['utilizador'] = $utilizador;
            $_SESSION['senha'] = $senha;
            header('Location: inicio.php');
      } else {
            unset($_SESSION['utilizador']);
            unset($_SESSION['senha']);
            header('Location: index.php');
      }


      // Create prepared statement
      /*      $stmt = $conn->prepare("SELECT * FROM Utilizadores WHERE utilizador=? AND senha=?");
      $stmt->bind_param("ss", $utilizador, $senha);
      $stmt->execute();

      
     
      // Check if there is a matching row in the database
      if ($stmt->fetch()) {
            echo "Sucesso";
            return 1;
      } else {
            echo "Falha";
            return 0;
      }

      // Close statement and connection
      $stmt->close();  */
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
      mysqli_close($conn);
      header('Location: inicio.php');
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
      mysqli_close($conn);
      header('Location: inicio.php');
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
      mysqli_close($conn);
      header('Location: inicio.php');
}

function logout()
{
      session_start();
      session_destroy();
      header("Location: index.php");
      exit();
}
