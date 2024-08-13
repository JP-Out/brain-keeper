function toggleRotate180() {
    const icon = document.getElementById('rotate-icon180');
    icon.classList.toggle('rotated-180');
}

function toggleRotate90(e, button) {
    e.stopPropagation(); // Impede a propagação do clique para a nota

    const icon = button.querySelector('.rotate-icon90');
    const submenu = button.nextElementSibling; // O submenu está logo após o botão

    const isVisible = submenu.classList.contains('show');
    
    icon.classList.toggle('rotated-90', !isVisible);
    submenu.classList.toggle('show', !isVisible);

    document.addEventListener('click', function(event) {
        if (!button.contains(event.target) && !submenu.contains(event.target)) {
            submenu.classList.remove('show');
            icon.classList.remove('rotated-90');
        }
    }, { once: true });
}


