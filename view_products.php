<?php
$servername = "localhost"; // Altere se necessário
$username = "root"; // Altere se necessário
$password = ""; // Altere se necessário
$dbname = "loja";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultar os produtos
$sql = "SELECT id, nome, preco, descricao FROM produtos";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Registrados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Produtos Registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Exibir cada produto
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>R$ " . number_format($row["preco"], 2, ',', '.') . "</td>";
                        echo "<td>" . htmlspecialchars($row["descricao"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum produto registrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.html" class="view-link">Voltar para Registro</a>
    </div>
</body>
</html>
<?php
$conn->close();
?>
