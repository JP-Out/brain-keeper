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
                            <textarea class="form-control" id="noteDescription"
                                placeholder="Armazene seu passado..."></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>