<div class="titulo">Sessao #1</div>

<?php
// if(!session_start()){
//     session_start();
// }

if(!$_SESSION['nome']){
    $_SESSION['nome'] = 'Murilo';
}
if(!$_SESSION['email']){
    $_SESSION['email'] = 'muriloprivitera24@gmail.com';
}
print_r('<pre>');
print_r($_SESSION);
print_r('</pre>');
?>

<p>
    <a href="/curso-php/sessao_cookies/sessao_alterar.php">
        Alterar sessao
    </a>
</p>