document.addEventListener('DOMContentLoaded', function() {
    // Seleciona todos os campos de entrada e os botões de submit
    const loginInputs = document.querySelectorAll('.login-form .form-input');
    const cadastroInputs = document.querySelectorAll('.cadastro-form .form-input');
    const loginButton = document.getElementById('login_button');
    const cadastroButton = document.getElementById('cadastro_button');

    // Função para verificar se todos os campos estão preenchidos
    function checkFields(inputs, button) {
        const allFilled = Array.from(inputs).every(input => input.value.trim() !== '');
        // Adiciona ou remove classes dependendo do estado dos campos
        if (allFilled) {
            button.classList.remove('form-button-disabled');
            button.classList.add('form-button-active');
            button.disabled = false; // Habilita o botão
        } else {
            button.classList.remove('form-button-active');
            button.classList.add('form-button-disabled');
            button.disabled = true; // Desabilita o botão
        }
    }

    // Adiciona evento para cada campo de entrada
    loginInputs.forEach(input => input.addEventListener('input', () => checkFields(loginInputs, loginButton)));
    cadastroInputs.forEach(input => input.addEventListener('input', () => checkFields(cadastroInputs, cadastroButton)));
});