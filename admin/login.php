<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS Devsime</title>
        <link rel="stylesheet" href="css/config.css">
        <link rel="stylesheet" href="css/login.css">
    </head> 
    <body>
        <main class="login">
            <img src="img/logo-devsime.jpg" alt="Logo Devsime" class="logo-devsime">
            <h2>CMS Devsime</h2>
            <p>Faça login para acessar o painel administrativo.</p>
            <form action="php/processa_login.php" method="post" id="loginForm">
                <div class="input-group">
                    <label for="usuario">Usuário:</label>
                    <input type="text" id="usuario" name="usuario" required>
                    <?php if (isset($_SESSION['erro_usuario'])): ?>
                        <p style="color:red; margin:5px 0;">
                            <?php 
                            echo $_SESSION['erro_usuario']; 
                            unset($_SESSION['erro_usuario']);
                            ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="input-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                    <?php if (isset($_SESSION['erro_senha'])): ?>
                        <p style="color:red; margin:5px 0;">
                            <?php 
                            echo $_SESSION['erro_senha']; 
                            unset($_SESSION['erro_senha']);
                            ?>
                        </p>
                    <?php endif; ?>
                </div>
                <button type="submit">Entrar</button>
            </form>
        </main>
    </body>
</html>