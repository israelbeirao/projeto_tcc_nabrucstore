<?php
session_start();

if(!isset($_SESSION['usuario'])){
header("Location: login.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<title>Minha Conta - Nabrucstore</title>

<style>

body{
margin:0;
font-family:Arial;
background:#F5F5F5;
}

/* HEADER */

header{
background:white;
padding:20px;
text-align:center;
border-bottom:1px solid #ddd;
}

.logo img{
height:90px;
}

/* CONTAINER */

.container{
max-width:900px;
margin:40px auto;
background:white;
padding:30px;
border-radius:8px;
box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

/* TITULO */

h2{
color:#0F5A44;
}

/* MENU */

.menu-conta{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
gap:20px;
margin-top:30px;
}

.item{
background:#F9F9F9;
padding:20px;
border-radius:8px;
text-align:center;
cursor:pointer;
transition:0.3s;
border:1px solid #eee;
}

.item:hover{
background:#E8CFCB;
}

/* BOTAO SAIR */

.sair{
margin-top:30px;
display:inline-block;
padding:10px 20px;
background:#0F5A44;
color:white;
text-decoration:none;
border-radius:6px;
}

</style>

</head>

<body>

<header>

<div class="logo">
<img src="img/logo.png">
</div>

</header>

<div class="container">

<h2>Olá, <?php echo $_SESSION['usuario']; ?> 👋</h2>

<p>Bem-vindo à sua conta.</p>

<div class="menu-conta">

<div class="item">📦 Pedidos</div>

<div class="item">🔄 Trocas e Devoluções</div>

<div class="item">❤️ Meus Favoritos</div>

<div class="item">👤 Informações da Conta</div>

<div class="item">📍 Meus Endereços</div>

<div class="item">💳 Meus Cartões</div>

<div class="item">🛒 Carrinho</div>

</div>

<a class="sair" href="logout.php">Sair</a>

</div>

</body>
</html>
