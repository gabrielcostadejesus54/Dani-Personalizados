<?php
require 'php/protecao.php';
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

        <div class="nav">
            <div class="container">
                <a href="#" data-pagina="produtos">Produtos</a>
                <a href="#" data-pagina="galeria">Galeria</a>
            </div>
        </div>

        <main>
            <div id="galeria" class="container pagina">
                <div class="cabecalho">
                    <h2>Galeria</h2>
                     <form action="php/salvar_galeria.php" method="POST" enctype="multipart/form-data" class="form-galeria">
    
                    <label for="imagem" class="upload-box">
                        <span id="texto-upload">📸 Clique para adicionar imagem</span>
                        <input type="file" id="imagem" name="imagem" accept="image/*" required>
                    </label>

                    <!-- PREVIEW -->
                    <div class="preview" id="preview"></div>

                    <button type="submit" class="btn-enviar">Enviar</button>

                </form>
                </div>
                <div class="area-galeria">
                    <?php
                    require 'php/conexao.php';

                    $sql = "SELECT * FROM galeria ORDER BY id DESC";
                    $result = $conn->query($sql);

                    while($img = $result->fetch_assoc()):
                    ?>

                        <div class="img" style="background-image: url('<?= $img['imagem'] ?>');"></div>

                    <?php endwhile; ?>
                </div>
            </div>
        </main>

        <main class="produtos pagina ativa" id="produtos">
            <div class="container">
                <div class="cabecalho">
                    <h2>Produtos</h2>
                    <button id="btn-novo-produto" onclick="abrirModal()">+ Novo Produto</button>
                </div>
                <div class="search-container">
                    <span class="icon">🔍</span>
                    <input type="search" placeholder="Buscar produtos..." class="search" id="search">
                </div>
                <div class="area-produtos catalago-produtos">

                <?php
                    require 'php/conexao.php';

                    $sql = "SELECT * FROM produtos ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0):
                        while($produto = $result->fetch_assoc()):
                    ?>

                        <div class="produto">
                            <div class="img" style="background-image: url('<?= $produto['imagem'] ?>');"></div>

                            <div class="descricao">
                                <span><?= $produto['categoria'] ?></span>
                                <h4 class="nome-produto"><?= $produto['nome'] ?></h4>

                                <form action="php/excluir_produto.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                                    <button type="submit">Excluir</button>
                                </form>
                            </div>
                        </div>

                        

                            <?php
                                endwhile;
                            else:
                                echo "<p>Nenhum produto cadastrado.</p>";
                            endif;
                        ?>
                </div>
            </div>
        </main>

        <div class="modal">
            <div class="modal-content">
                <div class="topo">
                    <p>Novo Produto</p>
                    <span class="close">&times;</span>
                </div>
                <form action="php/salvar_produto.php" method="POST" id="produto-form" enctype="multipart/form-data">
                    <div class="input-group">
                        <label for="produto-imagem">Imagem do Produto</label>
                        <input type="file" accept="image/*" id="produto-imagem" name="produto-imagem" required>
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