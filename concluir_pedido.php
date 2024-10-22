
<?php
// concluir_pedido.php
require 'conexao.php';

$conn = new mysqli($host, $user, $pass, $db);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pedido_id = $_POST['pedido_id'];

    // Prepara a declaração SQL para evitar SQL Injection
    $stmt = $conn->prepare("UPDATE pedidos SET status_pedido = 'Concluído' WHERE id = ?");
    $stmt->bind_param("i", $pedido_id);

    // Executa a declaração
    if ($stmt->execute()) {
        echo 'Pedido concluído com sucesso.';
    } else {
        echo 'Erro ao concluir o pedido: ' . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>
