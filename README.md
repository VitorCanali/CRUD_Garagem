# 🚗 Garagem de Carros — Sistema Web em PHP + MySQL

## 💡 Sobre o Projeto

Este projeto foi desenvolvido como parte do **Desafio Criativo de Desenvolvimento Web em PHP + MySQL**, com o objetivo de aplicar os principais conceitos de **conexão com banco de dados**, **CRUD (Create, Read, Update, Delete)** e **exibição dinâmica de informações**.

O tema escolhido foi **Garagem de Carros**, um sistema simples que permite **cadastrar, listar, editar e excluir veículos**, tudo conectado a um banco de dados **MySQL**.

---

## 🎯 Funcionalidades

✅ **Cadastro de carros** (modelo e ano)
✅ **Validação de campos obrigatórios**
✅ **Listagem de todos os carros cadastrados**
✅ **Ordenação por ano (crescente)**
✅ **Edição e exclusão de registros**
✅ **Mensagem de confirmação ou erro**
✅ **Estilo visual em tons de dourado**

---

## 🛠️ Tecnologias Utilizadas

* **PHP** — conexão e manipulação de dados
* **HTML + CSS** — estrutura e estilo
* **MySQL** — armazenamento dos registros
---

## ⚙️ Estrutura do Projeto

```
📁 garagem-carros/
├── index4.php          # Página principal com cadastro e listagem
├── update.php          # Página de edição de carros
├── delete.php          # Página de exclusão de carros
└── README.md           # Este arquivo
```

---

## 💾 Banco de Dados

### 🔹 Nome do banco:

```
teste_formulario
```

### 🔹 Tabela: `Carros`

```sql
CREATE TABLE IF NOT EXISTS Carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(255),
    ano INT
);
```

---

## 🚀 Como Executar o Projeto

1. **Clone o repositório**:

   ```bash
   git clone https://github.com/seuusuario/garagem-carros.git
   ```

2. **Inicie o servidor local (XAMPP/WAMP/MAMP)**.

3. **Crie o banco de dados** no phpMyAdmin:

   ```sql
   CREATE DATABASE teste_formulario;
   USE teste_formulario;
   SOURCE create_database.sql;
   ```

4. **Coloque os arquivos** na pasta:

   ```
   C:\xampp\htdocs\garagem-carros
   ```

5. **Acesse no navegador:**

   ```
   http://localhost/garagem-carros/index4.php
   ```

---

## 🧮 Listagem em ordem crescente

O sistema exibe **a listagem dos carros em ordem crescente de ano**, permitindo uma visão organizada da “garagem”.
(Poderia ser expandido futuramente para incluir médias de anos, contagem total, etc.)

---

## 📜 Comentários no Código

O código está **comentado passo a passo**, explicando:

* Conexão com o MySQL
* Criação da tabela (caso não exista)
* Inserção, listagem, edição e exclusão
* Validação dos campos
* Mensagens de status

---

## 📈 Possíveis Melhorias Futuras

* Adicionar campo de **preço ou quilometragem**
* Implementar **busca por modelo**
* Calcular **média de anos dos carros cadastrados**
* Criar **interface responsiva** para dispositivos móveis

---

## 👨‍💻 Autor

Desenvolvido por **Vitor Pereira**
💬 Projeto feito com PHP e MySQL
