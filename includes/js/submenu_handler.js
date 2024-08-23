document.addEventListener('DOMContentLoaded', function () {
    const submenuButtons = document.querySelectorAll('.more-settings-btn');
    const submenus = document.querySelectorAll('.options-note-submenu');

    // Seletor para o botão de login e o submenu correspondente
    const userLoginButton = document.querySelector('.user-login');
    const userSubmenu = document.querySelector('.options-user-submenu');

    // Função para fechar todos os submenus e resetar a rotação dos ícones
    function closeAllSubmenus() {
        submenus.forEach(submenu => {
            submenu.classList.remove('show');
        });
        submenuButtons.forEach(button => {
            const icon = button.querySelector('.rotate-icon90');
            if (icon) {
                icon.classList.remove('rotated-90'); // Remove a rotação do ícone
            }
        });

        // Também fecha o submenu de usuário
        if (userSubmenu) {
            userSubmenu.classList.remove('show');
        }
    }

    // Abrir o submenu correspondente ao botão clicado
    submenuButtons.forEach((button, index) => {
        button.addEventListener('click', function (event) {
            event.stopPropagation(); // Evita que o clique feche o submenu
            const submenu = submenus[index];
            const icon = button.querySelector('.rotate-icon90');
            const isActive = submenu.classList.contains('show');
            closeAllSubmenus(); // Fecha todos os submenus antes de abrir o novo
            if (!isActive) {
                submenu.classList.add('show'); // Abre o submenu correspondente
                if (icon) {
                    icon.classList.add('rotated-90'); // Gira o ícone
                }
            }
        });
    });

    // Adiciona evento de clique ao botão de login
    if (userLoginButton && userSubmenu) {
        userLoginButton.addEventListener('click', function (event) {
            event.stopPropagation(); // Evita que o clique feche o submenu
            const isActive = userSubmenu.classList.contains('show');
            closeAllSubmenus(); // Fecha todos os submenus antes de abrir o novo
            if (!isActive) {
                userSubmenu.classList.add('show'); // Mostra o submenu do usuário
            }
        });
    }

    // Evento de clique ao item "Arquivar"
    document.querySelectorAll('.menu-item').forEach(item => {
        if (item.textContent.trim() === 'Arquivar') {
            item.addEventListener('click', async function (event) {
                event.stopPropagation(); // Impede a propagação do clique para a nota
                
                // Considerar a adição de um modal de confirmação no futuro
                alert('~(>_<。)＼\nParece que você, quer testar uma função que não deu tempo de implementar...');
            });
        }
    });

    // Evento de clique ao item "Excluir"
    document.querySelectorAll('.menu-item').forEach(item => {
        if (item.textContent.trim() === 'Excluir') {
            item.addEventListener('click', async function (event) {
                event.stopPropagation(); // Impede a propagação do clique para a nota
                
                const noteId = this.getAttribute('data-id');
                
                // Modal de confirmação pode ser uma opção melhor aqui
                if (confirm('Tem certeza de que deseja excluir esta nota?')) {
                    try {
                        const response = await fetch('excluir_nota.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                'id': noteId
                            })
                        });
                    
                        const status = response.status;
                        const data = await response.text();
                        console.log(`Status: ${status}`);
                        console.log('Resposta:', data);
                    
                        if (status === 200) {
                            // Nota excluída com sucesso
                            location.reload();
                        } else {
                            console.error('Erro ao excluir a nota:', data);
                        }
                    } catch (error) {
                        console.error('Erro ao excluir a nota:', error);
                    }
                }
            });
        }
    });

    // Fechar todos os submenus ao clicar fora
    document.addEventListener('click', function () {
        closeAllSubmenus();
    });
});
