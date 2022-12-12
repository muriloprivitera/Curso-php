<div class="titulo">Require com Return</div>

<?php
$valorRetornado = require('return_usado.php');
echo "$valorRetornado</br>";
echo "$varReturn</br>";

echo __DIR__.'</br>'; // a variavel dir do php pega todo o diretorio do computador

$valorRetornado2 = require(__DIR__."/return_nao_usado.php");
var_dump($valorRetornado2);
echo "$valorRetornado2</br>";
echo "$varSemReturn</br>";
?>