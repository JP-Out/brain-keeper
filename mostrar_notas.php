<?php
require_once 'app/Db/Database.php';

// Inicialize a classe Database com a tabela 'notas'
$db = new \App\Db\Database('notas');

// Busca todas as notas
$notas = $db->select()->fetchAll(PDO::FETCH_ASSOC);

// Função para truncar o texto com limite de 500 caracteres
function truncarTexto($texto, $limite = 500) {
    if (strlen($texto) > $limite) {
        return substr($texto, 0, $limite) . '...';
    }
    return $texto;
}
?>

<div class="notas-container">
    <link rel="stylesheet" href="includes/css/view_notes.css">
    <?php foreach ($notas as $nota): ?>
        <div class="nota <?= strlen($nota['conteudo']) > 500 ? 'truncate' : '' ?>">
            <h3><?= htmlspecialchars($nota['titulo']) ?></h3>
            <p><?= nl2br(htmlspecialchars(truncarTexto($nota['conteudo']))) ?></p>
            <small><?= htmlspecialchars($nota['data_criacao']) ?></small>
        </div>
    <?php endforeach; ?>
</div>
