<?php

session_start();

require '../config/conexao.php';

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$total = 0;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Carrinho - Maze Streetwear</title>

    <link rel="stylesheet" href="../assets/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php include '../includes/header.php'; ?>


<section class="carrinho">

    <div class="titulo-secao">

        <h2>MEU CARRINHO</h2>

        <p>Confira os produtos escolhidos</p>

    </div>


    <?php if (empty($_SESSION['carrinho'])): ?>

        <div class="carrinho-vazio">

            <h3>Seu carrinho está vazio.</h3>

            <p>Que tal dar uma olhada nas nossas coleções?</p>

            <a href="../colecoes.php" class="btn-banner">
                VER COLEÇÕES
            </a>

        </div>


    <?php else: ?>


        <div class="itens-carrinho">

            <?php foreach ($_SESSION['carrinho'] as $id => $quantidade): ?>

                <?php

                $sql = $conexao->prepare(
                    "SELECT * FROM produtos WHERE id = :id"
                );

                $sql->execute([
                    ':id' => $id
                ]);

                $produto = $sql->fetch(PDO::FETCH_ASSOC);

                if (!$produto) {
                    continue;
                }

                $subtotal = $produto['preco'] * $quantidade;

                $total += $subtotal;

                ?>

                <div class="item-carrinho">

                    <img 
                        src="../img/<?= htmlspecialchars($produto['imagem']) ?>"
                        alt="<?= htmlspecialchars($produto['nome']) ?>"
                    >

                    <div class="item-info">

                        <h3>
                            <?= htmlspecialchars($produto['nome']) ?>
                        </h3>

                        <p>
                            R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                        </p>


                        <form action="att-carrinho.php" method="POST">

                            <input
                                type="hidden"
                                name="id"
                                value="<?= $produto['id'] ?>"
                            >

                            <label>Quantidade:</label>

                            <input
                                type="number"
                                name="quantidade"
                                value="<?= $quantidade ?>"
                                min="1"
                            >

                            <button type="submit">
                                ATUALIZAR
                            </button>

                        </form>


                        <a 
                            href="remove-carrinho.php?id=<?= $produto['id'] ?>"
                            class="remover-produto"
                        >
                            REMOVER
                        </a>

                    </div>


                    <div class="item-subtotal">

                        <strong>
                            R$ <?= number_format($subtotal, 2, ',', '.') ?>
                        </strong>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>


        <div class="total-carrinho">

            <h2>
                TOTAL:
                R$ <?= number_format($total, 2, ',', '.') ?>
            </h2>

            <button class="btn-finalizar">
                FINALIZAR COMPRA
            </button>

        </div>


    <?php endif; ?>

</section>


<?php include '../includes/footer.php'; ?>

</body>

</html>
