<?php require '../../config/conexao.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $sql = $conexao->prepare("DELETE FROM produtos WHERE id = :id");
    $sql->execute([':id' => $id]);
}
header("Location: read.php");
exit;
