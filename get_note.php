<?php
require_once 'app/Db/Database.php';

// Verifica se o ID foi passado
if (isset($_GET['id'])) {
    $noteId = $_GET['id'];

    // Inicialize a classe Database com a tabela 'notas'
    $db = new \App\Db\Database('notas');

    // Busca a nota pelo ID
    $nota = $db->select('id = ' . $noteId)->fetch(PDO::FETCH_ASSOC);

    if ($nota) {
        echo json_encode($nota);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Nota não encontrada.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'ID da nota não fornecido.']);
}
