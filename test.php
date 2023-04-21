<?php
/* include "verificadb.php"; */
$id = $_POST['id'];
$nome = $_POST["nome"];
$local = $_POST["local"];
$hora = $_POST['hora'];
$notas = $_POST["notas"];
$data = $_POST["data"];


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
if ($fazer == 1) adicionar($nome, $local, $hora, $notas, $data);
if ($fazer == 2) eliminar($id);
if ($fazer == 3) modificar($id, $nome, $local, $hora, $notas, $data);


mysqli_close($conn);
echo "<script>alert('Operação executada com sucesso! Clique em OK para continuar.');</script>";
echo "<script>window.location.href = 'index.php';</script>";

function adicionar($nome, $local, $hora, $notas, $data)
{
      global $conn;
      $sql = "INSERT INTO Eventos (nome, locale, hora, notas, datas) VALUES ('$nome', '$local', '$hora', '$notas', '$data')";
      if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}


function eliminar($id)
{
      global $conn;
      $sql = "DELETE FROM Eventos WHERE id = $id";

      if (mysqli_query($conn, $sql)) {
            echo "Registro excluído com sucesso";
      } else {
            echo "Erro ao excluir registro: " . mysqli_error($conn);
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