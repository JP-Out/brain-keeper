document.addEventListener('DOMContentLoaded', function() {
    var grid = document.querySelector('.notas-container');
    var msnry = new Masonry(grid, {
        itemSelector: '.nota',
        columnWidth: '.nota',
        percentPosition: true,
        gutter: 15 // Espaçamento entre os itens
    });
});
