<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<header class="header">

    <div class="logo">

        <a href="/maze-streetwear/index.php">

            <img
                src="/maze-streetwear/img/logo-maze-removebg-preview.png"
                alt="Logo da Maze Streetwear"
            >

        </a>

    </div>


    <nav class="menu">
<<<<<<< HEAD
=======
        <a href="/maze-streetwear/index.php">Início</a>
        <a href="/maze-streetwear/catalogo.php">Coleções</a>
        <a href="/maze-streetwear/admin/index.php">Admnin</a>
>>>>>>> dc19d5716f9a9c4ab469c36040207aef30203a26

        <a href="/maze-streetwear/index.php">
            Início
        </a>

        <a href="/maze-streetwear/catalogo.php">
            Coleções
        </a>


        <?php if (isset($_SESSION['cliente_id'])): ?>

            <a href="/maze-streetwear/index.php">

                👤 <?= htmlspecialchars($_SESSION['cliente_nome']) ?>

            </a>

            <a href="/maze-streetwear/cliente/logout.php">
                Sair
            </a>

        <?php else: ?>

            <a href="/maze-streetwear/cliente/login.php">
                👤 Login
            </a>

        <?php endif; ?>


        <a href="/maze-streetwear/admin/index.php">
            Admin
        </a>


        <a href="/maze-streetwear/carrinho/carrinho.php">
            🛒
        </a>

    </nav>

</header>