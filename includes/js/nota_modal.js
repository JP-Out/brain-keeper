document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('newNoteModal');
    const textarea = document.getElementById('noteDescription');
    const titleInput = document.getElementById('noteTitle');

    document.querySelectorAll('.nota').forEach(nota => {
        nota.addEventListener('click', function () {
            const noteId = this.getAttribute('data-id');

            fetch('get_note.php?id=' + noteId)
                .then(response => response.json())
                .then(data => {
                    titleInput.value = data.titulo;
                    textarea.value = data.conteudo;

                    // Ajusta a altura do textarea com base no comprimento do conteúdo
                    textarea.style.height = 'auto';
                    textarea.style.overflowY = 'auto';
                    if (data.conteudo.length > 1000) {
                        textarea.style.height = '600px';
                    } else {
                        textarea.style.overflowY = 'hidden'; 
                    }

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
                })
                .catch(error => console.error('Error:', error));
        }
    });
});
