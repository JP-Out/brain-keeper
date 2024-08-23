<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal - Nova Nota</title>

    <!-- Incluindo o Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="includes/css/modal-style.css?v=<?php echo filemtime('includes/css/modal-style.css'); ?>">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="includes/js/nota_modal.js?v=<?php echo filemtime('includes/js/nota_modal.js'); ?>"></script>

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
                        <!-- Utilizar este novo elemento como campo de descrição -->
                        <!-- <div class="form-group">
                            <div id="noteDescription" class="form-control" contenteditable="true"
                                placeholder="Armazene seu passado..."></div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>