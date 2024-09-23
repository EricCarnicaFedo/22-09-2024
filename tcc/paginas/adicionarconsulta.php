<?php
include('conexaobd.php');
session_start();

// Verifica se o usuário está logado e é um veterinário
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'veterinario') {
    header("Location: login.php");
    exit();
}

// Obtém o ID da clínica do veterinário logado
$clinica_id = $_SESSION['clinica_id'];

// Consulta os tutores da clínica
$sql_tutores = "SELECT id, nome FROM tutores WHERE clinica_id = ?";
$stmt_tutores = $pdo->prepare($sql_tutores);
$stmt_tutores->execute([$clinica_id]);
$tutores = $stmt_tutores->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.1/css/boxicons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
        }
        .form-container {
            display: flex; 
            align-items: flex-start; 
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 80%; 
        }
        h2 {
            text-align: center; 
            flex-basis: 100%; 
        }
        .image-do-formulario {
            margin-right: 20px; 
            width: 650px;
            height: auto;
        }
        .form-content {
            flex-grow: 1; 
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-with-icon {
            position: relative;
        }
        .input-with-icon i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }
        .input-with-icon input,
        .input-with-icon select {
            width: 100%;
            padding: 10px 0px 10px 0px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button-container {
            text-align: center;
        }
        .button-container button {
            padding: 10px 25px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button-container button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Adicionar Consulta Marcada</title>
</head>
<body>

<div class="form-container">
    <img src="https://i.postimg.cc/MGynk9Fp/2126918.jpg" class="image-do-formulario">
    <div class="form-content">
        <h2>Adicionar Consulta Marcada</h2>
        <form id="formAddConsulta" method="POST" action="salvar_consulta.php">
            <div class="input-group">
                <label for="proprietario">Proprietário:</label>
                <div class="input-with-icon">
                    <select name="proprietario" id="proprietario" required>
                        <option value="">Selecione o Proprietário</option>
                        <?php foreach ($tutores as $tutor): ?>
                            <option value="<?php echo $tutor['id']; ?>"><?php echo $tutor['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="input-group">
                <label for="pet">Pet:</label>
                <div class="input-with-icon">
                    <select name="pet" id="pet" required>
                        <option value="">Selecione o Pet</option>
                    </select>
                </div>
            </div>

            <div class="input-group">
                <label for="data_consulta">Data da Consulta:</label>
                <div class="input-with-icon">
                    <input type="date" name="data_consulta" required>
                </div>
            </div>

            <div class="input-group">
                <label for="hora_consulta">Hora da Consulta:</label>
                <div class="input-with-icon">
                    <input type="time" name="hora_consulta" required>
                </div>
            </div>

            <div class="input-group">
                <label for="descricao">Descrição:</label>
                <div class="input-with-icon">
                    <textarea name="descricao" rows="4"></textarea>
                </div>
            </div>

            <div class="button-container">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('proprietario').addEventListener('change', function() {
    var tutorId = this.value;
    var petSelect = document.getElementById('pet');
    
    petSelect.innerHTML = '<option value="">Selecione o Pet</option>'; // Limpa opções anteriores

    if (tutorId) {
        petSelect.innerHTML = '<option value="">Carregando...</option>'; // Opção de carregando

        // Faz uma requisição AJAX para obter os pets do tutor
        fetch('obter_pets.php?tutor_id=' + tutorId)
            .then(response => response.json())
            .then(data => {
                petSelect.innerHTML = '<option value="">Selecione o Pet</option>'; // Limpa opções anteriores
                data.forEach(pet => {
                    petSelect.innerHTML += '<option value="' + pet.id + '">' + pet.nome + '</option>';
                });
            });
    }
});
</script>

</body>
</html>
