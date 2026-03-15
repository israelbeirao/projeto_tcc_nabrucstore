<?php
session_start();
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<title>Nabrucstore</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body{
margin:0;
font-family:Arial, sans-serif;
background:#F5F5F5;
}

/* HEADER */

header{
background:#ffffff;
padding:20px;
display:flex;
flex-direction:column;
align-items:center;
border-bottom:1px solid #ddd;
}

.logo img{
height:110px;
}


/* MENU */

.menu{
margin-top:15px;
text-align:center;
}

.menu a{
margin-left:20px;
text-decoration:none;
color:#0F5A44;
font-weight:bold;
transition:0.3s;
}

.menu a:hover{
color:#1F7A60;
}

/* BANNER */

.banner{
background:#0F5A44;
color:#FFFFFF;
text-align:center;
padding:80px 20px;
font-size:30px;
font-weight:bold;
}

/* PRODUTOS */

.produtos{
padding:40px;
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:25px;
}

/* CARD PRODUTO */

.produto{
background:#FFFFFF;
padding:15px;
border-radius:8px;
border:1px solid #eee;
text-align:center;
transition:0.2s;
}

.produto:hover{
transform:scale(1.03);
box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.produto img{
width:100%;
height:300px;
object-fit:contain;
}

/* BOTÃO */

.produto button{
background:#E8CFCB;
color:#0F5A44;
border:none;
padding:10px 18px;
border-radius:6px;
cursor:pointer;
font-weight:bold;
transition:0.3s;
}

.produto button:hover{
background:#1F7A60;
color:white;
}

/* FOOTER */

footer{
text-align:center;
padding:25px;
background:#0F5A44;
color:white;
margin-top:40px;
}

/* MENU USUARIO */

.usuario-menu{
position:relative;
display:inline-block;
margin-left:20px;
z-index:1000;
}

.usuario-nome{
cursor:pointer;
font-weight:bold;
color:#0F5A44;
}

.dropdown{
display:none;
position:absolute;
background:white;
min-width:200px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
border-radius:6px;
margin-top:10px;
z-index:1000;
}

.dropdown a{
display:block;
padding:10px;
text-decoration:none;
color:#333;
}

.dropdown a:hover{
background:#F5F5F5;
}

.usuario-menu:focus-within .dropdown{
display:block;
}

.usuario-nome::after{
content:" ▼";
font-size:12px;
}



</style>

</head>

<body>

<header>

<div class="logo">
<a href="index.php">
<img src="img/logo.png" alt="Nabrucstore">
</a>
</div>

<div class="menu">    

<?php

if(isset($_SESSION['usuario'])){

echo '<div class="usuario-menu">';
echo '<span class="usuario-nome" tabindex="0">Olá, '.$_SESSION['usuario'].' </span>';

echo '<div class="dropdown">';

echo '<a href="#">📦 Pedidos</a>';
echo '<a href="#">🔄 Trocas e Devoluções</a>';
echo '<a href="#">❤️ Favoritos</a>';
echo '<a href="#">📍 Meus Endereços</a>';
echo '<a href="#">💳 Meus Cartões</a>';

/* APENAS ADMIN */

if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin'){
echo '<a href="cadastrar_produto.php">⚙️ Painel Admin</a>';
}

echo '<a href="logout.php">🚪 Sair</a>';

echo '</div>';
echo '</div>';

echo '<a href="carrinho.php">🛒 Carrinho</a>';

}else{

echo '<a href="login.php">Entrar</a>';
echo '<a href="cadastro.php">Criar Conta</a>';
echo '<a href="carrinho.php">🛒 Carrinho</a>';

}

?>

</div>

</header>

<section class="banner">
Nova Coleção Primavera
</section>


<section class="produtos">

<?php

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

echo "<div class='produto'>";

echo "<img src='".$row['imagem']."' alt='".$row['nome']."'>";

echo "<h3>".$row['nome']."</h3>";

echo "<p>R$ ".$row['preco']."</p>";

echo "<button>Adicionar ao Carrinho</button>";

echo "</div>";

}

?>

</section>


<footer>
© 2026 Nabrucstore
</footer>

</body>
</html>