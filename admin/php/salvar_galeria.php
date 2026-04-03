<?php
require 'protecao.php';
require 'conexao.php';

$imagem = $_FILES['imagem'];

// valida upload
if ($imagem['error'] !== 0) {
    die("Erro no upload");
}

// gerar nome único
$ext = pathinfo($imagem['name'], PATHINFO_EXTENSION);
$nomeImagem = uniqid() . "." . $ext;

// caminho físico
$caminho = "../uploads/" . $nomeImagem;

// mover arquivo
if (!move_uploaded_file($imagem['tmp_name'], $caminho)) {
    die("Erro ao salvar imagem");
}

// caminho banco
$caminhoBanco = "uploads/" . $nomeImagem;

// salvar no banco
$sql = "INSERT INTO galeria (imagem) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $caminhoBanco);
$stmt->execute();

header("Location: ../dashboard.php");
exit;