<?php
    // Include header, notas, e footer
    include 'includes/header.php';
    include 'includes/notas.php';

    // Inclui o arquivo para mostrar as notas
    include 'mostrar_notas.php';

    include 'includes/footer.php';

    // Verifica se a página 'nova_nota.php' foi carregada
    if (basename($_SERVER['REQUEST_URI']) == 'new_note.php') {
        include 'new_note.php';
    }
?>
