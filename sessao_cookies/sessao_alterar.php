<?php
session_start();
print_r('<pre>');
print_r($_SESSION);
print_r('</pre>');
?>
<?php
$_SESSION['email'] = 'teste@email.com'
?>
<p>
    <b>Nome:</b><?= $_SESSION['nome']?></br>
    <b>Email:</b><?=$_SESSION['email']?>
</p>

<p>
    <a href="/curso-php/sessao_cookies/sessao.php">Voltar</a>
</p>
<p>
    <a href="/curso-php/sessao_cookies/sessao_limpar.php">Limpar Sessao</a>
</p>