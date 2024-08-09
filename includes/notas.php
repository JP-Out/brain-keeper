<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <!-- Inclua o Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <main>
        <section class="note-editor">
            <!-- Botão com classe note -->
            <button type="button" class="note" data-toggle="modal" data-target="#newNoteModal">
                <p>Armazene seu passado...</p>
            </button>
        </section>
    </main>

    <!-- Inclui o modal do arquivo nova_nota.php -->
    <?php include 'nova_nota.php'; ?>

    <!-- Inclua o jQuery e o Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>