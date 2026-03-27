<?php

$conn = new mysqli("localhost", "root", "", "cms");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

