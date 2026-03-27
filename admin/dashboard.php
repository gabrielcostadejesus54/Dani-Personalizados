<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="css/config.css">
        <link rel="stylesheet" href="css/dashboard.css">
    </head>
    <body>
        <header>
            <div class="container">
                <h1>CMS Devsime</h1>
                <a href="php/logout.php">Sair</a>
            </div>
        </header>

        <main class="produtos" id="produtos">
            <div class="container">
                <div class="cabecalho">
                    <h2>Produtos</h2>
                    <button id="btn-novo-produto" onclick="abrirModal()">+ Novo Produto</button>
                </div>
                <div class="search-container">
                    <span class="icon">🔍</span>
                    <input type="text" placeholder="Buscar produtos..." class="search">
                </div>
                <div class="area-produtos">
                </div>
            </div>
        </main>

        <div class="modal">
            <div class="modal-content">
                <div class="topo">
                    <p>Novo Produto</p>
                    <span class="close">&times;</span>
                </div>
                <form id="produto-form">
                    <div class="input-group">
                        <label for="produto-imagem">Imagem do Produto</label>
                        <input type="file" id="produto-imagem" name="produto-imagem" required>
                    </div>
                    <div class="input-group">
                        <label for="produto-nome">Nome do Produto</label>
                        <input type="text" id="produto-nome" name="produto-nome" required>
                    </div>
                    <div class="input-group">
                        <label for="produto-categoria">Categoria</label>
                        <select id="produto-categoria" name="produto-categoria" required>
                            <option value="" selected disabled>Selecione uma categoria</option>
                            <option value="Bebidas">Bebidas</option>
                            <option value="Vestuário">Vestuário</option>
                            <option value="Decoração">Decoração</option>
                            <option value="Têxtil & Acessórios">Têxtil & Acessórios</option>
                        </select>
                    </div>


                    <button type="submit">Adicionar Produto</button>
                </form>
            </div>
        </div>

        <script src="js/script.js"></script>
    </body>
</html>