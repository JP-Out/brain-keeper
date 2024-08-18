<?php
// Inclua o arquivo de configuração do banco de dados e a classe Usuario
require_once 'app/Db/Database.php';
require_once 'app/Entity/Usuario.php';
require_once 'app/Session/Login.php';

use App\Entity\Usuario;
use App\Session\Login;

// Função para conectar ao banco de dados
function getDBConnection()
{
    $db = new \PDO('mysql:host=localhost;dbname=brain_keeper_crud;charset=utf8', 'root', '');
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    return $db;
}

// Verifica se o formulário de login ou cadastro foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login_usuario_email']) && isset($_POST['login_senha'])) {
        // Login
        $loginInput = $_POST['login_usuario_email'];
        $senha = $_POST['login_senha'];

        // Conecte-se ao banco de dados
        $db = getDBConnection();

        // Prepare e execute a consulta para verificar o usuário por email ou nome
        $stmt = $db->prepare('SELECT * FROM usuarios WHERE email = :loginInput OR nome = :loginInput');
        $stmt->execute([
            ':loginInput' => $loginInput
        ]);
        $usuarioExistente = $stmt->fetch(PDO::FETCH_OBJ);

        if ($usuarioExistente && password_verify($senha, $usuarioExistente->senha)) {
            // Se o usuário existir e a senha estiver correta, faça o login
            Login::login($usuarioExistente);
        } else {
            // Se o usuário não existir ou a senha estiver incorreta, redirecione de volta para a página de login com uma mensagem de erro
            header('Location: includes/login.php?error=invalid_login');
            exit;
        }
    } elseif (isset($_POST['usuario_nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirma_senha'])) {
        // Cadastro
        $nome = $_POST['usuario_nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmaSenha = $_POST['confirma_senha'];

        // Verifique se as senhas coincidem
        if ($senha !== $confirmaSenha) {
            header('Location: includes/login.php?error=password_mismatch');
            exit;
        }

        // Conecte-se ao banco de dados
        $db = getDBConnection();

        // Verifique se o email ou nome já está registrado
        $stmt = $db->prepare('SELECT * FROM usuarios WHERE email = :email OR nome = :nome');
        $stmt->execute([
            ':email' => $email,
            ':nome' => $nome
        ]);
        $usuarioExistente = $stmt->fetch(PDO::FETCH_OBJ);

        if ($usuarioExistente) {
            // Se o email ou nome já existir, redirecione de volta para o formulário com uma mensagem de erro
            if ($usuarioExistente->email === $email) {
                header('Location: includes/login.php?error=email_exists');
            } elseif ($usuarioExistente->nome === $nome) {
                header('Location: includes/login.php?error=nome_exists');
            }
            exit;
        }

        // Prepare e execute a consulta para inserir o novo usuário
        $stmt = $db->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');
        $success = $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => password_hash($senha, PASSWORD_DEFAULT) // Usando password_hash para hash seguro
        ]);

        if ($success) {
            // Se o cadastro for bem-sucedido, faça o login
            $usuario = new Usuario();
            $usuario->nome = $nome;
            $usuario->email = $email;
            $usuario->id = $db->lastInsertId();
            Login::login($usuario);
        } else {
            // Se houver um erro ao cadastrar, redirecione de volta para a página de login com uma mensagem de erro
            header('Location: includes/login.php?error=registration_failed');
            exit;
        }
    } else {
        // Se nenhum formulário for enviado, redirecione para a página de login
        header('Location: includes/login.php');
        exit;
    }
} else {
    // Se o método não for POST, redirecione para a página de login
    header('Location: includes/login.php');
    exit;
}
?>
