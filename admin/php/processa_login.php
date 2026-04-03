<?php
session_start();
require 'conexao.php';

$usuario = $_POST['usuario'] ?? '';
$senha   = $_POST['senha'] ?? '';

// limpa erros antigos
unset($_SESSION['erro_usuario'], $_SESSION['erro_senha']);

// validação básica
if (empty($usuario) || empty($senha)) {
    if (empty($usuario)) {
        $_SESSION['erro_usuario'] = "Informe o usuário!";
    }
    if (empty($senha)) {
        $_SESSION['erro_senha'] = "Informe a senha!";
    }

    header("Location: ../login.php");
    exit;
}

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($senha, $user['senha'])) {

        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario'] = $user['usuario'];

        header("Location: ../dashboard.php");
        exit;

    } else {
        $_SESSION['erro_senha'] = "Senha incorreta!";
        header("Location: ../login.php");
        exit;
    }

} else {
    $_SESSION['erro_usuario'] = "Usuário não encontrado!";
    header("Location: ../login.php");
    exit;
}