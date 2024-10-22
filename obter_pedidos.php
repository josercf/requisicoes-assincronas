<?php
// obter_pedidos.php

header('Content-Type: application/json');

// Configurações do banco de dados
require 'conexao.php';

// Cria a conexão com o banco de dados
$conn = new mysqli($host, $user, $pass, $db);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die(json_encode(['erro' => 'Erro de conexão: ' . $conn->connect_error]));
}

// Consulta os pedidos pendentes
$sql = "SELECT * FROM pedidos WHERE status_pedido = 'Pendente' ORDER BY data_criacao DESC";
$result = $conn->query($sql);

$pedidos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pedidos[] = $row;
    }
}

// Fecha a conexão
$conn->close();

echo json_encode($pedidos);
?>