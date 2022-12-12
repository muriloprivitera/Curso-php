<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="titulo">Excluir Registro #2</div>

<?php
    require_once('conexao.php');

    $conexao = novaConexao();

    if($_GET['excluir']){
        $sqlExcluir = 'DELETE FROM cadastro WHERE id = ?';
        $stmt = $conexao->prepare($sqlExcluir);
        $stmt->bind_param('i',$_GET['excluir']);
        $stmt->execute();
    }

    $sqlConsulta = "SELECT * FROM cadastro";

    $registros = array();

    $resultado = $conexao->query($sqlConsulta);

    if($resultado->num_rows > 0){
        while ($row = $resultado->fetch_assoc()) {
            $registros[] = $row;
        }
    }elseif($conexao->error){
        echo "Erro: {$conexao->error}";
    }
?>

<table class="table table-hover table-bordered">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Nascimento</th>
        <th>Site</th>
        <th>Filhos</th>
        <th>Salario</th>
        <th>Acoes</th>
    </thead>
    <tbody>
    <?php foreach($registros as $registro):?>
            <tr>
                <td><?=$registro['id']?></td>
                <td><?=$registro['nome']?></td>
                <td><?=$registro['email']?></td>
                <td><?=date('d/m/Y',strtotime($registro['nascimento']))?></td>
                <td><?=$registro['site']?></td>
                <td><?=$registro['filhos']?></td>
                <td><?=$registro['salario']?></td>
                <td><a href="exercicio.php?dir=db&file=excluir_2&excluir=<?=$registro['id']?>" class="btn btn-danger">Excluir</a></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>