<?php
require 'conexao.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$result = $conn->query($sql);

$produtos = [];

while ($row = $result->fetch_assoc()) {
    $produtos[] = [
        "img" => "admin/" . $row['imagem'], // AJUSTE IMPORTANTE
        "categoria" => $row['categoria'],
        "nome" => $row['nome']
    ];
}

echo json_encode($produtos);