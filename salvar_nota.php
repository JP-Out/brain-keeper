<?php
require_once 'app/Db/Database.php';
require_once 'app/Session/Login.php';

// Inicialize a classe Database com a tabela 'notas'
$db = new \App\Db\Database('notas');

// Verifica se o usuário está logado
if (!\App\Session\Login::isLogged()) {
    header('Location: includes/login.php');
    exit;
}

// Recebe os dados do formulário
$id = $_POST['id'] ?? null;
$titulo = $_POST['titulo'] ?? '';
$conteudo = $_POST['conteudo'] ?? '';
$usuarioId = $_SESSION['usuario']['id']; // ID do usuário logado
var_dump($_POST); // Depuração: Para os dados recebidos

try {
    if ($id) {
        // Verifica se o id existe no banco de dados e pertence ao usuário logado
        $query = 'SELECT id FROM ' . $db->getTable() . ' WHERE id = ? AND usuario_id = ?';
        $result = $db->execute($query, [$id, $usuarioId]);

        if ($result && $noteExists = $result->fetch(PDO::FETCH_ASSOC)) {
            // Atualiza a nota existente
            $updateValues = ['titulo' => $titulo, 'conteudo' => $conteudo];
            $updated = $db->update($updateValues, ['id' => $id]);

            if ($updated) {
                echo "Nota atualizada com sucesso.";
            } else {
                echo "Erro ao atualizar a nota.";
            }
        } else {
            echo "Erro: Nota com ID $id não encontrada ou não pertence ao usuário.";
        }
    } elseif (!empty(trim($conteudo))) {
        // Insere uma nova nota
        $insertValues = ['titulo' => $titulo, 'conteudo' => $conteudo, 'usuario_id' => $usuarioId];
        $insertId = $db->insert($insertValues);

        if ($insertId) {
            echo "Nova nota criada com sucesso. ID: " . $insertId;
        } else {
            echo "Erro ao criar a nota.";
        }
    } else {
        echo "Erro: O conteúdo não pode estar vazio.";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>
