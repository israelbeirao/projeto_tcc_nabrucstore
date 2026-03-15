<?php
include("conexao.php");

$mensagem = "";

if(isset($_POST['nome'])){

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuarios (nome,email,senha,tipo)
VALUES ('$nome','$email','$senha','cliente')";

if($conn->query($sql)){
$mensagem = "Cadastro realizado com sucesso!";
}else{
$mensagem = "Erro ao cadastrar.";
}

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<title>Criar Conta - Nabrucstore</title>

<style>

body{
margin:0;
font-family:Arial;
background:#F5F5F5;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

/* CARD */

.cadastro-box{
background:white;
padding:40px;
width:350px;
border-radius:8px;
box-shadow:0 5px 20px rgba(0,0,0,0.08);
text-align:center;
}

/* LOGO */

.logo img{
height:90px;
margin-bottom:20px;
}

/* INPUTS */

input{
width:100%;
padding:10px;
margin-top:5px;
margin-bottom:15px;
border:1px solid #ddd;
border-radius:5px;
}

/* BOTÃO */

button{
width:100%;
padding:12px;
background:#E8CFCB;
border:none;
border-radius:6px;
font-weight:bold;
color:#0F5A44;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#1F7A60;
color:white;
}

/* MENSAGEM */

.mensagem{
color:#1F7A60;
margin-bottom:10px;
font-weight:bold;
}

/* LINK */

.voltar{
margin-top:15px;
display:block;
text-decoration:none;
color:#0F5A44;
font-weight:bold;
}

</style>

</head>

<body>

<div class="cadastro-box">

<div class="logo">
<img src="img/logo.png">
</div>

<h2>Criar Conta</h2>

<?php
if($mensagem != ""){
echo "<div class='mensagem'>$mensagem</div>";
}
?>

<form method="POST">

Nome<br>
<input type="text" name="nome" required>

Email<br>
<input type="email" name="email" required>

Senha<br>
<input type="password" name="senha" required>

<button type="submit">Cadastrar</button>

</form>

<a class="voltar" href="login.php">Já tenho conta</a>
<a class="voltar" href="index.php">← Voltar para loja</a>

</div>

</body>
</html>