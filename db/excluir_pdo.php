<div class="titulo">PDO:Excluir</div>

<?php
    require_once("conexao_pdo.php");

    $conexao = novaConexao();

    $sql = "DELETE FROM cadastro WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(":id",11);

    if($stmt->execute()){
        echo "Exclusao efetuada com sucesso do cadastro";
    }else{
        echo 'Erro: ' . $stmt->errorCode() . "<br>";
        print_r('<pre>');
        print_r($stmt->errorInfo());
        print_r('</pre>');
    }
?>