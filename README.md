# Nabrucstore

Projeto de desenvolvimento de uma loja virtual criado como trabalho acadêmico (TCC).

O objetivo do projeto é simular o funcionamento de um e-commerce básico utilizando PHP, com sistema de autenticação de usuários e visualização de produtos.

---

# Tecnologias Utilizadas

Este projeto foi desenvolvido utilizando as seguintes tecnologias:

- PHP
- HTML5
- CSS3
- MySQL
- Sessões PHP
- Servidor local (XAMPP / Apache)

---

# Funcionalidades do Sistema

### Usuário

- Cadastro de usuário
- Login no sistema
- Acesso ao painel "Minha Conta"
- Logout do sistema

### Loja

- Visualização de produtos
- Catálogo com imagem, nome e preço
- Carrinho de compras
- Controle de quantidade de produtos
- Finalização de pedidos

### Cliente

- Cadastro de endereços
- Cadastro de cartões
- Persistência de pedidos
  
### Administração

- Painel administrativo para cadastro de produtos

---

# Estrutura do Projeto

```
```text
nabrucstore
│
├── backend
│   ├── conexao.php
│   ├── cadastrar_produto.php
│   └── gerar_senha.php
│
├── database
│   └── nabrucstore.sql
│
├── public
│   ├── index.php
│   ├── login.php
│   ├── cadastro.php
│   ├── logout.php
│   ├── minha_conta.php
│   ├── carrinho.php
│   ├── endereco.php
│   ├── cartoes.php
│   └── finalizar_pedido.php
│
└── img
    └── logo.png
```


---

# Banco de Dados

O sistema utiliza banco de dados MySQL.

Principais tabelas:

### usuarios

- id
- nome
- email
- senha
- tipo (admin ou cliente)

### produtos

- id
- nome
- preco
- imagem
### enderecos

- id
- usuario_id
- cep
- rua
- numero
- complemento
- bairro
- cidade
- estado

### cartoes

- id
- usuario_id
- nome_cartao
- final_cartao
- bandeira
- validade

### pedidos

- id
- usuario_id
- total
- status
- data_pedido

### itens_pedido

- id
- pedido_id
- produto_id
- quantidade
- preco_unitario
  
---

# Como Executar o Projeto

1. Instalar o XAMPP
2. Iniciar os serviços Apache e MySQL
3. Importar o banco de dados no phpMyAdmin
4. Colocar a pasta do projeto dentro de: htdocs/Projeto_TCC_Loja_nabrucstore

# Acesso
5. Acessar no navegador:
http://localhost/Projeto_TCC_Loja_nabrucstore


---
# Objetivo do Projeto

O sistema foi desenvolvido com foco acadêmico para demonstrar a integração entre front-end, back-end e banco de dados em um ambiente de e-commerce funcional, simulando processos reais de autenticação, navegação, carrinho e finalização de pedidos.

# Autor

Projeto desenvolvido por:

Israel Santos de Souza Beirão

Trabalho acadêmico desenvolvido para fins educacionais.


