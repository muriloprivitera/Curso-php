<?php
    // require_once('formulario/validacaoFormulario.php');
    require_once('conexao.php');
    // require_once('alterar_backend.php');
    error_reporting(E_ERROR | E_PARSE);
    $conexao = novaConexao();
    if($_GET['codigo']){
        $sqlConsutar = "SELECT nome,nascimento,email,site,filhos,salario,id FROM cadastro WHERE id =?";

        $stmt = $conexao->prepare($sqlConsutar);

        $stmt->bind_param('i',$_GET['codigo']);

        if($stmt->execute()){
            $resultado = $stmt->get_result();

            if($resultado->num_rows > 0){
                $dados = $resultado->fetch_assoc();
                if($dados['salario']){
                    $dados['salario'] = str_replace(".",",",$dados['salario']);
                }
                if($dados['nascimento']){
                    $dados['nascimento'] = date('Y-m-d',strtotime($dados['nascimento']));
                }
            }else{
                $mensagem = 'Nao temos resultados para esse ID informado';
            }
        }
    }

    if(count($_POST)>0){
        $dados = $_POST;
        $erros = [];

        if(trim($dados['nome']) === ""){
            $erros['nome'] = "Campo Nome e obrigatorio!";
        }
        if($dados['nascimento'] === ""){
            $erros['nascimento'] = "Campo Nascimento e obrigatorio!";
        }
        if(isset($dados['nascimento'])){
            $data = date('d-m-Y',strtotime($dados['nascimento']));
            if(!$data){
                $erros['nascimentoData'] = "Data deve estar no formato padrao dd/mm/aaaa";
            }
        }
        if($dados['email']===""){
            $erros['email'] = "Campo Email e obrigatorio!";
        }
        if(!filter_var($dados['site'],FILTER_VALIDATE_URL)){
            $erros['site'] = "Site invalido!";
        }
        $filhosConfig = array(
            "options"=>array(
                'min_range'=>0,"max_range"=>20
            )
        );

        if(!filter_var($dados['filhos'],FILTER_VALIDATE_INT,$filhosConfig) && $dados['filhos'] !=0){
            $erros['filhos'] = 'Quantidade de filhos invalida.';
        }

        $salarioConfig = array(
            "options"=>array(
                'decimal'=>','
            )
        );

        if(!filter_var($dados['salario'],FILTER_VALIDATE_FLOAT,$salarioConfig)){
            $erros['salario'] = 'Por favor inserir um salario valido.';
        }

        if(!count($erros)){
            $sql = "UPDATE cadastro 
            SET nome = ?, nascimento = ?, email = ?, site = ?, filhos = ?, salario = ? 
            WHERE id = ?
            ";
            $stmt = $conexao->prepare($sql);
            
            $params = [
                $dados['nome'],
                $data ? date('Y-m-d',strtotime($dados['nascimento'])) : null,
                $dados['email'],
                $dados['site'],
                $dados['filhos'],
                $dados['salario'] ? str_replace(".",",",$dados['salario']) : null,
                $dados['id'],
            ];
            
            $stmt->bind_param('ssssidi',...$params);
            if($stmt->execute()){
                unset($dados);
            }
        }
    }


    
?>
<div class="titulo">Alterar Registro</div>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="./exercicio.php" method="get">
        <input type="hidden" name="dir" value="db">
        <input type="hidden" name="file" value="alterar">
        <div class="form-grup row">
            <div class="col-sm-10">
                <input class="form-control <?=$mensagem ? 'is-invalid':'' ?>" type="number" name="codigo" value="<?=$_GET['codigo']?>" placeholder="Informe o ID para consultar">
                <div class="invalid-feedback">
                    <?= $mensagem?>
                </div>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-success mb-4">Consultar</button>
            </div>
        </div>
        
    </form>
    <form action="#" method="post">
        <input type="hidden" name="id" value="<?=$dados['id']?>">
        <div class="row">
            <div class="col-sm-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control <?=$erros['nome'] ? 'is-invalid':'' ?>" id="nome" name="nome" placeholder="Nome" value="<?=$dados['nome']?>">
                <div class="invalid-feedback">
                    <?= $erros['nome']?>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="nascimento">Nascimento</label>
                <input type="date" class="form-control <?=$erros['nascimento'] ? 'is-invalid':'' ?> <?=$erros['nascimentoData'] ? 'is-invalid':'' ?>" id="nascimento" name="nascimento" placeholder="Nascimento" value="<?=$dados['nascimento']?>">
                <div class="invalid-feedback">
                    <?= $erros['nascimento']?>
                </div>
                <div class="invalid-feedback">
                    <?= $erros['nascimentoData']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="email">E-mail</label>
                <input type="email" class="form-control <?=$erros['email'] ? 'is-invalid':'' ?>" id="email" name="email" placeholder="E-mail" value="<?=$dados['email']?>" >
                <div class="invalid-feedback">
                    <?= $erros['email']?>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="site">Site</label>
                <input type="text" class="form-control <?=$erros['site'] ? 'is-invalid':'' ?>" id="site" name="site" placeholder="Site" value="<?=$dados['site']?>">
                <div class="invalid-feedback">
                    <?= $erros['site']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div>Possui filhos?</div>
                <label for="filhos_s">Sim</label>
                <input type="radio" id="filhos_s" name="filho-pergunta" value="sim"<?php if($dados['filho-pergunta']=='sim'){print 'checked';}?>>
                <label for="filhos_n">Nao</label>
                <input type="radio" id="filhos_n" name="filho-pergunta" value="nao" <?php if(!$dados['filho-pergunta']||$dados['filho-pergunta']=='nao'){print 'checked';}?>
                <input type="hidden" id="radio-hidden" value="<?=$dados['filho-pergunta']?>" >
            </div>
            <div class="col-sm-4">
                <label for="filhos">Qtde de Filhos</label>
                <input type="number" class="form-control <?=$erros['filhos'] ? 'is-invalid':'' ?>" id="filhos" name="filhos" placeholder="Qtde de Filhos" value="<?=$dados['filhos']?>">
                <div class="invalid-feedback">
                    <?= $erros['filhos']?>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="salario">Salario</label>
                <input type="number" class="form-control <?=$erros['salario'] ? 'is-invalid':'' ?>" id="salario" name="salario" placeholder="Salario" value="<?=$dados['salario']?>">
                <div class="invalid-feedback">
                    <?= $erros['salario']?>
                </div>
            </div>
        </div>
        <br>
        <button class="btn btn-success btn-lg">Enviar</button>
    </form>
</body>
</html>