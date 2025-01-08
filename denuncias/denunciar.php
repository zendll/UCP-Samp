<?php
session_start();
require '../core/config.php'; // Conexão com o banco de dados

if (!isset($_SESSION['user_id'])) {
    echo "Você precisa estar logado para fazer uma denúncia.";
    exit();
}

$denunciante_id = $_SESSION['user_id'];
//echo "ID do Denunciante: " . htmlspecialchars($denunciante_id); // Debug

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $denunciado = $_POST['denunciado'];
    $descricao = $_POST['descricao'];
    $imagem_url = '';

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        if (!file_exists('uploads')) {
            mkdir('uploads', 0755, true);
        }
        $imagem_url = 'uploads/' . basename($_FILES['imagem']['name']);
        if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem_url)) {
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    }

    $stmt = $conn->prepare("INSERT INTO denuncias (user_id, denunciado, descricao, imagem_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $denunciante_id, $denunciado, $descricao, $imagem_url);

    if ($stmt->execute()) {
        echo "Denúncia registrada com sucesso!";
    } else {
        echo "Erro ao registrar a denúncia: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close(); // fechar conexao
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denunciar Jogador</title>
</head>
<body>
    <h1>Denunciar Jogador</h1>
    <form action="denunciar.php" method="POST" enctype="multipart/form-data">
        <label for="denunciado">Nome do Jogador Denunciado:</label>
        <input type="text" id="denunciado" name="denunciado" required>

        <label for="descricao">Descrição da Denúncia:</label>
        <textarea name="descricao" required></textarea>

        <label for="imagem">Enviar Imagem:</label>
        <input type="file" name="imagem" accept="image/*">

        <input type="submit" value="Denunciar">
    </form>
</body>
</html>
