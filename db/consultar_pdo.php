<div class="titulo">PDO:Consultar</div>

<?php
    require_once("conexao_pdo.php");

    $conexao = novaConexao();

    $sql = "SELECT * FROM cadastro";

    $resultado = $conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    print_r('<pre>');
    print_r($resultado);
    print_r('</pre>');

    echo "<hr>";

    $sql = "SELECT * FROM cadastro LIMIT :qtde OFFSET :inicio";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':qtde',2,PDO::PARAM_INT);
    $stmt->bindValue(':inicio',3,PDO::PARAM_INT);

    // print_r('<pre>');
    // print_r(get_class_methods($stmt));
    // print_r('</pre>');

    if($stmt->execute()){
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r('<pre>');
        print_r($resultado);
        print_r('</pre>');
    }else{
        echo "Erro:". $stmt->errorCode() . "<br>";
        print_r('<pre>');
        print_r($stmt->errorInfo());
        print_r('</pre>');
    }

    // try {
    //     $stmt->execute();
    //     $resultado = $stmt->fetchAll();
    //     print_r('<pre>');
    //     print_r($resultado);
    //     print_r('</pre>'); 
    // } catch (Exception $e) {
    //     echo "Error: ". $e->getMessage();
    // }

    echo "<hr>";

    $sql = "SELECT * FROM cadastro WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':id',8);
    // fica a criteiro passar o 3 parametro nesse caso, pois o id pode ser ums string ou um int;

    if($stmt->execute()){
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r('<pre>');
        print_r($resultado);
        print_r('</pre>');
    }else{
        echo "Erro:". $stmt->errorCode() . "<br>";
        print_r('<pre>');
        print_r($stmt->errorInfo());
        print_r('</pre>');
    }
?>