<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tccdois";

// Criando conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
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
            justify-content: center; /* Centraliza horizontalmente */
            align-items: center; /* Centraliza verticalmente */
            height: 100vh; /* Define a altura total da tela */
        }
        .form-container {
            display: flex; /* Adiciona flexbox */
            align-items: flex-start; /* Alinha itens no início */
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 80%; /* Faz o formulário ocupar 100% da largura máxima definida */
        }
        h2 {
            text-align: center; /* Centraliza o título */
            flex-basis: 100%; /* Faz o título ocupar toda a largura */
        }
        .image-do-formulario {
            margin-right: 20px; /* Espaço entre a imagem e o formulário */
            width: 650px;
            height: auto;
        }
        .form-content {
            flex-grow: 1; /* Faz o conteúdo do formulário crescer para ocupar o espaço restante */
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
    <title>Adicionar Cliente</title>
</head>
<body>

<div class="form-container">
    <img src="https://i.postimg.cc/MGynk9Fp/2126918.jpg" class="image-do-formulario">
    <div class="form-content">
        <h2>Adicionar Cliente</h2>
        <form id="formAddClient" method="POST" action="salvar_cliente.php">
        <input type="hidden" name="clinica_id" value="<?php echo $clinica_id; ?>">

            <div class="input-group">
                <label for="nome">Nome:</label>
                <div class="input-with-icon">
                    <i class='bx bx-user'></i>
                    <input type="text" name="nome" required>
                </div>
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <div class="input-with-icon">
                    <i class='bx bx-envelope'></i>
                    <input type="email" name="email" required>
                </div>
            </div>

            <div class="input-group">
                <label for="telefone">Telefone:</label>
                <div class="input-with-icon">
                    <i class='bx bx-phone'></i>
                    <input type="text" name="telefone" required>
                </div>
            </div>

            <div class="input-group">
                <label for="endereco">Endereço:</label>
                <div class="input-with-icon">
                    <i class='bx bx-home'></i>
                    <input type="text" name="endereco" required>
                </div>
            </div>

            <div class="input-group">
                <label for="estado">Estado:</label>
                <div class="input-with-icon">
                    <select name="estado" id="estado" required>
                        <option value="">Selecione o Estado</option>
                        <?php
                        // Preencher estados
                        $sql = "SELECT id, nome FROM estados"; // Ajuste conforme sua tabela
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["id"] . "'>" . $row["nome"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="input-group">
                <label for="cidade">Cidade:</label>
                <div class="input-with-icon">
                    <select id="cidade" name="cidade" required>
                        <option value="">Selecione a Cidade</option>
                    </select>
                </div>
            </div>

            <div class="button-container">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
<script>
document.getElementById('estado').addEventListener('change', function() {
    var estadoId = this.value;
    var cidadeSelect = document.getElementById('cidade');
    
    cidadeSelect.innerHTML = '<option value="">Carregando...</option>'; // Opção de carregando

    // Faz uma requisição AJAX para obter as cidades
    fetch('obter_cidades.php?estado_id=' + estadoId)
        .then(response => response.json())
        .then(data => {
            cidadeSelect.innerHTML = '<option value="">Selecione a Cidade</option>'; // Limpa opções anteriores
            data.forEach(cidade => {
                cidadeSelect.innerHTML += '<option value="' + cidade.id + '">' + cidade.nome + '</option>';
            });
        });
});
</script>
