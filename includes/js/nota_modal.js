document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('newNoteModal');
    const textarea = document.getElementById('noteDescription');
    const titleInput = document.getElementById('noteTitle');

    // Função para ajustar a altura do textarea com base no conteúdo
    function autoResizeTextarea() {
        textarea.style.height = '600'; // Reseta a altura
        textarea.style.height = Math.min(textarea.scrollHeight, 600) + 'px'; // Ajusta para o tamanho do conteúdo, com altura máxima
        textarea.style.overflowY = 'auto';

    }

    document.querySelectorAll('.nota').forEach(nota => {
        nota.addEventListener('click', function () {
            const noteId = this.getAttribute('data-id');

            fetch('get_note.php?id=' + noteId)
                .then(response => response.json())
                .then(data => {
                    titleInput.value = data.titulo;
                    textarea.value = data.conteudo;

                    // Atribui o ID da nota ao modal para ser usado ao salvar
                    modal.setAttribute('data-note-id', noteId);
                })
                .catch(error => console.error('Erro ao buscar a nota:', error));
        });
    });

    // Reseta o modal ao abrir (usado para criar uma nova nota)
    $(modal).on('show.bs.modal', function () {
        titleInput.value = '';
        textarea.value = '';
        textarea.style.height = 'auto'; // Reseta a altura do textarea
        modal.removeAttribute('data-note-id');  // Remove o ID para criar uma nova nota
    });

    // Salvamento ao fechar o modal
    $(modal).on('hide.bs.modal', function () {
        const title = titleInput.value.trim();
        const description = textarea.value.trim();
        const noteId = modal.getAttribute('data-note-id');

        if (title || description) {
            fetch('salvar_nota.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    'id': noteId || '',  // Envia o ID se existir, ou uma string vazia para criar uma nova nota
                    'titulo': title,
                    'conteudo': description
                })
            })
                .then(response => response.text())
                .then(data => {
                    console.log('Success:', data);
                    titleInput.value = '';
                    textarea.value = '';
                    textarea.style.minHeight = '80px'; // Restaura a altura mínima para o textarea
                })
                .catch(error => console.error('Error:', error));
        }
    });

    // Adiciona o evento de input para redimensionar o textarea enquanto digita
    textarea.addEventListener('input', autoResizeTextarea);
});
