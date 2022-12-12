<div class="titulo">Excluir Registros #1</div>


<?php
    require_once("conexao.php");

    $conexao = novaConexao();

    $sql = "DELETE FROM cadastro WHERE id = 1";

    $resultado = $conexao->query($sql);

    if($resultado){
        echo "Dado exluido com sucesso";
    }else{
        echo "Não foi possivel Excluir! Erro:<br>{$conexao->error}";
    }

?>