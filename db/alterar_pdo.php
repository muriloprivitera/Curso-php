<div class="titulo">PDO:Alterar</div>


<?php
    require_once("conexao_pdo.php");

    $conexao = novaConexao();

    $sql = "UPDATE cadastro 
    SET nome = :nome, nascimento = :nascimento, email = :email, site= :site, filhos = :filhos, salario = :salario 
    WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':nome','Alice Privitera',PDO::PARAM_STR);
    $stmt->bindValue(':nascimento','2025-06-30',PDO::PARAM_STR);
    $stmt->bindValue(':email','aliceprivitera@gmail.com',PDO::PARAM_STR);
    $stmt->bindValue(':site','http://meusite.com.br',PDO::PARAM_STR);
    $stmt->bindValue(':filhos',0,PDO::PARAM_INT);
    $stmt->bindValue(':salario',600,PDO::PARAM_INT);
    $stmt->bindValue(':id',12,PDO::PARAM_INT);

    if($stmt->execute()){
        echo "Cadastro alterado com sucesso";
    }else{
        echo "Erro:". $stmt->errorCode() . "<br>";
        print_r('<pre>');
        print_r($stmt->errorInfo());
        print_r('</pre>');
    }
?>