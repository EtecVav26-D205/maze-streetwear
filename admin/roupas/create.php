<?php

require '../../config/conexao.php';
require '../../includes/header.php';

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

<h2>Adicionar Produto</h2>

<form method="POST">

    <input
        type="text"
        name="nome"
        placeholder="Nome da roupa"
        required
    >

    <input
        type="text"
        name="categoria"
        placeholder="Categoria"
        required
    >

    <input
        type="number"
        name="preco"
        placeholder="Preço"
        step="0.01"
        required
    >

    <input
        type="number"
        name="estoque"
        placeholder="Estoque"
        min="0"
        required
    >

    <button type="submit">
        Salvar
    </button>

</form>

<?php require '../../includes/footer.php'; ?>
