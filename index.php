<?php
    // require_once 'app/Entity/Projeto.php';
    // require_once 'app/Session/Login.php';

    // use \App\Entity\Projeto;
    // use \App\Session\Login;

    // Login::requiredLogin();

    // $projetos = Projeto::getProjetos();
    //print_r($projetos); exit;
   
    include 'includes/header.php';
    include 'includes/notas.php';
    include 'includes/footer.php';

    // Verifica se a página 'nova_nota.php' foi carregada
    if (basename($_SERVER['REQUEST_URI']) == 'new_note.php') {
        include 'new_note.php';
    }

    //session_start();
    //print_r($_SESSION['usuario']);
?>

<script>
    function openModal() {
        // Cria o fundo e o modal dinamicamente
        var modalBg = document.createElement('div');
        modalBg.classList.add('modal-background');

        // Faz a requisição para o 'new_note.php'
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'new_note.php', true);
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