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

### Administração

- Painel administrativo para cadastro de produtos

---

# Estrutura do Projeto

# Estrutura do Projeto

```
nabrucstore
│
├── index.php
├── login.php
├── cadastro.php
├── logout.php
├── minha_conta.php
├── conexao.php
│
├── img
│   └── logo.png
│
└── banco
    └── script.sql
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

---

# Como Executar o Projeto

1. Instalar o XAMPP
2. Iniciar os serviços Apache e MySQL
3. Importar o banco de dados no phpMyAdmin
4. Colocar a pasta do projeto dentro de:

# htdocs 
5. Acessar no navegador:
http://localhost/Projeto_TCC_Loja_nabrucstore


---

# Autor

Projeto desenvolvido por:

Israel Santos de Souza Beirão

Trabalho acadêmico desenvolvido para fins educacionais.


