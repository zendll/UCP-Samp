<?php
session_start();
require 'config.php'; 

$error = "";//var de erro

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nick = isset($_POST['Nome']) ? $_POST['Nome'] : '';
    $senha = isset($_POST['Senha']) ? $_POST['Senha'] : '';

    // SELECIONAR O BGLH NO BANCO DE DADOS
    $stmt = $conn->prepare("SELECT * FROM contas WHERE Nome = ?");
    $stmt->bind_param("s", $nick);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) { // VERIFICAR SE EXISTE
        if ($senha === $user['Senha']) {
            $_SESSION['user_id'] = $user['ID'];
            header("Location: ../index.php");
            exit();
        } else {
            $error = "Senha incorreta.";
        }
    } else {
        $error = "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
</head>
<body>
    <div class="main">
        <h1>Bem-vindo ao UCP</h1>
        <h3>Insira suas credenciais de login</h3>
        <form action="login.php" method="POST">
            <label for="Nome">Usuário:</label>
            <input type="text" id="Nome" name="Nome" placeholder="Digite seu usuário" required>

            <label for="Senha">Senha:</label>
            <input type="password" id="Senha" name="Senha" placeholder="Digite sua senha" required>

            <div class="wrap">
                <button type="submit">Entrar</button>
            </div>
        </form>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <p>Não registrado? <a href="register.php" style="text-decoration: none;">Crie uma conta</a></p>
    </div>
</body>
</html>
