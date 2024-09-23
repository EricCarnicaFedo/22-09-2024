<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

// Variáveis de usuário (substitua conforme necessário)
$nomeUsuario = $_SESSION['usuario']['nome'];
$avatarUsuario = "https://placeimg.com/80/80/animals"; // URL do avatar do usuário, pode ser alterado
?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="carrossel.css">
  <link rel="stylesheet" href="inicio.css">
  <link rel="stylesheet" href="style.css">

  <!---------========= fontes =========------->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
  <!----===== Boxicons CSS ===== -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <!--<title>Dashboard Sidebar Menu</title>-->
</head>

<body>

<header id="navbar">
  <nav>
    <div class="titulonavbar">
      <i class="fas fa-paw icon"></i>
      <span class="text">GestaoVet</span>
    </div>
    <ul class="navbarconteudo">
      <li style="padding-right: 30px;">Página Inicial</li>
      <li style="padding-right: 30px;">Sobre</li>
      <li style="padding-right: 30px;">Serviços</li>
      <li style="padding-right: 30px;">Blog</li>
      <li style="padding-right: 30px;">Contato</li>
    </ul>
    <a href="login.php" class="tel-link">Cadastrar-se</a>
  </nav>

  <i class='bx bx-menu menu-button' id="menu-button" style="font-size: 30px;"></i>
  <i class='bx bx-cog customize-button' id="customize-button" style="font-size: 20px;"></i>
  <div id="color-picker">
    <label for="navbar-color">Escolha a cor da barra de navegação:</label>
    <input type="color" id="navbar-color" name="navbar-color" value="#4CAF50">
  </div>
</header>

<div id="sidebar" class="sidebar">
  <div class="sidebar-header">
    <i class='bx bx-home-alt' style="font-size: 40px; color: white;"></i>
    <h2>GestaoVet</h2>
  </div>
  <a href="javascript:void(0)" class="closebtn" id="close-sidebar"> <i class='bx bxs-chevron-right'></i></a>
  <a href="#"><i class='bx bx-search'></i> <input type="text" placeholder="Pesquisar..." id="search-bar"></a>
  <a href="#"><i class="bx bx-home"></i> <span class="sidebar-text">Início</span></a>
  <a href="notificacoes.php"><i class='bx bx-bell'></i> <span class="sidebar-text">Notificações</span></a>
  <a href="#"><i class='bx bxs-user'></i> <span class="sidebar-text">Meu perfil</span></a>
  <a href="agenda.php"><i class='bx bx-calendar'></i> <span class="sidebar-text">Agenda</span></a>
  <a href="pets.php"><i class='bx bxs-cat'></i> <span class="sidebar-text">Pets</span></a>
  <a href="#" style="margin-top: 100px;"><i class='bx bx-log-out'></i> <span class="sidebar-text">Sair</span></a>
  <a href="#"><i class='bx bx-moon theme-toggle' id="theme-toggle"></i> <span class="sidebar-text tema">Tema</span></a>
</div>

<section id="home-section" class="custom-welcome-section">
  <div class="custom-container">
    <div class="custom-welcome-text">
      <h1>Bem-vindo ao Sistema de Gestão Veterinária GestaoVet</h1>
      <p>Organize e otimize a administração da sua clínica com facilidade!</p>
      <a href="login.php" class="cta-button">Comece Agora</a>
    </div>
  </div>
</section>

<section id="services-section" class="custom-services-section">
  <div class="custom-container">
    <h2 class="botarfonte">Informações do Seu Pet</h2>
    <div class="custom-services-list">
      <div class="custom-service">
        <img src="https://i.postimg.cc/Hk7Mq5sp/6274.jpg" alt="Serviço 1">
        <h3>Agendar Consulta</h3>
        <p>Agende, reescalone e cancele compromissos de forma rápida e eficiente.</p>
      </div>
      <div class="custom-service">
        <img src="https://i.postimg.cc/xdL0HGnF/Startup-managers-presenting-and-analyzing-sales-growth-chart.jpg" alt="Serviço 2">
        <h3>Seus Pets</h3>
        <p>Monitore todas as despesas e gere relatórios detalhados para melhor controle financeiro.</p>
      </div>
      <div class="custom-service">
        <img src="https://i.postimg.cc/dVdB8gCm/11104.jpg" alt="Serviço 3">
        <h3>Trocar de Clínica</h3>
        <p>Mantenha-se informado sobre consultas agendadas, próximas vacinas e tratamentos necessários.</p>
      </div>
    </div>
  </div>
</section>

<section id="contact-section" class="custom-contact-section">
  <div class="custom-container">
    <h2>Entre em Contato</h2>
    <div class="custom-contact-form">
      <form action="#" method="POST">
        <div class="custom-form-group">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" required>
        </div>
        <div class="custom-form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="custom-form-group">
          <label for="mensagem">Mensagem</label>
          <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
        </div>
        <button type="submit">Enviar Mensagem</button>
      </form>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="footer-content">
    <h2 class="footer-title">Gestão Veterinária</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at sapien eu justo ultrices feugiat at id quam. Vivamus eu tellus vel ex pretium hendrerit.</p>
    <ul class="footer-links">
      <li><a href="#">Início</a></li>
      <li><a href="#">Sobre</a></li>
      <li><a href="#">Serviços</a></li>
      <li><a href="#">Equipe</a></li>
      <li><a href="#">Contato</a></li>
    </ul>
    <div class="social-icons">
      <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/facebook-new.png" alt="Facebook"></a>
      <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/twitter.png" alt="Twitter"></a>
      <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/linkedin.png" alt="LinkedIn"></a>
      <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/instagram-new.png" alt="Instagram"></a>
    </div>
    <div class="contact-info">
      <div class="contact-info-item">
        <img src="https://img.icons8.com/material-rounded/24/ffffff/phone--v1.png" alt="Telefone">
        +1 234 567 890
      </div>
      <div class="contact-info-item">
        <img src="https://img.icons8.com/material-rounded/24/ffffff/email-open--v1.png" alt="E-mail">
        exemplo@exemplo.com
      </div>
    </div>
    <div class="subscribe">
      <input type="email" class="subscribe-input" placeholder="Digite seu e-mail">
      <button class="subscribe-button">Assinar</button>
    </div>
    <div class="company-info">
      <h3>Sobre Nós</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at sapien eu justo ultrices feugiat at id quam.</p>
    </div>
    <div class="quick-links">
      <h3>Links Rápidos</h3>
      <ul>
        <li><a href="#">Política de Privacidade</a></li>
        <li><a href="#">Termos de Serviço</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Suporte</a></li>
      </ul>
    </div>
    <div class="payment-methods">
      <h3>Métodos de Pagamento</h3>
      <img src="https://i.imgur.com/Za9SyvO.png" alt="Métodos de Pagamento">
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2023 Gestão Veterinária. Todos os direitos reservados.</p>
  </div>
</footer>

<script>
    const themeToggle = document.getElementById('theme-toggle');
    const customizeButton = document.getElementById('customize-button');
    const colorPicker = document.getElementById('color-picker');
    const navbar = document.getElementById('navbar');
    const body = document.body;
    const sidebar = document.getElementById('sidebar');
    const menuButton = document.getElementById('menu-button');
    const closeSidebar = document.getElementById('close-sidebar');
    let customNavbarColor = '#afd4c3'; // Cor padrão da barra de navegação e da barra lateral
    themeToggle.addEventListener('click', () => {
      body.classList.toggle('dark-theme');
      themeToggle.classList.toggle('bx-sun');
      // Restaurar a cor personalizada ao alternar entre temas claro e escuro
      if (body.classList.contains('dark-theme')) {
        navbar.style.backgroundColor = '#121212'; // Cor de fundo padrão do tema escuro
        sidebar.style.backgroundColor = '#121212'; // Cor de fundo padrão do tema escuro para a barra lateral
      } else {
        navbar.style.backgroundColor = customNavbarColor; // Restaurar a cor personalizada da barra de navegação
        sidebar.style.backgroundColor = customNavbarColor; // Restaurar a cor personalizada da barra lateral
      }
    });
    customizeButton.addEventListener('click', () => {
      colorPicker.style.display = colorPicker.style.display === 'block' ? 'none' : 'block';
    });
    document.getElementById('navbar-color').addEventListener('input', (event) => {
      customNavbarColor = event.target.value; // Armazenar a cor personalizada
      navbar.style.backgroundColor = customNavbarColor; // Atualizar a cor da barra de navegação
      sidebar.style.backgroundColor = customNavbarColor; // Atualizar a cor da barra lateral
    });
    menuButton.addEventListener('click', () => {
      sidebar.style.left = '0';
      navbar.style.transform = 'translateY(-100%)';
    });
    closeSidebar.addEventListener('click', () => {
      sidebar.style.left = '-250px';
      navbar.style.transform = 'translateY(0)';
    });
    document.getElementById('customize-button').addEventListener('click', function () {
      this.classList.toggle('rotated'); // Adiciona ou remove a classe 'rotated' ao clicar
    });
    document.addEventListener('DOMContentLoaded', function () {
      var conteudo = document.querySelector('.conteudo');
      setTimeout(function () {
        conteudo.classList.add('entrou');
      }, 500); // Ajuste o tempo conforme necessário
    });


  </script>

</body>

</html>
