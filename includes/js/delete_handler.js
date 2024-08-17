document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.menu-item').forEach(item => {
        if (item.textContent.trim() === 'Excluir') {
            item.addEventListener('click', async function (event) {
                event.stopPropagation(); // Impede a propagação do clique para a nota
                
                const noteId = this.getAttribute('data-id');
                
                // Modal de confirmação pode ser uma opção melhor aqui
                if (confirm('Tem certeza de que deseja excluir esta nota?')) {
                    try {
                        const response = await fetch('excluir_nota.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                'id': noteId
                            })
                        });
                    
                        const status = response.status;
                        const data = await response.text();
                        console.log(`Status: ${status}`);
                        console.log('Resposta:', data);
                    
                        if (status === 200) {
                            // Nota excluída com sucesso
                            location.reload();
                        } else {
                            console.error('Erro ao excluir a nota:', data);
                        }
                    } catch (error) {
                        console.error('Erro ao excluir a nota:', error);
                    }
                    
                }
            });
        }
    });
});
