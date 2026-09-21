
<?php

session_start();

require '../config/conexao.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $sql = $conexao->prepare(
        "SELECT * FROM clientes WHERE email = :email"
    );

    $sql->execute([
        ':email' => $email
    ]);

    $cliente = $sql->fetch(PDO::FETCH_ASSOC);


    if ($cliente && password_verify($senha, $cliente['senha'])) {

        $_SESSION['cliente_id'] = $cliente['id'];

        $_SESSION['cliente_nome'] = $cliente['nome'];

        $_SESSION['cliente_email'] = $cliente['email'];


        header("Location: /maze-streetwear/index.php");

        exit;

    } else {

        $mensagem = "Email ou senha incorretos.";

    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Maze Streetwear</title>

    <link rel="stylesheet" href="/maze-streetwear/assets/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

</head>

<body>

<?php include '../includes/header.php'; ?>


<section class="login-area">

    <div class="login-box">

        <h1>LOGIN</h1>

        <p>Entre na sua conta Maze Streetwear</p>


        <?php if ($mensagem): ?>

            <div class="mensagem-erro">
                <?= htmlspecialchars($mensagem) ?>
            </div>

        <?php endif; ?>


        <form method="POST">

            <div class="form-login">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    required
                >

            </div>


            <div class="form-login">

                <label>Senha</label>

                <input
                    type="password"
                    name="senha"
                    required
                >

            </div>


            <button type="submit" class="btn-login">
                ENTRAR
            </button>

        </form>


        <p class="login-link">

            Ainda não possui uma conta?

            <a href="cadastro.php">
                Criar conta
            </a>

        </p>

    </div>

</section>


<?php include '../includes/footer.php'; ?>

</body>

</html>
```
