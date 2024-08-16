document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.search');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase();
            if (query.trim() === '') {
                console.info("barra vazia");
                fetch('mostrar_notas.php')
                    .then(response => response.text())
                    .then(data => {
                        document.querySelector('.note-editor').innerHTML = data;
                    });
                location.reload();
            } else {
                // Se houver uma busca, filtra as notas
                fetch(`mostrar_notas.php?search=${query}`)
                    .then(response => response.text())
                    .then(data => {
                        document.querySelector('.note-editor').innerHTML = data;
                    });
            }
        });
    }
});
