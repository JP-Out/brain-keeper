<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/buttons-styles.css">
    <script src="js/disable_buttons.js"></script>
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="../index.php">Brain Keeper</a></h1>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="form-container">
                <div class="login-section">
                    <form action="../login_action.php" method="POST" class="login-form">
                        <h2>Login</h2>
                        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_login'): ?>
                            <p class="error-message-based error-message-login">Usuario/Email ou senha inválidos.</p>
                        <?php endif; ?>
                        <label for="login_usuario_email">Usuário/Email:</label>
                        <input type="text" id="login_usuario_email" name="login_usuario_email" class="form-input"
                            autocomplete="user" required>
                        <label for="login_senha">Senha:</label>
                        <input type="password" id="login_senha" name="login_senha" class="form-input"
                            autocomplete="current-password" required>
                        <button type="submit" id="login_button" class="form-button" disabled>Entrar</button>
                    </form>
                </div>
                <div class="separator"></div>
                <div class="cadastro-section">
                    <form action="../login_action.php" method="POST" class="cadastro-form">
                        <h2>Cadastro</h2>
                        <div class="form-group">
                            <?php if (isset($_GET['error']) && $_GET['error'] == 'nome_exists'): ?>
                                <p class="error-message-based error-message-name">Nome já em uso.</p>
                            <?php endif; ?>
                            <label for="usuario_nome">Nome de Usuário:</label>
                            <input type="text" id="usuario_nome" name="usuario_nome" class="form-input"
                                autocomplete="user" required>
                            <?php if (isset($_GET['error']) && $_GET['error'] == 'email_exists'): ?>
                                <p class="error-message-based error-message-email">Email já em uso.</p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-input" autocomplete="email"
                                required>
                            <?php if (isset($_GET['error']) && $_GET['error'] == 'password_mismatch'): ?>
                                <p class="error-message-based error-message-password">As senhas não coincidem.</p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" id="senha" name="senha" class="form-input"
                                autocomplete="new-password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirma_senha">Confirme a Senha:</label>
                            <input type="password" id="confirma_senha" name="confirma_senha" class="form-input"
                                autocomplete="new-password" required>
                        </div>
                        <button type="submit" id="cadastro_button" class="form-button" disabled>Cadastrar</button>
                        <?php if (isset($_GET['error']) && $_GET['error'] == 'registration_failed'): ?>
                            <div class="form-group">
                                <p class="error-message-based error-message-registration">Ocorreu um erro ao cadastrar o usuário. Tente novamente.</p>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>
