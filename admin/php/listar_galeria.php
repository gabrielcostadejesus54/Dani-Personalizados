<?php
require 'conexao.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM galeria ORDER BY id DESC";
$result = $conn->query($sql);

$galeria = [];

while ($row = $result->fetch_assoc()) {
    $galeria[] = [
        "img" => "admin/" . $row['imagem']
    ];
}

echo json_encode($galeria);