document.addEventListener('DOMContentLoaded', () => {
    const notasContainer = document.querySelector('.notas-container');
    const notas = document.querySelectorAll('.nota');
    let isSelecting = false;
    let startX, startY;
    let animationFrameId;

    const selectionArea = document.createElement('div');
    selectionArea.classList.add('selection-area');
    document.body.appendChild(selectionArea);

    function startSelection(e) {
        if (e.target.matches('input, textarea, select, .search')) {
            return;
        }

        notas.forEach(nota => nota.classList.remove('selected'));

        isSelecting = true;
        startX = e.pageX;
        startY = e.pageY;
        selectionArea.style.left = startX + 'px';
        selectionArea.style.top = startY + 'px';
        selectionArea.style.width = '0px';
        selectionArea.style.height = '0px';
        selectionArea.style.display = 'block';

        e.preventDefault();
    }

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

    function handleMouseMove(e) {
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
        }
        animationFrameId = requestAnimationFrame(() => updateSelection(e));
    }

    function endSelection() {
        isSelecting = false;
        selectionArea.style.display = 'none';
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
        }
    }

    document.addEventListener('mousedown', startSelection);
    document.addEventListener('mousemove', handleMouseMove);
    document.addEventListener('mouseup', endSelection);
    document.addEventListener('mouseleave', endSelection);

    document.addEventListener('mousedown', (event) => {
        if (!event.target.matches('input, textarea, select, .search')) {
            event.preventDefault();
        }
    });
});
