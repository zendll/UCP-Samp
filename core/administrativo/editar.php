<?php
session_start();
require '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
$userId = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM contas WHERE ID = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user || $user['Admin'] <= 0) {
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $contaId = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM contas WHERE ID = ?");
    $stmt->bind_param("i", $contaId);
    $stmt->execute();
    $result = $stmt->get_result();
    $conta = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $novoNome = $_POST['nome'];
        $novoDinheiro = $_POST['dinheiro'];
        $novoLevel = $_POST['level'];
        $novoOuro = $_POST['ouro'];

        $stmt = $conn->prepare("UPDATE contas SET Nome = ?, Dinheiro = ?, Level = ?, Ouro = ? WHERE ID = ?");
        $stmt->bind_param("siiii", $novoNome, $novoDinheiro, $novoLevel, $novoOuro, $contaId);
        $stmt->execute();

        header("Location: contas.php");
        exit();
    }
} else {
    header("Location: contas.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta</title>
    <link rel="stylesheet" href="../scss/main.css">
</head>
<body>
    <div class="container">
        <h1 class="header">Editar Conta de <?php echo htmlspecialchars($conta['Nome']); ?></h1>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($conta['Nome']); ?>" required>

            <label for="dinheiro">Dinheiro:</label>
            <input type="number" name="dinheiro" value="<?php echo htmlspecialchars($conta['Dinheiro']); ?>" required>

            <label for="level">Nível:</label>
            <input type="number" name="level" value="<?php echo htmlspecialchars($conta['Level']); ?>" required>

            <label for="ouro">Ouro:</label>
            <input type="number" name="ouro" value="<?php echo htmlspecialchars($conta['Ouro']); ?>" required>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>