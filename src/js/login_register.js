function change(){
    const botao_troca = document.getElementById('option');
    const esconder_email = document.getElementById('hide');
    const method = document.getElementById('method');
    const title = document.getElementById('p-title');

    if(botao_troca.classList.contains('register')){
        botao_troca.classList.remove('register');
        botao_troca.classList.add('login');
        esconder_email.classList.add('d-none');
        method.value = 'login';
        title.textContent = 'Login';
        botao_troca.textContent = 'Não possui conta? Cadastre-se agora!';
    }

    else{
        botao_troca.classList.remove('login');
        botao_troca.classList.add('register');
        esconder_email.classList.remove('d-none');
        method.value = 'register';
        title.textContent = 'Cadastrar-se';
        botao_troca.textContent = 'Já tem uma conta? Faça login!';
    }
}

function showPassword(event){
    event.preventDefault();

    const password = document.getElementById('password');
    const span_password = document.getElementById('showpassword');

    if(password.type === 'password'){
        password.type = 'text';
        span_password.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    }

    else{
        password.type = 'password';
        span_password.innerHTML = '<i class="fa-solid fa-eye"></i>';
    }
}

function passLength(){
    const p_error = document.getElementById('p-error');
    const password = document.getElementById('password').value

    if(password.length > 8){
        p_error.textContent = 'A senha deve ser menor que 8 dígitos!';
    }
    
    else{
        p_error.textContent = '';
    }
}