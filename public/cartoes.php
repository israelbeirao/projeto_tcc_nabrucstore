<?php
session_start();
include("../backend/conexao.php");

if(!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit;
}

$mensagem = "";

if(isset($_POST['nome_cartao'])){

    $usuario_id = $_SESSION['usuario_id'];
    $nome_cartao = $_POST['nome_cartao'];
    $final_cartao = $_POST['final_cartao'];
    $bandeira = $_POST['bandeira'];
    $validade = $_POST['validade'];

    $sql = "INSERT INTO cartoes (usuario_id, nome_cartao, final_cartao, bandeira, validade)
            VALUES ('$usuario_id', '$nome_cartao', '$final_cartao', '$bandeira', '$validade')";

    if($conn->query($sql) === TRUE){
        $mensagem = "Cartão cadastrado com sucesso!";
    }else{
        $mensagem = "Erro ao cadastrar cartão.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Meus Cartões - Nabrucstore</title>

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

.cartao-box{
background:white;
padding:40px;
width:380px;
border-radius:8px;
box-shadow:0 5px 20px rgba(0,0,0,0.08);
text-align:center;
}

.logo img{
height:90px;
margin-bottom:20px;
}

input, select{
width:100%;
padding:10px;
margin-top:5px;
margin-bottom:15px;
border:1px solid #ddd;
border-radius:5px;
box-sizing:border-box;
}

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

.mensagem{
color:#0F5A44;
margin-bottom:10px;
font-weight:bold;
}

.voltar{
margin-top:15px;
display:block;
text-decoration:none;
color:#0F5A44;
font-weight:bold;
}

.aviso{
font-size:13px;
color:#666;
margin-bottom:15px;
}
</style>
</head>

<body>

<div class="cartao-box">

<div class="logo">
<img src="../assets/img/logo.png" alt="Nabrucstore">
</div>

<h2>Meus Cartões</h2>

<p class="aviso">Cadastro simulado para fins acadêmicos. Não informe número completo nem CVV.</p>

<?php
if($mensagem != ""){
    echo "<div class='mensagem'>$mensagem</div>";
}
?>

<form method="POST">

Nome no cartão<br>
<input type="text" name="nome_cartao" required>

Final do cartão<br>
<input type="text" name="final_cartao" maxlength="4" placeholder="1234" required>

Bandeira<br>
<select name="bandeira" required>
    <option value="">Selecione</option>
    <option value="Visa">Visa</option>
    <option value="Mastercard">Mastercard</option>
    <option value="Elo">Elo</option>
    <option value="Hipercard">Hipercard</option>
</select>

Validade<br>
<input type="text" name="validade" placeholder="MM/AAAA" required>

<button type="submit">Salvar Cartão</button>

</form>

<a class="voltar" href="index.php">← Voltar para loja</a>

</div>

</body>
</html>
