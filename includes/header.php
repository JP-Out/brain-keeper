<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keeper de Notas</title>
    <link rel="stylesheet" href="includes/css/styles.css">
    <script>
        function handleFocus(event) {
            const note = event.target;
            if (note.innerHTML.trim() === '<p>Armazene seu passado...</p>') {
                note.innerHTML = '<h3>Título da Nota</h3><p></p>';
                note.querySelector('p').focus();
            }
        }
    </script>
</head>
