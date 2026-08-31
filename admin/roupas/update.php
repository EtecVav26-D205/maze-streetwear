<?php require '../../config/conexao.php';
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: read.php");
    exit;
}
$sql = $conexao->prepare("SELECT * FROM produtos WHERE id = :id");
$sql->execute([':id' => $id]);
$produto = $sql->fetch(PDO::FETCH_ASSOC);
if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $sql = $conexao->prepare("UPDATE produtos SET nome = :nome, categoria = :categoria, preco = :preco, estoque = :estoque WHERE id = :id");
    $sql->execute([':nome' => $nome, ':categoria' => $categoria, ':preco' => $preco, ':estoque' => $estoque, ':id' => $id]);
    header("Location: read.php");
    exit;
}
require '../../includes/header.php'; ?> <div class="admin-container">
    <div class="admin-card">

        <h1>Editar Produto</h1>

        <p class="admin-subtitle">
            Altere as informações do produto.
        </p>

        <form method="POST" class="produto-form">

            <div class="form-group">

                <label>Nome do produto</label>

                <input
                    type="text"
                    name="nome"
                    value="<?= htmlspecialchars($produto['nome']) ?>"
                    required>

            </div>

            <div class="form-group">

                <label>Categoria</label>

                <select name="categoria" required>

                    <option value="Camiseta" <?= $produto['categoria'] == 'Camiseta' ? 'selected' : '' ?>>
                        Camiseta
                    </option>

                    <option value="Moletom" <?= $produto['categoria'] == 'Moletom' ? 'selected' : '' ?>>
                        Moletom
                    </option>

                    <option value="Calça" <?= $produto['categoria'] == 'Calça' ? 'selected' : '' ?>>
                        Calça
                    </option>

                    <option value="Boné" <?= $produto['categoria'] == 'Boné' ? 'selected' : '' ?>>
                        Boné
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Preço</label>

                <input
                    type="number"
                    name="preco"
                    value="<?= $produto['preco'] ?>"
                    step="0.01"
                    min="0"
                    required>

            </div>

            <div class="form-group">

                <label>Estoque</label>

                <input
                    type="number"
                    name="estoque"
                    value="<?= $produto['estoque'] ?>"
                    min="0"
                    required>

            </div>

            <button type="submit" class="btn-salvar">
                SALVAR ALTERAÇÕES
            </button>

        </form>

        <a href="read.php" class="voltar">
            ← Voltar para produtos
        </a>

    </div>

</div> <?php require '../../includes/footer.php'; ?>
