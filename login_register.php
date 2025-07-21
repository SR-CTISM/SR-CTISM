<?php require_once(__DIR__ . '/shared/header.php'); ?>

    <link rel="stylesheet" href="/src/css/login_register.css">
</head>

<!-- Code starts here -->

<?php
    #Se a sessão exister e não estiver vazia, direciona o usuário para a página central
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        require_once(__DIR__ . '/index.php');
    }
?>

<body>
    <!-- Header -->
    <header>

    </header>

    <!-- Main -->
    <main>
        <!-- Div do formulário -->
        <div class="form">
            <form action="/src/controller/login_register_controller.php" method="POST">
                <div class="title" id="title">
                    <p id="p-title">Cadastrar-se</p>
                </div>

                <div class="login-register">
                    <!-- Visível em qualquer modo -->
                    <div class="registration">
                        <div class="custom-tooltip">
                            <p>Matrícula do CTISM, que é dada quando o aluno é aceito na instituição.</p>
                        </div>
                        <input type="text" name="registration-input" id="registration-input" placeholder="Matrícula">
                    </div>

                    <!-- Visível somente no modo cadastro -->
                    <div class="tel" id="hide">
                        <div class="custom-tooltip">
                            <p>Somente formatos brasileiros aceitos. Ex: (55) 12345-6789</p>
                        </div>
                        <input type="tel" name="tel-input" id="tel-input" placeholder="Telefone">
                    </div>

                    <!-- Visível em qualquer modo -->
                    <div class="password">
                        <div class="custom-tooltip">
                            <p>Dica: crie uma senha forte!</p>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Senha">
                        <button onclick="showPassword(event)" id="showpassword" class="password-span"><i class="fa-solid fa-eye"></i></button>
                    </div>

                    <!-- Usado para falar para o php qual opção o usuário usou -->
                    <input type="hidden" name="method" id="method">
                
                    <div class="buttons">
                        <a href="/src/controller/login_register_controller.php" id="button">Cadastrar-se</a>
                    </div>

                </div>
            </form>

            <div class="options">
                <button onclick="trocar()" id="option" class="cadastro">Já tem uma conta? Faça login!</button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>

    </footer>
</body>
<!-- Javascript da página -->
<script src="/src/js/login_register.js"></script>

<!-- Code ends here -->

<?php require_once(__DIR__ . '/shared/footer.php'); ?>