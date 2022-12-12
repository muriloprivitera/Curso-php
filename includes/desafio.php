<div class="titulo">Desafio Require</div>
<?php
    require_once('Usuario.php');
    require_once('Pessoa.php');

    $obj = new Pessoa('Murilo','22');
    $obj->apresentar();
?>
