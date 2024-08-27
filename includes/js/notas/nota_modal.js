document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('newNoteModal');
    const textarea = document.getElementById('noteDescription');
    const titleInput = document.getElementById('noteTitle');
    const notasContainer = document.querySelector('.notas-container');

    function autoResizeTextarea() {
        textarea.style.height = 'auto';
        textarea.style.height = Math.min(textarea.scrollHeight, 600) + 'px';
        textarea.style.overflowY = 'auto';
    }

    function loadNoteData(noteId) {
        fetch('get_note.php?id=' + noteId)
            .then(response => response.json())
            .then(data => {
                titleInput.value = data.titulo;
                textarea.value = data.conteudo;
                autoResizeTextarea();
                modal.setAttribute('data-note-id', noteId);
            })
            .catch(error => console.error('Erro ao buscar a nota:', error));
    }

    function resetModal() {
        titleInput.value = '';
        textarea.value = '';
        textarea.style.height = 'auto';
        modal.removeAttribute('data-note-id');
    }

    function updateNotasContainer() {
        fetch('mostrar_notas.php')
            .then(response => response.text())
            .then(data => {
                // Seleciona o conteúdo dentro da nova `notas-container`
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, 'text/html');
                const newNotes = doc.querySelector('.notas-container').innerHTML;
    
                // Substitui o conteúdo da `notas-container` existente
                notasContainer.innerHTML = newNotes;
                attachNoteClickEvents();  // Re-anexa os eventos de clique nas novas notas
                applyMasonry();  // Reaplica o Masonry após a atualização
            })
            .catch(error => console.error('Erro ao atualizar as notas:', error));
    }
    

    function applyMasonry() {
        var msnry = new Masonry(notasContainer, {
            itemSelector: '.nota',
            columnWidth: '.nota',
            percentPosition: true,
            gutter: 15,
            transitionDuration: '0.4s' // Pode ajustar ou desativar a animação
        });
        msnry.layout();  // Recalcula o layout do Masonry
    }


    function saveNote() {
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
                    'id': noteId || '',
                    'titulo': title,
                    'conteudo': description
                })
            })
                .then(response => response.text())
                .then(data => {
                    console.log('Success:', data);
                    resetModal();
                    updateNotasContainer();  // Atualiza o container das notas
                })
                .catch(error => console.error('Error:', error));
        }
    }

    function adjustHeaderPadding() {
        const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
        $('header').css('padding-right', scrollbarWidth + 'px');
    }

    function resetHeaderPadding() {
        $('header').css('padding-right', '');
    }

    function attachNoteClickEvents() {
        document.querySelectorAll('.nota').forEach(nota => {
            nota.addEventListener('click', function () {
                const noteId = this.getAttribute('data-id');
                loadNoteData(noteId);
            });
        });
    }

    // Inicializa eventos ao carregar a página
    attachNoteClickEvents();
    applyMasonry();

    $(modal).on('show.bs.modal', function () {
        resetModal();
    });

    $(modal).on('shown.bs.modal', function () {
        autoResizeTextarea();
    });

    $(modal).on('hide.bs.modal', function () {
        saveNote();
    });

    textarea.addEventListener('input', autoResizeTextarea);

    titleInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            textarea.focus();
        }
    });

    $(document).on('show.bs.modal', adjustHeaderPadding);
    $(document).on('hidden.bs.modal', resetHeaderPadding);
});
