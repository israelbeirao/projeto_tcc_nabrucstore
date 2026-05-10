<?php
session_start();
include("../backend/conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit;
}

if(empty($_SESSION['carrinho'])){
    header("Location: carrinho.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$total = 0;

foreach($_SESSION['carrinho'] as $produto_id => $quantidade){
    $sql = "SELECT * FROM produtos WHERE id = $produto_id";
    $result = $conn->query($sql);
    $produto = $result->fetch_assoc();

    if($produto){
        $total += $produto['preco'] * $quantidade;
    }
}

$sqlPedido = "INSERT INTO pedidos (usuario_id, total) VALUES ('$usuario_id', '$total')";

if($conn->query($sqlPedido) === TRUE){

    $pedido_id = $conn->insert_id;

    foreach($_SESSION['carrinho'] as $produto_id => $quantidade){
        $sql = "SELECT * FROM produtos WHERE id = $produto_id";
        $result = $conn->query($sql);
        $produto = $result->fetch_assoc();

        if($produto){
            $preco_unitario = $produto['preco'];

            $sqlItem = "INSERT INTO itens_pedido 
            (pedido_id, produto_id, quantidade, preco_unitario)
            VALUES 
            ('$pedido_id', '$produto_id', '$quantidade', '$preco_unitario')";

            $conn->query($sqlItem);
        }
    }

    unset($_SESSION['carrinho']);

    echo "<script>alert('Pedido finalizado com sucesso!'); window.location='index.php';</script>";
    exit;

}else{
    echo "Erro ao finalizar pedido.";
}
?>
