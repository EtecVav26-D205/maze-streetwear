<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Início</title>

    <link rel="stylesheet" href="assets/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include 'includes/header.php'; ?>

    <section class="banner">

        <img src="img/banner.jpg" alt="Nova coleção">

        <div class="banner-conteudo">

            <h1>Maze Streetwear</h1>

            <p>Seu caminho, seu estilo</p>

            <a href="#estilos" class="btn-banner">
                CONHEÇA NOSSAS COLEÇÕES<br>
                EM DESTAQUE
            </a>

        </div>

    </section>


    <section class="destaques" id="estilos">

        <div class="titulo-secao">

            <h2>DESTAQUES</h2>

            <p>Confira algumas de nossas coleções</p>

        </div>


        <div class="colecoes">

    <a href="#" class="colecao">
        <img src="img/camisa-os1.jpg" alt="Coleção Oversized">

        <div class="colecao-info">
            <h3>OVERSIZED</h3>
            <span>VER COLEÇÃO →</span>
        </div>
    </a>


    <a href="#" class="colecao">
        <img src="img/moletom-os1.jpg" alt="Coleção Moletom">

        <div class="colecao-info">
            <h3>MOLETOM</h3>
            <span>VER COLEÇÃO →</span>
        </div>
    </a>


    <a href="#" class="colecao">
        <img src="img/bone.jpg" alt="Coleção Bonés">

        <div class="colecao-info">
            <h3>BONÉS</h3>
            <span>VER COLEÇÃO →</span>
        </div>
    </a>


    <a href="#" class="colecao">
        <img src="img/calca.jpg" alt="Coleção Calças">

        <div class="colecao-info">
            <h3>CALÇAS</h3>
            <span>VER COLEÇÃO →</span>
        </div>
    </a>

</div>

        </div>

    </section>
<?php include 'includes/footer.php'; ?>

</body>
</html>