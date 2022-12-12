<div class="titulo">Criar Banco</div>

<?php
    require_once("conexao.php");

    $conexao = novaConexao();

    $sql = "CREATE DATABASE curso_php";

    $resultado = $conexao->query($sql);

    if($resultado){
        echo "Banco criado com sucesso";
    }else{
        echo "Nao foi possivel criar! Erro:<br>{$conexao->error}";
    }

    // $conexao->close();
?>