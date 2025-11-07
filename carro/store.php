<?php

include 'conexao.php'; // Inclui o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] === "POST") { // Verifica se o formulário foi enviado
    $modelo = $_POST['modelo']; // Recebe o nome
    $ano = $_POST['ano']; // Recebe o ano
    $sql = "INSERT INTO carros (modelo,ano) VALUES ('$modelo', '$ano')"; // Prepara a consulta

    // Executa a consulta e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE){
        header("Location: index.php");
    } else {
        echo "Erro:" . $conn->error; // Mostra erro, se houver
    }
}

?>