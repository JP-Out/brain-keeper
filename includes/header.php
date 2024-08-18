<?php
// Inicie a sessão
session_start();

// Inclua os arquivos necessários
require_once 'app/Db/Database.php';
require_once 'app/Entity/Usuario.php';
require_once 'app/Session/Login.php';

// Obtém o nome do usuário da sessão, se estiver definido
$user_name = isset($_SESSION['usuario']['nome']) ? $_SESSION['usuario']['nome'] : 'Visitante';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Brain Keeper</a></h1>
            <nav>
                <ul>
                    <li>
                        <button type="button" class="user-login base-button">
                            <img src="resources/svg/user-login.svg" alt="Ícone de Usuario" width="24" height="24">
                        </button>
                        <div class="options-user-submenu">
                            <ul>
                                <li class="submenu-item greeting-item">
                                    <!-- Mensagem de saudação -->
                                    <span>Olá, <?= htmlspecialchars($user_name) ?></span>
                                </li>
                                <li class="submenu-item logout-item">
                                    <!-- Contêiner para ícone de logout e link -->
                                    <div class="logout-container">
                                        <img src="resources/svg/logout-user.svg" alt="Ícone de Logout" width="24"
                                            height="24" class="submenu-icon">
                                        <a class="user-item" href="logout.php">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <script>
        // Mensagem de depuração, se necessário
    </script>
</body>

</html>