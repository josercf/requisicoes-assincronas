<?php
// criar_pedido.php

// Configurações do banco de dados
require 'conexao.php';
// Cria a conexão com o banco de dados
$conn = new mysqli($host, $user, $pass, $db);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $tipo_comida = $_POST['tipo_comida'];
    $bebida = $_POST['bebida'];
    $doce = $_POST['doce'];
    $ip_cliente = $_SERVER['REMOTE_ADDR'];
    $data_criacao = date('Y-m-d H:i:s');

    // Prepara a declaração SQL para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO pedidos (nome, endereco, tipo_comida, bebida, doce, ip_cliente, data_criacao) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nome, $endereco, $tipo_comida, $bebida, $doce, $ip_cliente, $data_criacao);

    // Executa a declaração
    if ($stmt->execute()) {
        echo "Pedido realizado com sucesso!";
    } else {
        echo "Erro ao realizar o pedido: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>