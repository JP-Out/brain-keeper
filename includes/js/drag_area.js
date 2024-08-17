document.addEventListener('DOMContentLoaded', () => {
    const notasContainer = document.querySelector('.notas-container');
    const notas = document.querySelectorAll('.nota');
    let isSelecting = false;
    let startX, startY;

    // Cria o elemento para a área de seleção
    const selectionArea = document.createElement('div');
    selectionArea.classList.add('selection-area');
    document.body.appendChild(selectionArea); // Anexa a seleção ao corpo do documento

    // Função para iniciar a seleção
    function startSelection(e) {
        if (e.target.matches('input, textarea, select, .search')) {
            return;
        }

        // Desmarcar todas as notas
        notas.forEach(nota => nota.classList.remove('selected'));

        isSelecting = true;
        startX = e.pageX;
        startY = e.pageY;
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

        const currentX = e.pageX;
        const currentY = e.pageY;

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

    // Eventos para o mouse em toda a janela
    document.addEventListener('mousedown', startSelection);
    document.addEventListener('mousemove', updateSelection);
    document.addEventListener('mouseup', endSelection);
    document.addEventListener('mouseleave', endSelection);

    // Previne a seleção de texto ao clicar e arrastar
    document.addEventListener('mousedown', (event) => {
        if (!event.target.matches('input, textarea, select, .search')) {
            event.preventDefault();
        }
    });
});
