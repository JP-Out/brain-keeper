<?php
require_once 'app/Db/Database.php';

// Inicialize a classe Database com a tabela 'notas'
$db = new \App\Db\Database('notas');

// Busca todas as notas, ordenadas pela data de criação
$notas = $db->select(null, 'data_criacao DESC')->fetchAll(PDO::FETCH_ASSOC);

if (!function_exists('truncarTexto')) {
    // Função para truncar o texto com limite de 500 caracteres
    function truncarTexto($texto, $limite = 500)
    {
        if (strlen($texto) > $limite) {
            return substr($texto, 0, $limite) . '...';
        }
        return $texto;
    }
}
?>

<!-- Masonry CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<!-- Arquivo JS personalizado -->
<script src="includes/js/masonry.js"></script>
<script src="includes/js/drag_area.js"></script>

<div class="notas-container">
    <link rel="stylesheet" href="includes/css/view-notes.css">
    <?php foreach ($notas as $nota): ?>
        <div class="nota <?= strlen($nota['conteudo']) > 500 ? 'truncate' : '' ?>" data-id="<?= $nota['id'] ?>"
            data-toggle="modal" data-target="#newNoteModal">
            <h3><?= htmlspecialchars($nota['titulo']) ?></h3>
            <p><?= nl2br(htmlspecialchars(truncarTexto($nota['conteudo']))) ?></p>
            <small><?= htmlspecialchars($nota['data_criacao']) ?></small>
        </div>

    <?php endforeach; ?>
</div>