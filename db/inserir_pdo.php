<div class="titulo">PDO:Inserir</div>

<?php
    require_once("conexao_pdo.php");

    $conexao = novaConexao();

    $sqlInserir = "INSERT INTO cadastro (nome,email,nascimento,site,filhos,salario)
                    VALUES(
                        'Murilo Privitera',
                        'muriloprivitera24@gmail.com',
                        '2000-02-28',
                        'http://murilop.com.br',
                        0,
                        3000
                    )";

    // print_r('<pre>');
    // print_r(get_class_methods($conexao));
    // print_r('</pre>');
    if($conexao->exec($sqlInserir)){
        $id = $conexao->lastInsertId();
        echo "Novo cadastro com ID {$id}.";
    }else{
        echo $conexao->errorCode()."<br>";
        print_r('<pre>');
        print_r($conexao->errorInfo());
        print_r('</pre>');
    }
?>