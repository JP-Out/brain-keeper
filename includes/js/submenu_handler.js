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

    // Fechar todos os submenus ao clicar fora
    document.addEventListener('click', function () {
        closeAllSubmenus();
    });
});
