<?php
session_start();

if(isset($_POST['email'])){
    $email = $_POST['email'];
}else{
    $email = '';
}

if(isset($_POST['senha'])){
    $senha = $_POST['senha'];
}else{
    $senha = '';
}
$_SESSION['erros'] = null;
$_SESSION['usuario'] = '';
if(isset($email)){   
    $usuarios =[
        [
            "nome"=>'Admin',
            "email"=>'admin@admin.com',
            "senha"=>'admin'
        ],
        [
            "nome"=>'Murilo',
            "email"=>'muriloprivitera24@gmail.com',
            "senha"=>'admin'
        ]
    ];
    foreach($usuarios as $vlr_usuarios){
        $emailValido = $email === $vlr_usuarios['email'];
        $senhaValida = $senha === $vlr_usuarios['senha'];

        if($emailValido && $senhaValida){
            $_SESSION['erros'] = null;
            $_SESSION['usuario'] = $vlr_usuarios['nome'];
            $_SESSION['email'] = $vlr_usuarios['email'];
            $exp = time() + 60 * 60 * 24 * 30;

            setcookie('usuario', $vlr_usuarios['nome'], $exp);

            setcookie('email', $vlr_usuarios['email'], $exp);

            header('Location: index.php');
        }

        if(!$_SESSION['usuario'] ){
            $_SESSION['erros'] = ['Usuario/Senha invalido!'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <link rel="stylesheet" href="recursos/css/login.css">
    <title>Curso PHP</title>
</head>
<body class="login">
    <header class="cabecalho">
        <h1>Curso PHP</h1>
        <h2>Seja Bem Vindo</h2>
    </header>
    <nav class="navegacao">
        
    </nav>
    <main class="principal">
        <div class="conteudo">
           <h3>Identifique-se</h3>
           <?php if($_SESSION['erros']):?>
                <div class="erros">
                    <?php foreach ($_SESSION['erros'] as $erro) :?>
                        <p><?=$erro?></p>
                    <?php endforeach?>
                </div>
            <?php endif?>
            <form action="#" method="post">
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha">
                </div>
                <div>
                    <button>Entrar</button>
                </div>
            </form>
        </div>
    </main>
    <footer class="rodape">
        COD3R & ALUNOS © <?= date('Y'); ?>
    </footer>
</body>
</html>