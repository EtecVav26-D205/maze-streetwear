<?php

session_start();

$id = $_POST['id'] ?? null;
$quantidade = $_POST['quantidade'] ?? 1;

if ($id && isset($_SESSION['carrinho'][$id])) {

    if ($quantidade > 0) {

        $_SESSION['carrinho'][$id] = $quantidade;

    } else {

        unset($_SESSION['carrinho'][$id]);

    }

}

header("Location: carrinho.php");
exit;