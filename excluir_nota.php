<?php
require_once 'app/Db/Database.php';

// Obtém o ID da nota a partir da solicitação POST
$id = $_POST['id'] ?? null;

if ($id) {
    // Inicialize a classe Database com a tabela 'notas'
    $db = new \App\Db\Database('notas');

    // Exclui a nota com o ID fornecido
    if ($db->delete('id = ' . intval($id) ?? 0)) {
        echo '[ID: '.$id.']'.' Nota excluída com sucesso!';
    } else {
        echo 'Erro ao excluir a nota.';
    }
} else {
    echo 'ID da nota não fornecido.';
}
?>
