
<?php session_start();
$usuario_correto = "admin";
$senha_correta = "1234";
$erro = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    if ($usuario == $usuario_correto && $senha == $senha_correta) {
        $_SESSION['admin'] = true;
        header("Location: roupas/read.php");
        exit;
    } else {
        $erro = "Usuário ou senha incorretos.";
    }
} ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Maze Streetwear</title>

    <link rel="stylesheet" href="../assets/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="login-body">
    <div class="login-container">

        <div class="login-card">

            <h1>MAZE<br>STREETWEAR</h1>

            <p class="login-subtitle">
                PAINEL ADMINISTRATIVO
            </p>

            <?php if ($erro): ?>

                <div class="login-erro">
                    <?= $erro ?>
                </div>

            <?php endif; ?>

            <form method="POST">

                <div class="form-group">

                    <label>Usuário</label>

                    <input
                        type="text"
                        name="usuario"
                        placeholder="Digite seu usuário"
                        required>

                </div>

                <div class="form-group">

                    <label>Senha</label>

                    <input
                        type="password"
                        name="senha"
                        placeholder="Digite sua senha"
                        required>

                </div>

                <button type="submit" class="btn-login">
                    ENTRAR
                </button>

            </form>

            <a href="/maze-streetwear/index.php" class="voltar-loja">
                Voltar para a loja
            </a>

        </div>

    </div>

</body>

</html>
