function applyMasonry() {
    var notasContainer = document.querySelector('.notas-container');
    var msnry = new Masonry(notasContainer, {
        itemSelector: '.nota',
        columnWidth: '.nota',
        percentPosition: true,
        gutter: 15 // Espaçamento entre os itens
    });
}

document.addEventListener('DOMContentLoaded', function() {
    applyMasonry();
});

function updateNotes() {
    // Função que recarrega as notas
    fetch('mostrar_notas.php')
        .then(response => response.text())
        .then(data => {
            document.querySelector('.notas-container').innerHTML = data;
            applyMasonry(); // Reaplica o Masonry após recarregar as notas
        })
        .catch(error => console.error('Erro ao carregar as notas:', error));
}
