function trocar(){
    botao_troca = document.getElementById('option');
    esconder_tel = document.getElementById('hide');
    method = document.getElementById('method');
    title = document.getElementById('p-title');

    if(botao_troca.classList.contains('cadastro')){
        botao_troca.classList.remove('cadastro');
        botao_troca.classList.add('login');
        esconder_tel.classList.add('d-none');
        method.value = 'login';
        title.textContent = 'Login';
        botao_troca.textContent = 'Não possui conta? Cadastre-se agora!';
    }

    else{
        botao_troca.classList.remove('login');
        botao_troca.classList.add('cadastro');
        esconder_tel.classList.remove('d-none');
        method.value = 'cadastro';
        title.textContent = 'Cadastrar-se';
        botao_troca.textContent = 'Já tem uma conta? Faça login!';
    }
}

function showPassword(event){
    event.preventDefault();

    password = document.getElementById('password');
    span_password = document.getElementById('showpassword');

    if(password.type === 'password'){
        password.type = 'text';
        span_password.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    }

    else{
        password.type = 'password';
        span_password.innerHTML = '<i class="fa-solid fa-eye"></i>';
    }
}