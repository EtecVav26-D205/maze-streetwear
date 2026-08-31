<?php

require '../../config/conexao.php';
require '../header-adm.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = $conexao->prepare(
        "INSERT INTO produtos
        (nome, categoria, preco, estoque)
        VALUES
        (:nome, :categoria, :preco, :estoque)"
    );

    $sql->execute([
        ':nome' => $nome,
        ':categoria' => $categoria,
        ':preco' => $preco,
        ':estoque' => $estoque
    ]);

    echo "Produto cadastrado com sucesso!";
}
?>

<div class="admin-card">

    <h1>Adicionar Produto</h1>

    <p class="admin-subtitle">
        Cadastre uma nova peça da Maze Streetwear.
    </p>

    <form method="POST" class="produto-form">

        <div class="form-group">
            <label>Nome do produto</label>
            <input
                type="text"
                name="nome"
                placeholder="Ex: Camiseta Oversized Maze"
                required
            >
        </div>

        <div class="form-group">
            <label>Categoria</label>

            <select name="categoria" required>
                <option value="">Selecione uma categoria</option>
                <option value="Camiseta">Camiseta</option>
                <option value="Moletom">Moletom</option>
                <option value="Calça">Calça</option>
                <option value="Boné">Boné</option>
            </select>

        </div>

        <div class="form-group">
            <label>Preço</label>

            <input
                type="number"
                name="preco"
                placeholder="89.90"
                step="0.01"
                min="0"
                required
            >
        </div>

        <div class="form-group">
            <label>Estoque</label>

            <input
                type="number"
                name="estoque"
                placeholder="10"
                min="0"
                required
            >
        </div>

        <button type="submit" class="btn-salvar">
            SALVAR PRODUTO
        </button>

    </form>

    <a href="read.php" class="voltar">
        Voltar para produtos
    </a>

</div>
</div> <?php require '../../includes/footer.php'; ?>
