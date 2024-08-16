document.addEventListener('DOMContentLoaded', function () {
    // Evento de clique ao item "Arquivar"
    document.querySelectorAll('.menu-item').forEach(item => {
        if (item.textContent.trim() === 'Arquivar') {
            item.addEventListener('click', async function (event) {
                event.stopPropagation(); // Impede a propagação do clique para a nota
                
                // Considerar a adição de um modal de confirmação no futuro
                alert('Não deu tempo 😢... Por que não um dia?');
            });
        }
    });
});
