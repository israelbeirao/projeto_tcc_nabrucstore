<?php
session_start();
include("../backend/conexao.php");

if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = [];
}

if(isset($_GET['aumentar'])){
    $id = $_GET['aumentar'];
    $_SESSION['carrinho'][$id]++;
    header("Location: carrinho.php");
    exit;
}

if(isset($_GET['diminuir'])){
    $id = $_GET['diminuir'];

    if($_SESSION['carrinho'][$id] > 1){
        $_SESSION['carrinho'][$id]--;
    }else{
        unset($_SESSION['carrinho'][$id]);
    }

    header("Location: carrinho.php");
    exit;
}

if(isset($_GET['remover'])){
    $id = $_GET['remover'];
    unset($_SESSION['carrinho'][$id]);
    header("Location: carrinho.php");
    exit;
}

$total = 0;
$qtdItens = !empty($_SESSION['carrinho']) ? array_sum($_SESSION['carrinho']) : 0;
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Carrinho - Nabrucstore</title>

<style>
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#F5F5F5;
}

.container{
    display:flex;
    max-width:1100px;
    margin:40px auto;
    gap:20px;
    align-items:flex-start;
}

.produtos{
    flex:2;
    background:white;
    padding:25px;
    border-radius:8px;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

.resumo{
    flex:1;
    background:white;
    padding:25px;
    border-radius:8px;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
    position:sticky;
    top:20px;
}

h2, h3{
    color:#0F5A44;
    margin-top:0;
}

.item{
    display:flex;
    gap:15px;
    border-bottom:1px solid #eee;
    padding:15px 0;
}

.item img{
    width:100px;
    height:120px;
    object-fit:contain;
}

.info{
    flex:1;
}

.info h3{
    margin:0 0 8px 0;
    font-size:18px;
}

.preco{
    font-weight:bold;
    color:#0F5A44;
    margin-top:8px;
}

.controle{
    display:flex;
    gap:8px;
    align-items:center;
    margin-top:10px;
}

.controle a{
    text-decoration:none;
    padding:5px 10px;
    background:#E8CFCB;
    color:#0F5A44;
    border-radius:4px;
    font-weight:bold;
}

.controle a:hover{
    background:#1F7A60;
    color:white;
}

.linha{
    display:flex;
    justify-content:space-between;
    margin:12px 0;
}

.total{
    font-size:20px;
    font-weight:bold;
    color:#0F5A44;
}

.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:6px;
    font-weight:bold;
    cursor:pointer;
    margin-top:10px;
}

.finalizar{
    background:#1F7A60;
    color:white;
}

.finalizar:hover{
    opacity:0.95;
}

.continuar{
    background:white;
    border:1px solid #1F7A60;
    color:#1F7A60;
}

.continuar:hover{
    background:#F5F5F5;
}

.vazio{
    text-align:center;
    padding:40px 0;
    color:#666;
}

.mensagem-login{
    background:#fff3cd;
    color:#856404;
    padding:12px;
    border-radius:6px;
    margin-top:15px;
    font-size:14px;
}
</style>
</head>
<body>

<div class="container">

    <div class="produtos">
        <h2>Seu Carrinho</h2>

        <?php if(empty($_SESSION['carrinho'])){ ?>
            <div class="vazio">Seu carrinho está vazio.</div>
        <?php } else { ?>

            <?php
            foreach($_SESSION['carrinho'] as $id => $quantidade){

                $sql = "SELECT * FROM produtos WHERE id = $id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                if(!$row){
                    continue;
                }

                $subtotal = $row['preco'] * $quantidade;
                $total += $subtotal;
            ?>
                <div class="item">
                    <img src="<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>">

                    <div class="info">
                        <h3><?php echo $row['nome']; ?></h3>
                        <div>Preço unitário: R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></div>

                        <div class="controle">
                            <a href="carrinho.php?diminuir=<?php echo $id; ?>">-</a>
                            <span><?php echo $quantidade; ?></span>
                            <a href="carrinho.php?aumentar=<?php echo $id; ?>">+</a>
                            <a href="carrinho.php?remover=<?php echo $id; ?>">Remover</a>
                        </div>

                        <div class="preco">
                            Subtotal: R$ <?php echo number_format($subtotal, 2, ',', '.'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        <?php } ?>
    </div>

    <div class="resumo">
        <h3>Resumo do Pedido</h3>

        <div class="linha">
            <span>Itens</span>
            <span><?php echo $qtdItens; ?></span>
        </div>

        <div class="linha total">
            <span>Total</span>
            <span>R$ <?php echo number_format($total, 2, ',', '.'); ?></span>
        </div>

        <?php if(!empty($_SESSION['carrinho'])){ ?>
            <?php if(isset($_SESSION['usuario_id'])){ ?>
                <form method="POST" action="finalizar_pedido.php">
                    <button type="submit" class="btn finalizar">FINALIZAR COMPRA</button>
                </form>
            <?php } else { ?>
                <div class="mensagem-login">
                    Faça login para finalizar a compra.
                </div>
                <button class="btn finalizar" onclick="window.location='login.php'">ENTRAR PARA FINALIZAR</button>
            <?php } ?>

            <button class="btn continuar" onclick="window.location='index.php'">CONTINUAR COMPRANDO</button>
        <?php } ?>
    </div>

</div>

</body>
</html>
