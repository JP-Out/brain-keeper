<?php
require_once 'app/Db/Database.php';  // Inclua o caminho correto para a classe Database

// Inicialize a classe Database com a tabela 'notas'
$db = new \App\Db\Database('notas');

// Recebe os dados do formulário
$titulo = $_POST['titulo'] ?? '';
$conteudo = $_POST['conteudo'] ?? '';

// Prepara os dados para inserção
$values = [
    'titulo' => $titulo,
    'conteudo' => $conteudo
];

// Insere os dados na tabela usando o método insert
$insertId = $db->insert($values);

if ($insertId) {
    echo "Nova nota criada com sucesso. ID: " . $insertId;
} else {
    echo "Erro ao criar a nota.";
}

// Não redirecionar após a inserção
?>
