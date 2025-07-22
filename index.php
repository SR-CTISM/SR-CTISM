<?php
    @session_start();

    #Se a sessão exister e não estiver vazia, direciona o usuário para a página central
    if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
        header('location:/login_register.php');
        exit();
    }
?>

<!-- Código começa aqui -->

<?php require_once(__DIR__ . '/shared/header.php'); ?>
    
    <link rel="stylesheet" href="/src/css/index.css">
</head>

<body>
    <header>

    </header>

    <main>
        
    </main>

    <footer>

    </footer>
</body>
<!-- Javascript da página -->
<script src="/src/js/index.js"></script>

<!-- Código termina aqui -->

<?php require_once(__DIR__ . '/shared/footer.php'); ?>