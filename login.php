<?php
session_start();
include("conexao.php");

$erro = "";

if(isset($_POST['email'])){

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios 
WHERE email='$email' AND senha='$senha'";

$result = $conn->query($sql);

if($result->num_rows > 0){

$usuario = $result->fetch_assoc();

$_SESSION['usuario'] = $usuario['nome'];
$_SESSION['tipo'] = $usuario['tipo'];

header("Location: index.php");
exit;

}else{

$erro = "Login inválido";

}

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<title>Login - Nabrucstore</title>

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

/* CARD LOGIN */

.login-box{
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

/* ERRO */

.erro{
color:red;
margin-bottom:10px;
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

<div class="login-box">

<div class="logo">
<img src="img/logo.png">
</div>

<h2>Entrar</h2>

<?php
if($erro != ""){
echo "<div class='erro'>$erro</div>";
}
?>

<form method="POST">

Email<br>
<input type="email" name="email" required>

Senha<br>
<input type="password" name="senha" required>

<button type="submit">Entrar</button>

</form>

<a class="voltar" href="index.php">← Voltar para loja</a>

</div>

</body>

</html>