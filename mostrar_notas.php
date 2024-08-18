<?php
require_once 'app/Db/Database.php';
require_once 'app/Session/Login.php';

// Verifica se o usuário está logado
if (!\App\Session\Login::isLogged()) {
    header('Location: includes/login.php');
    exit;
}

// Captura o termo de pesquisa da query string
$search = $_GET['search'] ?? '';

// Inicialize a classe Database com a tabela 'notas'
$db = new \App\Db\Database('notas');

// Condição de busca
$whereClause = 'usuario_id = :usuario_id'; // Adiciona condição para o usuário logado
$params = [':usuario_id' => $_SESSION['usuario']['id']];

if ($search) {
    $search = '%' . $search . '%';
    $whereClause .= " AND (titulo LIKE :search OR conteudo LIKE :search)";
    $params[':search'] = $search;
}

// Busca todas as notas que correspondem ao termo de pesquisa e pertencem ao usuário logado
$notas = $db->select($whereClause, 'data_criacao DESC', null, '*', $params)->fetchAll(PDO::FETCH_ASSOC);

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

<div class="notas-container">
    <?php foreach ($notas as $nota): ?>
        <div class="nota <?= strlen($nota['conteudo']) > 500 ? 'truncate' : '' ?>" data-id="<?= $nota['id'] ?>"
            data-toggle="modal" data-target="#newNoteModal">
            <div class="nota-content">
                <div class="more-options">
                    <button class="more-settings-btn base-button">
                        <img src="resources/svg/more-options.svg" class="rotate-icon90" alt="Ícone de Mais Opções"
                            width="24" height="24">
                    </button>
                    <div class="options-note-submenu">
                        <ul>
                            <li>
                                <img src="resources/svg/menu-item-edit.svg" alt="Ícone de Logout" width="24" height="24"
                                class="submenu-icon">
                                <a class="menu-item" data-id="<?= $nota['id'] ?>">Editar</a>
                            </li>
                            <li>
                                <img src="resources/svg/menu-item-archive.svg" alt="Ícone de Logout" width="24" height="24"
                                class="submenu-icon">
                                <a class="menu-item" data-id="<?= $nota['id'] ?>">Arquivar</a>
                            </li>
                            <li>
                                <img src="resources/svg/menu-item-delete.svg" alt="Ícone de Logout" width="24" height="24"
                                class="submenu-icon">
                                <a class="menu-item" data-id="<?= $nota['id'] ?>">Excluir</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <h3><?= htmlspecialchars($nota['titulo']) ?></h3>
                <p><?= nl2br(htmlspecialchars(truncarTexto($nota['conteudo']))) ?></p>
                <small><?= htmlspecialchars($nota['data_criacao']) ?></small>
            </div>
        </div>
    <?php endforeach; ?>
</div>