<?php
include('conexaobd.php');
session_start();

// Verifica se o usuário está logado e é um veterinário
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'veterinario') {
    header("Location: login.php");
    exit();
}

// Obtém os dados do formulário
$proprietario_id = $_POST['proprietario'];
$pet_id = $_POST['pet'];
$data_consulta = $_POST['data_consulta'];
$hora_consulta = $_POST['hora_consulta'];
$descricao = $_POST['descricao'];

// Você pode adicionar lógica para buscar o nome do animal, raça, etc., se necessário
$nome_animal = ''; // Defina de acordo com sua lógica ou adicione um campo no formulário
$raca = ''; // Defina de acordo com sua lógica ou adicione um campo no formulário

// Salva a consulta no banco de dados
$sql = "INSERT INTO consultas_marcadas (nome_animal, raca, proprietario, data_consulta, hora_consulta, descricao, pet_id, tutor_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$nome_animal, $raca, $proprietario_id, $data_consulta, $hora_consulta, $descricao, $pet_id, $_SESSION['usuario_id']]);
    // Redireciona ou apresenta uma mensagem de sucesso
    header("Location: agenda.php?mensagem=Consulta marcada com sucesso!");
} catch (PDOException $e) {
    // Em caso de erro, você pode redirecionar ou mostrar uma mensagem
    echo "Erro ao salvar consulta: " . $e->getMessage();
}
?>
