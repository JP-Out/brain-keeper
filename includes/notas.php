<body>
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
</body>