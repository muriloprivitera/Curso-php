<div class="titulo">Inserir Registro</div>

<?php

require_once "conexao.php";

$sql = "INSERT INTO cadastro(
    nome,nascimento,email,site,filhos,salario)
    VALUES(
        'Pedro Privitera',
        '2025-06-30',
        'pedropaulo@gmail.com',
        'https://outlook.com.br',
        0,
        130.97
    )
";

$conexao = novaConexao();

$resultado = $conexao->query($sql);

if($resultado){
    echo "Dado Inserido com sucesso";
}else{
    echo "Nao foi possivel inserir! Erro:<br>{$conexao->error}";
}

?>