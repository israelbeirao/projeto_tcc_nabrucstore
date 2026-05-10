<?php
session_start();
include("../backend/conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit;
}

$mensagem = "";

if(isset($_POST['cep'])){

    $usuario_id = $_SESSION['usuario_id'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO enderecos 
    (usuario_id, cep, rua, numero, complemento, bairro, cidade, estado)
    VALUES
    ('$usuario_id', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";

    if($conn->query($sql) === TRUE){
        $mensagem = "Endereço cadastrado com sucesso!";
    }else{
        $mensagem = "Erro ao cadastrar endereço.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastro de Endereço - Nabrucstore</title>

<style>

body{
margin:0;
font-family:Arial;
background:#F5F5F5;
display:flex;
justify-content:center;
align-items:center;
min-height:100vh;
}

/* CARD */

.endereco-box{
background:white;
padding:40px;
width:380px;
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
box-sizing:border-box;
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
color:#0F5A44;
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

<div class="endereco-box">

<div class="logo">
<img src="../img/logo.png" alt="Nabrucstore">
</div>

<h2>Cadastrar Endereço</h2>

<?php
if($mensagem != ""){
    echo "<div class='mensagem'>$mensagem</div>";
}
?>

<form method="POST">

CEP<br>
<input type="text" name="cep" required>

Rua<br>
<input type="text" name="rua" required>

Número<br>
<input type="text" name="numero" required>

Complemento<br>
<input type="text" name="complemento">

Bairro<br>
<input type="text" name="bairro" required>

Cidade<br>
<input type="text" name="cidade" required>

Estado<br>
<input type="text" name="estado" maxlength="2" required>

<button type="submit">Salvar Endereço</button>

</form>

<a class="voltar" href="index.php">← Voltar para loja</a>

</div>

</body>
</html>
