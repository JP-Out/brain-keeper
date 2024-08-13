document.addEventListener('DOMContentLoaded', () => {
    const notasContainer = document.querySelector('.notas-container');
    const notas = document.querySelectorAll('.nota');
    let isSelecting = false;
    let startX, startY;

    // Cria o elemento para a área de seleção
    const selectionArea = document.createElement('div');
    selectionArea.classList.add('selection-area');
    notasContainer.appendChild(selectionArea);

    // Função para iniciar a seleção
    function startSelection(e) {
        isSelecting = true;
        startX = e.pageX - notasContainer.offsetLeft;
        startY = e.pageY - notasContainer.offsetTop;
        selectionArea.style.left = startX + 'px';
        selectionArea.style.top = startY + 'px';
        selectionArea.style.width = '0px';
        selectionArea.style.height = '0px';
        selectionArea.style.display = 'block';

        // Previne a seleção de texto ao iniciar a seleção
        e.preventDefault();
    }

    // Função para atualizar a área de seleção
    function updateSelection(e) {
        if (!isSelecting) return;

        const currentX = e.pageX - notasContainer.offsetLeft;
        const currentY = e.pageY - notasContainer.offsetTop;

        const width = Math.abs(currentX - startX);
        const height = Math.abs(currentY - startY);
        const left = Math.min(currentX, startX);
        const top = Math.min(currentY, startY);

        selectionArea.style.width = width + 'px';
        selectionArea.style.height = height + 'px';
        selectionArea.style.left = left + 'px';
        selectionArea.style.top = top + 'px';

        // Verifica se alguma nota está dentro da área de seleção
        notas.forEach(nota => {
            const notaRect = nota.getBoundingClientRect();
            const selectionRect = selectionArea.getBoundingClientRect();

            if (
                selectionRect.left < notaRect.right &&
                selectionRect.right > notaRect.left &&
                selectionRect.top < notaRect.bottom &&
                selectionRect.bottom > notaRect.top
            ) {
                nota.classList.add('selected');
            } else {
                nota.classList.remove('selected');
            }
        });
    }

    // Função para terminar a seleção
    function endSelection() {
        isSelecting = false;
        selectionArea.style.display = 'none';
    }

    // Eventos para o mouse
    notasContainer.addEventListener('mousedown', startSelection);
    notasContainer.addEventListener('mousemove', updateSelection);
    notasContainer.addEventListener('mouseup', endSelection);
    notasContainer.addEventListener('mouseleave', endSelection);
});

// CSS para desativar a seleção de texto (opcional, se necessário)
/*
.no-select {
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
*/

// Previne a seleção de texto ao clicar e arrastar no container de notas
notasContainer.addEventListener('mousedown', (event) => {
    event.preventDefault();
});
