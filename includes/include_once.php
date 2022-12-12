<div class="titulo">Include once</div>

<?php
include('include_once_arquivo.php');
require('include_once_arquivo.php');

echo "Variavel = {$variavel}.<br>";
$variavel = "Variavel alterada";
echo "Variavel = {$variavel}.<br>";

include_once('include_once_arquivo.php');
echo "Variavel = {$variavel}.<br>";

require_once('include_once_arquivo.php');
echo "Variavel = {$variavel}.<br>";
?>