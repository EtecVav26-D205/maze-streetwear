<?php require '../../config/conexao.php';
require '../header-adm.php';
$sql = $conexao->query("SELECT * FROM produtos ORDER BY id DESC");
$produtos = $sql->fetchAll(PDO::FETCH_ASSOC); ?> <div class="admin-container">
    <div class="produtos-topo">

        <div>
            <h1>Produtos</h1>

            <p class="admin-subtitle">
                Gerencie os produtos da Maze Streetwear.
            </p>
        </div>

        <a href="create.php" class="btn-adicionar">
            + ADICIONAR PRODUTO
        </a>

    </div>


    <?php if (count($produtos) > 0): ?>

        <div class="tabela-container">

            <table class="tabela-produtos">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($produtos as $produto): ?>

                        <tr>

                            <td>
                                <?= $produto['id'] ?>
                            </td>

                            <td class="nome-produto">
                                <?= htmlspecialchars($produto['nome']) ?>
                            </td>

                            <td>
                                <span class="categoria">
                                    <?= htmlspecialchars($produto['categoria']) ?>
                                </span>
                            </td>

                            <td>
                                R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                            </td>

                            <td>

                                <?php if ($produto['estoque'] > 0): ?>

                                    <span class="estoque disponivel">
                                        <?= $produto['estoque'] ?> unidades
                                    </span>

                                <?php else: ?>

                                    <span class="estoque esgotado">
                                        Esgotado
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td class="acoes">

                                <a
                                    href="update.php?id=<?= $produto['id'] ?>"
                                    class="btn-editar">
                                    EDITAR
                                </a>

                                <a
                                    href="delete.php?id=<?= $produto['id'] ?>"
                                    class="btn-excluir"
                                    onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                    EXCLUIR
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php else: ?>

        <div class="sem-produtos">

            <h2>Nenhum produto cadastrado</h2>

            <p>
                Comece adicionando o primeiro produto da loja.
            </p>

            <a href="create.php" class="btn-adicionar">
                ADICIONAR PRODUTO
            </a>

        </div>

    <?php endif; ?>

</div> <?php require '../../includes/footer.php'; ?>
