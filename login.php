<?php include 'includes/header.php'; ?>

<main>
    <div class="container">
        <div class="form-container">
            <div class="login-section">
                <form action="login.php" method="POST" class="login-form">
                    <h2>Login</h2>

                    <label for="login_email">Email:</label>
                    <input type="email" id="login_email" name="login_email" class="form-input" required>

                    <label for="login_senha">Senha:</label>
                    <input type="password" id="login_senha" name="login_senha" class="form-input" required>

                    <button type="submit" class="form-button">Entrar</button>
                </form>
            </div>

            <div class="separator"></div>

            <div class="cadastro-section">
                <form action="index.php" method="POST" class="cadastro-form">
                    <h2>Cadastro</h2>

                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" class="form-input" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-input" required>

                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" class="form-input" required>

                    <label for="confirma_senha">Confirme a Senha:</label>
                    <input type="password" id="confirma_senha" name="confirma_senha" class="form-input" required>

                    <button type="submit" class="form-button">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
