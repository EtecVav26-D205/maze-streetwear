
<?php

require 'config/conexao.php';

$camisetas = $conexao->query(
    "SELECT * FROM produtos WHERE categoria = 'Camiseta'"
)->fetchAll(PDO::FETCH_ASSOC);

$moletons = $conexao->query(
    "SELECT * FROM produtos WHERE categoria = 'Moletom'"
)->fetchAll(PDO::FETCH_ASSOC);

$calcas = $conexao->query(
    "SELECT * FROM produtos WHERE categoria = 'Calça'"
)->fetchAll(PDO::FETCH_ASSOC);

$bones = $conexao->query(
    "SELECT * FROM produtos WHERE categoria = 'Boné'"
)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coleções - Maze Streetwear</title>

    <link rel="stylesheet" href="assets/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<?php include 'includes/header.php'; ?>



<section class="banner">

<img src="img/banner2.jpg" alt="Nova coleção">

<div class="banner-conteudo">

    <h1>Coleções</h1>

    <p>Confira nossas coleções</p>

</div>

</section>



<section class="categoria-produtos">

    <h2>CAMISETAS</h2>

    <div class="produtos">

        <?php foreach ($camisetas as $produto): ?>

            <div class="produto">
                <div class="fundo-produto">

                <img
                    src="img/<?= htmlspecialchars($produto['imagem']) ?>"
                    alt="<?= htmlspecialchars($produto['nome']) ?>"
                >

                <div class="produto-info">

                    <h3>
                        <?= htmlspecialchars($produto['nome']) ?>
                    </h3>

                    <p>
                        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                    </p>

                    <a
                        href="carrinho/add-carrinho.php?id=<?= $produto['id'] ?>"
                        class="btn-carrinho"
                    >
                        ADICIONAR AO CARRINHO
                    </a>

                </div>

            </div>
</div>
        <?php endforeach; ?>

    </div>

</section>




<section class="categoria-produtos">

    <h2>MOLETONS</h2>

    <div class="produtos">

        <?php foreach ($moletons as $produto): ?>

            <div class="produto">
            <div class="fundo-produto">
                <img
                    src="img/<?= htmlspecialchars($produto['imagem']) ?>"
                    alt="<?= htmlspecialchars($produto['nome']) ?>"
                >

                <div class="produto-info">

                    <h3>
                        <?= htmlspecialchars($produto['nome']) ?>
                    </h3>

                    <p>
                        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                    </p>

                    <a
                        href="carrinho/add-carrinho.php?id=<?= $produto['id'] ?>"
                        class="btn-carrinho"
                    >
                        ADICIONAR AO CARRINHO
                    </a>

                </div>
            </div>
            </div>

        <?php endforeach; ?>

    </div>

</section>




<section class="categoria-produtos">

    <h2>CALÇAS</h2>

    <div class="produtos">

        <?php foreach ($calcas as $produto): ?>

            <div class="produto">
            <div class="fundo-produto">
                <img
                    src="img/<?= htmlspecialchars($produto['imagem']) ?>"
                    alt="<?= htmlspecialchars($produto['nome']) ?>"
                >

                <div class="produto-info">

                    <h3>
                        <?= htmlspecialchars($produto['nome']) ?>
                    </h3>

                    <p>
                        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                    </p>

                    <a
                        href="carrinho/add-carrinho.php?id=<?= $produto['id'] ?>"
                        class="btn-carrinho"
                    >
                        ADICIONAR AO CARRINHO
                    </a>

                </div>

            </div>
            </div>
        <?php endforeach; ?>

    </div>

</section>




<section class="categoria-produtos">

    <h2>BONÉS</h2>

    <div class="produtos">

        <?php foreach ($bones as $produto): ?>

            <div class="produto">
            <div class="fundo-produto">
                <img
                    src="img/<?= htmlspecialchars($produto['imagem']) ?>"
                    alt="<?= htmlspecialchars($produto['nome']) ?>"
                >

                <div class="produto-info">

                    <h3>
                        <?= htmlspecialchars($produto['nome']) ?>
                    </h3>

                    <p>
                        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                    </p>

                    <a
                        href="carrinho/add-carrinho.php?id=<?= $produto['id'] ?>"
                        class="btn-carrinho"
                    >
                        ADICIONAR AO CARRINHO
                    </a>

                </div>

            </div>
            </div>
        <?php endforeach; ?>

    </div>

</section>


<?php include 'includes/footer.php'; ?>

</body>

</html>
