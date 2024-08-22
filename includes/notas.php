<body>
    <!-- Incluindo o Bootstrap e CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/css/styles.css?v=<?php echo filemtime('includes/css/styles.css'); ?>">

    <main>
        <!-- Barra de pesquisa -->
        <section class="search-section">
            <div class="search-container">
                <input type="search" class="search" placeholder="Pesquisar...">
                <img src="resources/svg/search-icon.svg" alt="Ícone de Pesquisa" class="search-icon">
            </div>

        </section>
        <hr> <!-- Divisor -->
        <section class="note-editor">
            <!-- Input do tipo button existente -->
            <input type="button" id="more" class="note" value="Armazene seu passado..." data-toggle="modal"
                data-target="#newNoteModal">

            <!-- Botão com ícone SVG para ordenação -->
            <button type="button" class="sort-button base-button" onclick="toggleRotate180(); sortNotes();">
                <img src="resources/svg/sort-button.svg" alt="Ícone de Ordenar" id="rotate-icon180" width="24"
                    height="24">
            </button>

        </section>
        <!-- Inclui o script para mostrar as notas -->
        <?php include 'mostrar_notas.php'; ?>
    </main>

    <!-- Inclui o modal do arquivo nota_modal.php -->
    <?php include 'nota_modal.php'; ?>

    <!-- Incluindo o jQuery e o Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Scripts para o sort button -->
    <script src="includes/js/sort_notes.js?v=<?php echo filemtime('includes/js/sort_notes.js'); ?>" defer></script>
    <script src="includes/js/rotate_icons.js?v=<?php echo filemtime('includes/js/rotate_icons.js'); ?>" defer></script>
</body>