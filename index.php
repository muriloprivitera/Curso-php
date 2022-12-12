<?php
require_once('sessao_usuario.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <title>Curso PHP</title>
</head>
<body>
    <header class="cabecalho">
        <h1>Curso PHP</h1>
        <h2>Indice dos Exercícios</h2>
    </header>
    <nav class="navegacao">
        <span class="usuario">Usuario:<?=$_SESSION['usuario']?></span>
        <span class="usuario">Email:<?=$_SESSION['email']?></span>
        <a href="logout.php">Sair</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
           <?php require_once('menu.php');?>
        </div>
    </main>
    <footer class="rodape">
        COD3R & ALUNOS © <?= date('Y'); ?>
    </footer>
</body>
</html>