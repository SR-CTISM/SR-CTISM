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
                    <div class="email" id="hide">
                        <div class="custom-tooltip">
                            <p>Seu Email</p>
                        </div>
                        <input type="email" name="email-input" id="email-input" placeholder="Email">
                    </div>

                    <!-- Visível em qualquer modo -->
                    <div class="password">
                        <div class="custom-tooltip">
                            <p>Dica: crie uma senha forte!</p>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Senha" oninput="passLength()">
                        <button onclick="showPassword(event)" id="showpassword" class="password-span"><i class="fa-solid fa-eye"></i></button>
                        <!-- Erro da senha -->
                        <p id="p-error"></p>
                    </div>

                    <!-- Usado para falar para o php qual opção o usuário usou -->
                    <input type="hidden" name="method" id="method">
                
                    <div class="buttons">
                        <button type="submit" id="button">Cadastrar-se</button>
                    </div>

                    <div class="error">
                        <?php
                            if(isset($_REQUEST['error'])){
                                if($_REQUEST['error'] === 'empty'){
                                    echo '<p>Erro! Todos os campos devem ser preenchidos!</p>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </form>

            <div class="options">
                <button onclick="change()" id="option" class="register">Já tem uma conta? Faça login!</button>
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