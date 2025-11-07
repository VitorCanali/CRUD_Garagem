<?php
// 1. Conexão com MySQL
$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "teste_formulario";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// 2. Criar tabela "Carros" se não existir
$sql = "CREATE TABLE IF NOT EXISTS Carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(255),
    ano INT
)";
$conn->query($sql);

// 3. Estilo básico (cores JoJo Golden Wind)
echo "
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f5eb;
        color: #4a148c;
        text-align: center;
        margin: 0;
        padding: 20px;
    }
    h3 {
        color: #bfa100;
        margin-top: 30px;
    }
    form {
        background-color: #fff;
        display: inline-block;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }
    input[type='text'], input[type='number'] {
        width: 80%;
        padding: 8px;
        margin: 8px 0;
        border: 1px solid #bfa100;
        border-radius: 4px;
        text-align: center;
    }
    input[type='submit'] {
        background-color: #bfa100;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        transition: 0.3s;
    }
    input[type='submit']:hover {
        background-color: #d4b000;
    }
    table {
        margin: 0 auto;
        border-collapse: collapse;
        width: 70%;
        background-color: #fff;
        border: 2px solid #bfa100;
        box-shadow: 0px 0px 6px rgba(0,0,0,0.1);
    }
    th {
        background-color: #bfa100;
        color: white;
        padding: 10px;
    }
    td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: #f3f0e0;
    }
    .msg {
        margin: 10px auto;
        width: 60%;
        padding: 10px;
        border-radius: 6px;
    }
    .ok {
        background-color: #dff0d8;
        color: #3c763d;
    }
    .erro {
        background-color: #f2dede;
        color: #a94442;
    }
    a.botao {
        background-color: #bfa100;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        text-decoration: none;
        margin: 0 3px;
        transition: 0.3s;
    }
    a.botao:hover {
        background-color: #d4b000;
    }
</style>
";

// 4. Formulário (sempre aparece)
echo '
<form method="POST">
    <h3>Cadastrar Carro</h3>
    <input type="text" name="modelo" placeholder="Modelo"><br>
    <input type="number" name="ano" placeholder="Ano"><br>
    <input type="submit" value="Enviar">
</form>
';

// 5. Receber e inserir dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = trim($_POST["modelo"]);
    $ano = trim($_POST["ano"]);

    if ($modelo == "" || $ano == "" || $ano <= 0) {
        echo "<div class='msg erro'>Preencha os campos corretamente.</div>";
    } else {
        $sqlInsert = "INSERT INTO Carros (modelo, ano) VALUES ('$modelo', $ano)";
        if ($conn->query($sqlInsert) === TRUE) {
            echo "<div class='msg ok'>Carro inserido com sucesso!</div>";
        } else {
            echo "<div class='msg erro'>Erro ao inserir: " . $conn->error . "</div>";
        }
    }
}

// 6. Listar todos os carros com ações
echo "<h3>Carros cadastrados</h3>";
$sqlAll = "SELECT * FROM Carros";
$result = $conn->query($sqlAll);

if ($result->num_rows > 0) {
    echo "<table>
            <tr><th>ID</th><th>Modelo</th><th>Ano</th><th>Ações</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["modelo"]."</td>
                <td>".$row["ano"]."</td>
                <td>
                    <a class='botao' href='update.php?id=".$row["id"]."'>Editar</a>
                    <a class='botao' href='delete.php?id=".$row["id"]."' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum carro cadastrado.<br>";
}

// 7. Carros ordenados por ano
echo "<h3>Carros cadastrados (ordem crescente de ano)</h3>";
$sqlOrder = "SELECT * FROM Carros ORDER BY ano ASC";
$resOrder = $conn->query($sqlOrder);
if ($resOrder->num_rows > 0) {
    echo "<table>
            <tr><th>ID</th><th>Modelo</th><th>Ano</th></tr>";
    while ($row = $resOrder->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["modelo"]."</td>
                <td>".$row["ano"]."</td>
              </tr>";
    }
    echo "</table>";
}
