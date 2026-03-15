<?php
session_start();

if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin'){
echo "Acesso negado!";
exit;
}

include("conexao.php");

$mensagem = "";

if(isset($_POST['nome'])){

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];

$nomeImagem = $_FILES['imagem']['name'];
$tempImagem = $_FILES['imagem']['tmp_name'];

$caminho = "img_produtos/" . $nomeImagem;

move_uploaded_file($tempImagem, $caminho);

$sql = "INSERT INTO produtos (nome, preco, descricao, imagem)
VALUES ('$nome','$preco','$descricao','$caminho')";

if($conn->query($sql) === TRUE){
$mensagem = "Produto cadastrado com sucesso!";
}else{
$mensagem = "Erro ao cadastrar produto.";
}

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<title>Painel Admin - Cadastrar Produto</title>

<style>

body{
margin:0;
font-family:Arial;
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
height:90px;
}

.menu{
margin-top:15px;
}

.menu a{
margin-left:20px;
text-decoration:none;
color:#0F5A44;
font-weight:bold;
}

/* FORM */

.form-container{

max-width:500px;
margin:60px auto;
background:white;
padding:35px;
border-radius:8px;
box-shadow:0 5px 20px rgba(0,0,0,0.08);

}

.form-container h2{
text-align:center;
color:#0F5A44;
margin-bottom:25px;
}

/* CAMPOS */

.form-group{
margin-bottom:18px;
}

label{
font-weight:bold;
color:#0F5A44;
}

input, textarea{

width:100%;
padding:10px;
margin-top:5px;
border:1px solid #ddd;
border-radius:6px;

}

/* BOTÃO */

button{

width:100%;
padding:12px;
background:#E8CFCB;
color:#0F5A44;
border:none;
border-radius:6px;
font-size:16px;
font-weight:bold;
cursor:pointer;
transition:0.3s;

}

button:hover{

background:#1F7A60;
color:white;

}

/* MENSAGEM */

.mensagem{

text-align:center;
color:#1F7A60;
margin-bottom:15px;
font-weight:bold;

}

/* LINK */

.voltar{
display:block;
margin-top:15px;
text-align:center;
text-decoration:none;
color:#0F5A44;
font-weight:bold;
}

</style>

</head>

<body>

<header>

<div class="logo">
<img src="img/logo.png">
</div>

<div class="menu">
<a href="index.php">Loja</a>
<a href="cadastrar_produto.php">Cadastrar Produto</a>
</div>

</header>

<div class="form-container">

<h2>Cadastrar Produto</h2>

<?php if($mensagem != ""){ ?>
<div class="mensagem"><?php echo $mensagem; ?></div>
<?php } ?>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">
<label>Nome do Produto</label>
<input type="text" name="nome" required>
</div>

<div class="form-group">
<label>Preço</label>
<input type="number" step="0.01" name="preco" required>
</div>

<div class="form-group">
<label>Descrição</label>
<textarea name="descricao"></textarea>
</div>

<div class="form-group">
<label>Imagem do Produto</label>
<input type="file" name="imagem" required>
</div>

<button type="submit">Cadastrar Produto</button>

</form>

<a class="voltar" href="index.php">← Voltar para loja</a>

</div>

</body>
</html>