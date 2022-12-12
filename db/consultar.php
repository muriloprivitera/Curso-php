<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="titulo">Consultar Registro</div>

<?php
    require_once "conexao.php";

    $conexao = novaConexao();

    $sql = "SELECT * FROM cadastro";

    $resultado = $conexao->query($sql);

    $registros = array();

    if($resultado->num_rows > 0){
        while($row = $resultado->fetch_assoc()){
            $registros[] = $row;
        }
    }elseif($conexao->error){
        echo "Erro: {$conexao->error} ";
    }

?>

<table class="table table-hover table-bordered">
    <thead>
        <th>Nome</th>
        <th>Email</th>
        <th>Nascimento</th>
        <th>Site</th>
        <th>Filhos</th>
        <th>Salario</th>
    </thead>
    <tbody>
        <?php foreach($registros as $registro):?>
            <tr>
                <td><?=$registro['nome']?></td>
                <td><?=$registro['email']?></td>
                <td><?=date('d/m/Y',strtotime($registro['nascimento']))?></td>
                <td><?=$registro['site']?></td>
                <td><?=$registro['filhos']?></td>
                <td><?=$registro['salario']?></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>