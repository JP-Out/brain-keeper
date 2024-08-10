<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal - Nova Nota</title>
    <!-- Incluindo o Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/css/modal-style.css">
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="newNoteModal" tabindex="-1" role="dialog" aria-labelledby="newNoteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="noteForm" autocomplete="off">
                        <div class="form-group">
                            <input type="text" class="form-control" id="noteTitle" placeholder="Título">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="noteDescription" rows="3"
                                placeholder="Armazene seu passado..."></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluindo o jQuery e o Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Ajuste automático da altura do textarea conforme o usuário digita
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('newNoteModal');
            const textarea = document.getElementById('noteDescription');
            const titleInput = document.getElementById('noteTitle');

            textarea.addEventListener('input', function () {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            $(modal).on('hide.bs.modal', function () {
                const title = titleInput.value.trim();
                const description = textarea.value.trim();

                // Verifica se os campos não estão vazios
                if (title || description) {
                    fetch('salvar_nota.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            'titulo': title,
                            'conteudo': description
                        })
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.text();
                        })
                        .then(data => {
                            console.log('Success:', data);
                            // Limpa os campos após sucesso
                            titleInput.value = '';
                            textarea.value = '';
                            textarea.style.height = '100px'; // Reseta o tamanho do textarea
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            });
        });
    </script>
</body>

</html>