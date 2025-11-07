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

// 2. Verifica se o ID foi enviado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Carros WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index4.php");
        exit;
    } else {
        echo "<div class='msg erro'>Erro ao excluir: " . $conn->error . "</div>";
    }
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f5eb;
        color: #4a148c;
        text-align: center;
        padding: 20px;
    }
    .msg {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        display: inline-block;
    }
    a {
        color: #4a148c;
        text-decoration: none;
        margin-top: 20px;
        display: inline-block;
    }
    h1 {
        color: #bfa100;
    }
</style>

<h1>Excluir Carro</h1>
<div class="msg">
    <p>Carro excluído com sucesso.</p>
    <a href="index4.php">Voltar</a>
</div>
