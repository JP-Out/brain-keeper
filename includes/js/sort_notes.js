function sortNotes() {
    const notasContainer = document.querySelector('.notas-container');
    const notas = Array.from(notasContainer.querySelectorAll('.nota'));

    // Debug: Verificação das datas antes da ordenação
    console.log('Data Original:');
    notas.forEach(nota => {
        const dataTexto = nota.querySelector('small').textContent.trim();
        console.log('  -', dataTexto);
    });

    // Ordena as notas pela data de criação (mais recente primeiro)
    notas.sort((a, b) => {
        const dataA = new Date(a.querySelector('small').textContent.trim().replace(' ', 'T'));
        const dataB = new Date(b.querySelector('small').textContent.trim().replace(' ', 'T'));

        console.log(`Comparando: ${dataA} vs ${dataB}`);
        console.log('Resultado da comparação:', dataB - dataA);

        return dataB - dataA;  // Mais recente primeiro
    });

    console.log('Notas após a ordenação:', notas);

    // Limpa o container
    notasContainer.innerHTML = '';

    // Reanexa as notas na nova ordem, clonando-as
    notas.forEach((nota, index) => {
        const clone = nota.cloneNode(true);
        console.log(`Reanexando nota ${index + 1}: ${clone.querySelector('small').textContent.trim()}`);
        notasContainer.appendChild(clone);
    });

    // Atualiza o layout do Masonry
    var msnry = Masonry.data(notasContainer); // Obtém a instância do Masonry
    msnry.reloadItems(); // Recarrega os itens
    msnry.layout(); // Recalcula o layout
}
