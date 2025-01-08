<?php
require '../core/config.php'; // Conexão com o banco de dados

if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];

    // Prepara a consulta
    $stmt = $conn->prepare("SELECT nome FROM contas WHERE nome LIKE ? LIMIT 5");
    $searchTerm = "%{$nome}%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();

    $result = $stmt->get_result();
    $sugestoes = [];

    while ($row = $result->fetch_assoc()) {
        $sugestoes[] = $row['nome'];
    }
    echo json_encode($sugestoes);
    exit();
}
?>
