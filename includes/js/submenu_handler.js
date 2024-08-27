document.addEventListener('DOMContentLoaded', function () {
    const submenuButtons = document.querySelectorAll('.more-settings-btn');
    const submenus = document.querySelectorAll('.options-note-submenu');
    let closeTimer;

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
    }

    // Adiciona eventos de mouseover e mouseout aos botões de submenu
    submenuButtons.forEach((button, index) => {
        button.addEventListener('mouseover', function () {
            // Limpa o timer de fechamento, se houver
            clearTimeout(closeTimer);

            const submenu = submenus[index];
            const icon = button.querySelector('.rotate-icon90');
            if (submenu) {
                submenu.classList.add('show'); // Abre o submenu
            }
            if (icon) {
                icon.classList.add('rotated-90'); // Gira o ícone
            }
        });

        button.addEventListener('mouseout', function () {
            // Adiciona um timer para fechar o submenu após um atraso
            closeTimer = setTimeout(() => {
                const submenu = submenus[index];
                const icon = button.querySelector('.rotate-icon90');
                if (submenu) {
                    submenu.classList.remove('show'); // Fecha o submenu
                }
                if (icon) {
                    icon.classList.remove('rotated-90'); // Reverte a rotação do ícone
                }
            }, 300);
        });
    });

    // Adiciona eventos de mouseover e mouseout aos submenus para evitar fechamento prematuro
    submenus.forEach((submenu, index) => {
        submenu.addEventListener('mouseover', function () {
            clearTimeout(closeTimer); // Limpa o timer de fechamento
        });

        submenu.addEventListener('mouseout', function () {
            closeTimer = setTimeout(() => {
                submenu.classList.remove('show');
                const button = submenuButtons[index];
                const icon = button.querySelector('.rotate-icon90');
                if (icon) {
                    icon.classList.remove('rotated-90');
                }
            }, 300); // 300ms de atraso
        });
    });

    // Fechar todos os submenus ao clicar fora
    document.addEventListener('click', function () {
        closeAllSubmenus();
    });

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
});
