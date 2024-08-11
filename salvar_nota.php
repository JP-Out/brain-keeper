<?php
require_once 'app/Db/Database.php';

// Inicialize a classe Database com a tabela 'notas'
$db = new \App\Db\Database('notas');

// Recebe os dados do formulário
$id = $_POST['id'] ?? null;
$titulo = $_POST['titulo'] ?? '';
$conteudo = $_POST['conteudo'] ?? '';

var_dump($_POST); // Depuração: Verifique os dados recebidos

try {
    if ($id && $id !== 'null') {
        // Atualiza a nota existente
        $updateValues = ['titulo' => $titulo, 'conteudo' => $conteudo];
        $updated = $db->update($updateValues, ['id' => $id]);

        if ($updated) {
            echo "Nota atualizada com sucesso.";
        } else {
            echo "Erro ao atualizar a nota.";
        }
    } else {
        // Insere uma nova nota
        $insertValues = ['titulo' => $titulo, 'conteudo' => $conteudo];
        $insertId = $db->insert($insertValues);

        if ($insertId) {
            echo "Nova nota criada com sucesso. ID: " . $insertId;
        } else {
            echo "Erro ao criar a nota.";
        }
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>
