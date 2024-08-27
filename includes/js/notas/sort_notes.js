function sortNotes(button) {
    // Seleciona o ícone dentro do botão
    const icon = button.querySelector('.rotate-icon180');

    // Alterna a rotação do ícone
    if (icon.classList.contains('rotated-180')) {
        icon.classList.remove('rotated-180');
    } else {
        icon.classList.add('rotated-180');
    }

    // Aqui você pode colocar a lógica de ordenação das notas

    setTimeout(() => {
        alert('~(>_<。)＼\nParece que você, quer testar uma função que não deu tempo de implementar...');
    }, 500); // Tempo em milissegundos
}
