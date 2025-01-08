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
    header("Location: ../../index.php");
    exit();
}
$stmt = $conn->prepare("SELECT * FROM contas");
$stmt->execute();
$result = $stmt->get_result();
$contas = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas</title>
    <link rel="stylesheet" href="../scss/main.css">
</head>
<body>
    <div class="container">
        <h1 class="header">Contas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Dinheiro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contas as $conta): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($conta['ID']); ?></td>
                        <td><?php echo htmlspecialchars($conta['Nome']); ?></td>
                        <td>R$ <?php echo number_format(htmlspecialchars($conta['Dinheiro']), 0, ',', '.'); ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo htmlspecialchars($conta['ID']); ?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
