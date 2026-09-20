<?php

session_start();

require '../config/conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: ../colecoes.php");
    exit;
}


$sql = $conexao->prepare(
    "SELECT * FROM produtos WHERE id = :id"
);

$sql->execute([
    ':id' => $id
]);

$produto = $sql->fetch(PDO::FETCH_ASSOC);


if (!$produto) {
    header("Location: ../colecoes.php");
    exit;
}


if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}


if (isset($_SESSION['carrinho'][$id])) {

    $_SESSION['carrinho'][$id]++;

} else {

    $_SESSION['carrinho'][$id] = 1;

}

header("Location: carrinho.php");
exit;