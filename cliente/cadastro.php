
<?php

session_start();

require '../config/conexao.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o email já existe
    $sql = $conexao->prepare(
        "SELECT * FROM clientes WHERE email = :email"
    );

    $sql->execute([
        ':email' => $email
    ]);

    $cliente = $sql->fetch(PDO::FETCH_ASSOC);

    if ($cliente) {

        $mensagem = "Este email já está cadastrado.";

    } else {

        // Criptografa a senha
        $senhaCriptografada = password_hash(
            $senha,
            PASSWORD_DEFAULT
        );

        // Cadastra o cliente
        $sql = $conexao->prepare(
            "INSERT INTO clientes (nome, email, senha)
             VALUES (:nome, :email, :senha)"
        );

        $sql->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaCriptografada
        ]);

        // Depois de cadastrar, volta para o login
        header(
            "Location: /maze-streetwear/cliente/login.php"
        );

        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Criar conta - Maze Streetwear</title>

    <link
        rel="stylesheet"
        href="/maze-streetwear/assets/style.css"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

</head>

<body>

<?php include '../includes/header.php'; ?>


<section class="login-area">

    <div class="login-box">

        <h1>CRIAR CONTA</h1>

        <p>
            Cadastre-se na Maze Streetwear
        </p>


        <?php if ($mensagem != ""): ?>

            <div class="mensagem-erro">

                <?= htmlspecialchars($mensagem) ?>

            </div>

        <?php endif; ?>


        <form method="POST">


            <div class="form-login">

                <label>Nome</label>

                <input
                    type="text"
                    name="nome"
                    placeholder="Digite seu nome"
                    required
                >

            </div>


            <div class="form-login">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Digite seu email"
                    required
                >

            </div>


            <div class="form-login">

                <label>Senha</label>

                <input
                    type="password"
                    name="senha"
                    placeholder="Digite sua senha"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn-login"
            >
                CRIAR CONTA
            </button>


        </form>


        <p class="login-link">

            Já possui uma conta?

            <a href="/maze-streetwear/cliente/login.php">
                Entrar
            </a>

        </p>


    </div>

</section>


<?php include '../includes/footer.php'; ?>

</body>

</html>


