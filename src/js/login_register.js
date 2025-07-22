//Função para alternar entre login e cadastro
function change(){
    const botao_troca = document.getElementById('option');
    const esconder_email = document.getElementById('hide');
    const method = document.getElementById('method');
    const title = document.getElementById('p-title');
    const botao = document.getElementById('button-submit');

    //Verifica se o botão está no modo de cadastro
    if(botao_troca.classList.contains('register')){
        //Alterna para modo login
        botao_troca.classList.remove('register');
        botao_troca.classList.add('login');
        esconder_email.classList.add('d-none');
        method.value = 'login';
        title.textContent = 'Login';
        botao.textContent = 'Logar';
        botao_troca.textContent = 'Não possui conta? Cadastre-se agora!';
    }

    else{
        //Alterna para modo cadastro com o campo 'email'
        botao_troca.classList.remove('login');
        botao_troca.classList.add('register');
        esconder_email.classList.remove('d-none');
        method.value = 'register';
        title.textContent = 'Cadastrar-se';
        botao.textContent = 'Cadastrar-se';
        botao_troca.textContent = 'Já tem uma conta? Faça login!';
    }
}

//Função para mostrar ou esconder a senha
function showPassword(event){
    event.preventDefault(); //Impede que o botão envie o formulário

    const password = document.getElementById('password');
    const span_password = document.getElementById('showpassword');

    //Alterna entre mostrar e ocultar a senha
    if(password.type === 'password'){
        password.type = 'text'; // Mostra a senha
        span_password.innerHTML = '<i class="fa-solid fa-eye-slash"></i>'; //Ícone de olho cortado
    }
    else{
        password.type = 'password'; // Oculta a senha
        span_password.innerHTML = '<i class="fa-solid fa-eye"></i>'; //Ícone de olho
    }
}

//Função para validar o comprimento da senha
function passLength(){
    const p_error = document.getElementById('p-error');
    const password = document.getElementById('password').value;

    //Se a senha tiver mais de 8 caracteres, exibe erro
    if(password.length > 8){
        p_error.textContent = 'A senha deve ser menor que 8 dígitos!';
    } 
    else{
        p_error.textContent = ''; //Remove qualquer mensagem de erro
    }
}

//Adiciona um listener ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    //Adiciona verificação ao tentar enviar o formulário
    form.addEventListener('submit', (e) => {
        const password = document.getElementById('password').value;

        //Bloqueia envio se a senha for maior que 8 caracteres
        if(password.length > 8){
            e.preventDefault(); //Cancela envio
            const p_error = document.getElementById('p-error');
            p_error.textContent = 'A senha deve ser menor que 8 dígitos!';
            document.getElementById('password').focus(); //Coloca o foco no campo de senha
        }
    });
});
