

<?php
require_once 'app/Session/Login.php';

Use \App\Session\Login;

// Inclui o header
include 'includes/header.php';


$isLogged = Login::isLogged();

// Verifica se a página 'nota_modal.php' foi carregada
if (basename($_SERVER['REQUEST_URI']) == 'nota_modal.php') {
    include 'nota_modal.php';
}

if (!$isLogged) {
    header('location: includes/login.php');
    exit;
}

// Inclui as notas e footer
include 'includes/notas.php';
include 'includes/footer.php';
?>

<script>
    function openModal() {
        // Cria o fundo e o modal dinamicamente
        var modalBg = document.createElement('div');
        modalBg.classList.add('modal-background');

        // Faz a requisição para o 'nota_modal.php'
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'includes/nota_modal.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                modalBg.innerHTML = xhr.responseText;
                document.body.appendChild(modalBg);

                // Fecha o modal ao clicar fora da área do modal
                modalBg.addEventListener('click', function (e) {
                    if (e.target === modalBg) {
                        document.body.removeChild(modalBg);
                    }
                });
            }
        };
        xhr.send();
    }

    // Adiciona o evento de clique no parágrafo para abrir o modal
    document.querySelector('.note').addEventListener('click', openModal);
</script>