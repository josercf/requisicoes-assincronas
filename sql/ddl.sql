-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS sistema_pedidos;
USE sistema_pedidos;

-- Criação da tabela 'pedidos'
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    tipo_comida VARCHAR(50) NOT NULL,
    bebida VARCHAR(50),
    doce VARCHAR(50),
    ip_cliente VARCHAR(45) NOT NULL,
    data_criacao DATETIME NOT NULL,
    status_pedido VARCHAR(20) NOT NULL DEFAULT 'Pendente'
);
