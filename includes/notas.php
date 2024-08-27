<body>
    <link rel="stylesheet" href="includes/css/styles.css?v=<?php echo filemtime('includes/css/styles.css'); ?>">
    <link rel="stylesheet" href="includes/css/view-notes.css?v=<?php echo filemtime('includes/css/view-notes.css'); ?>">
    <link rel="stylesheet"
        href="includes/css/buttons-styles.css?v=<?php echo filemtime('includes/css/buttons-styles.css'); ?>">
    <link rel="stylesheet"
        href="includes/css/modal-style.css?v=<?php echo filemtime('includes/css/modal-style.css'); ?>">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>

    <script src="includes/js/notas/notas_masonry.js?v=<?php echo filemtime('includes/js/notas/notas_masonry.js'); ?>"></script>
    <script src="includes/js/notas/drag_area.js?v=<?php echo filemtime('includes/js/notas/drag_area.js'); ?>"></script>
    <script src="includes/js/submenu_handler.js?v=<?php echo filemtime('includes/js/submenu_handler.js'); ?>"></script>
    <script src="includes/js/notas/search.js?v=<?php echo filemtime('includes/js/notas/search.js'); ?>"></script>
    <script src="includes/js/notas/sort_notes.js?v=<?php echo filemtime('includes/js/notas/sort_notes.js'); ?>" defer></script>

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
            <button type="button" class="sort-button base-button" onclick="sortNotes(this);">
                <img src="resources/svg/sort-button.svg" alt="Ícone de Ordenar" class="rotate-icon180" width="24"
                    height="24">
            </button>

        </section>
        <!-- Inclui o script para mostrar as notas -->
        <?php include 'mostrar_notas.php'; ?>
    </main>

    <!-- Inclui o modal do arquivo nota_modal.php -->
    <?php include 'nota_modal.php'; ?>
</body>