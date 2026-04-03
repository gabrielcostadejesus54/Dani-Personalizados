<?php

require 'protecao.php';
require 'conexao.php';

$id = $_POST['id'] ?? null;

if (!$id) {
    die("ID inválido");
}

// buscar imagem antes de excluir
$sql = "SELECT imagem FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $produto = $result->fetch_assoc();

    // caminho físico da imagem
    $caminhoImagem = "../" . $produto['imagem'];

    // apagar imagem do servidor
    if (file_exists($caminhoImagem)) {
        unlink($caminhoImagem);
    }

    // excluir do banco
    $sqlDelete = "DELETE FROM produtos WHERE id = ?";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param("i", $id);
    $stmtDelete->execute();

    $_SESSION['mensagem_sucesso'] = "Produto excluído com sucesso!";
} else {
    $_SESSION['mensagem_erro'] = "Produto não encontrado!";
}

header("Location: ../dashboard.php");
exit;