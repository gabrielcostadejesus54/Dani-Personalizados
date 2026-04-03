<?php

error_reporting(E_ALL);
ini_set('display_errors', 1); //temporário

define('ACESSO_PERMITIDO', true);
require 'protecao.php';
require 'conexao.php';

$nome = $_POST['produto-nome'];
$categoria = $_POST['produto-categoria'];
$imagem = $_FILES['produto-imagem'];

// valida se veio arquivo
if ($imagem['error'] !== 0) {
    die("Erro no upload da imagem");
}

// tipos permitidos
$tiposPermitidos = ['image/jpeg', 'image/png', 'image/jpg'];

if (!in_array($imagem['type'], $tiposPermitidos)) {
    die("Formato de imagem inválido");
}

// gera nome único
$extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
$nomeImagem = uniqid() . "." . $extensao;

// caminho físico
$caminho = "../uploads/" . $nomeImagem;

// move imagem
if (!move_uploaded_file($imagem['tmp_name'], $caminho)) {
    die("Erro ao salvar imagem");
}

// caminho para o banco
$caminhoBanco = "uploads/" . $nomeImagem;

// salva no banco
$sql = "INSERT INTO produtos (nome, categoria, imagem) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $categoria, $caminhoBanco);
if ($stmt->execute()) {
    header("Location: ../dashboard.php");
} else {
    echo "Erro ao salvar: " . $stmt->error;
}
exit;

header("Location: ../dashboard.php");
exit;