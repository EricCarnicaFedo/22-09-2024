<?php
session_start(); // Inicia a sessão
$conn = new mysqli('localhost', 'root', '', 'tccdois');

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCliente = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    // Obtém o clinica_id da sessão
    $clinica_id = $_SESSION['clinica_id']; // Certifique-se de que este valor está definido

    if ($idCliente) {
        // Atualiza o registro existente
        $sql = "UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone', endereco='$endereco', cidade='$cidade', estado='$estado', cep='$cep' WHERE idCliente='$idCliente'";
    } else {
        // Insere um novo registro
        $sql = "INSERT INTO clientes (nome, email, telefone, endereco, cidade, estado, cep, clinica_id) VALUES ('$nome', '$email', '$telefone', '$endereco', '$cidade', '$estado', '$cep', '$clinica_id')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Registro salvo com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>
