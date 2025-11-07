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

    // Busca os dados do carro
    $sql = "SELECT * FROM Carros WHERE id = $id";
    $result = $conn->query($sql);
    $carro = $result->fetch_assoc();

    // Se o formulário foi enviado, atualiza
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $modelo = $_POST["modelo"];
        $ano = $_POST["ano"];

        $sqlUpdate = "UPDATE Carros SET modelo='$modelo', ano=$ano WHERE id=$id";

        if ($conn->query($sqlUpdate) === TRUE) {
            header("Location: index4.php");
            exit;
        } else {
            echo "<div class='msg erro'>Erro ao atualizar: " . $conn->error . "</div>";
        }
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
    form {
        background-color: #fff;
        display: inline-block;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
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

<h1>Atualizar Carro</h1>

<form action="" method="POST">
    <label>Modelo:</label><br>
    <input type="text" name="modelo" value="<?php echo $carro['modelo']; ?>" required><br>
    <label>Ano:</label><br>
    <input type="number" name="ano" value="<?php echo $carro['ano']; ?>" required><br>
    <input type="submit" value="Atualizar">
</form>

<br>
<a href="index4.php">Cancelar</a>
