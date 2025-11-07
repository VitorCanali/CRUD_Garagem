<?php

include 'conexao.php';
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) { // Se há resultados
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>modelo</th>
                <th>Ações</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) { // Para cada usuário
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["modelo"] . "</td>
                <td>
                    <a href='update.php?id=" . $row["id"] . "'>Editar</a>
                    <a href='delete.php?id=" . $row["id"] . "'>Excluir</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum usuário foi encontrado.";
    
}



?>