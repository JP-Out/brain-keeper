<body>
    <main>
        <!-- Barra de pesquisa -->
        <section class="search-section">
            <input type="search" class="search" placeholder="Pesquisar...">
        </section>
        <hr> <!-- Divisor -->
        <section class="note-editor">
            <!-- Input do tipo button existente -->
            <input type="button" id="more" class="note" value="Armazene seu passado..." data-toggle="modal"
                data-target="#newNoteModal">

            <!-- Botão com ícone SVG para ordenação -->
            <button type="button" class="sort-button base-button" onclick="toggleRotate(); sortNotes();">
                <img src="resources/svg/sort-button.svg" alt="Ícone de Ordenar" id="rotate-icon" width="24" height="24">
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
    <script src="includes/js/sort_notes.js" defer></script>
    <script src="includes/js/rotate_icons.js" defer></script>
</body>

</html>