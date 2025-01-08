<?php
session_start();
require 'config.php';

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

if (!$user) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="../scss/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<div class="sidebar">
    <ul id="leftside-navigation">
        <li><a href="#"><i class="fa fa-home"></i>  Início</a></li>
        <li><a href="#"><i class="fa fa-cog"></i>  Configurações</a></li>
        <li><a href="../denuncias/denunciar.php"><i class="fa fa-exclamation-triangle"></i>  Denunciar</a></li>
        <li><a href="logout.php"><i class="fa fa-exclamation-triangle"></i>  Sair</a></li>
        <?php if ($user['Admin'] > 0): ?>
            <li><a href="administrativo/contas.php"><i class="fa fa-users"></i>Contas(Somente Admin)</a></li>
            <li><a href="../denuncias/ver_denuncias.php"><i class="fa fa-users"></i>Ver Denuncias(Somente Admin)</a></li>
        <?php endif; ?>
    </ul>
</div>
<div class="container">
    <h1 class="header">Bem-vindo, <?php echo htmlspecialchars($user['Nome']); ?>!</h1>

    <?php if ($user['Admin'] == 1342): ?>
        <h2 style="color: pink;">Administrador</h2>
    <?php endif; ?>

    <div class="skin-wrapper">
        <?php
        $skinId = htmlspecialchars($user['Skin']);
        $imageUrl = "http://weedarr.wikidot.com/local--files/skinlistc/{$skinId}.png"; 
        ?>
        <img src="<?php echo $imageUrl; ?>" alt="Skin do jogador" class="skin-image" onerror="this.onerror=null; this.src='path/to/default-image.png';">
    </div>

    <div class="user-info">
    <div class="user-card">
        <i class="a-solid fa-money-bill" aria-hidden="true"></i>
        <p><strong>Dinheiro:</strong> R$ <?php echo number_format(htmlspecialchars($user['Dinheiro']), 0, ',', '.'); ?></p>
    </div>
    <div class="user-card">
        <i class="fa-solid fa-user-minus" aria-hidden="true"></i>
        <p><strong>Nível:</strong> <?php echo htmlspecialchars($user['Level']); ?></p>
    </div>
    <div class="user-card">
        <i class="fa fa-gem" aria-hidden="true"></i>
        <p><strong>Ouro:</strong> <?php echo htmlspecialchars($user['Ouro']); ?></p>
    </div>
    <div class="user-card">
        <i class="fa fa-star" aria-hidden="true"></i>
        <p><strong>VIP:</strong> <?php echo $user['VIP'] ? 'Sim' : 'Não'; ?></p>
    </div>
    <div class="user-card">
        <i class="fa fa-clock" aria-hidden="true"></i>
        <p><strong>Horas Jogadas:</strong> <?php echo htmlspecialchars($user['HorasJogadas']); ?></p>
    </div>
</div>

<script>
$("#leftside-navigation .sub-menu > a").click(function(e) {
    $("#leftside-navigation ul ul").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),
    e.stopPropagation()
});
</script>
</body>
</html>
