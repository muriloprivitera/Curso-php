<?php
require_once('validacaoFormulario.php');
error_reporting(E_ERROR | E_PARSE);
//Outra possibilidade de exibir os erros seria:
// foreach($erros as $erro){
    // e exibindo a baixo a div com o erro correspondente
// }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h2>Cadastro</h2>
    <form action="formulario/formularioFinal.php" method="post">
        <div class="row">
            <div class="col-sm-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control <?=$erros['nome'] ? 'is-invalid':'' ?>" id="nome" name="nome" placeholder="Nome" value="<?=$_POST['nome']?>">
                <div class="invalid-feedback">
                    <?= $erros['nome']?>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="nascimento">Nascimento</label>
                <input type="date" class="form-control <?=$erros['nascimento'] ? 'is-invalid':'' ?> <?=$erros['nascimentoData'] ? 'is-invalid':'' ?>" id="nascimento" name="nascimento" placeholder="Nascimento" value="<?=$_POST['nascimento']?>">
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
                <input type="email" class="form-control <?=$erros['email'] ? 'is-invalid':'' ?>" id="email" name="email" placeholder="E-mail" value="<?=$_POST['email']?>" >
                <div class="invalid-feedback">
                    <?= $erros['email']?>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="site">Site</label>
                <input type="text" class="form-control <?=$erros['site'] ? 'is-invalid':'' ?>" id="site" name="site" placeholder="Site" value="<?=$_POST['site']?>">
                <div class="invalid-feedback">
                    <?= $erros['site']?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div>Possui filhos?</div>
                <label for="filhos_s">Sim</label>
                <input type="radio" id="filhos_s" name="filho-pergunta" value="sim"<?php if($_POST['filho-pergunta']=='sim'){print 'checked';}?>>
                <label for="filhos_n">Nao</label>
                <input type="radio" id="filhos_n" name="filho-pergunta" value="nao" <?php if(!$_POST['filho-pergunta']||$_POST['filho-pergunta']=='nao'){print 'checked';}?>
                <input type="hidden" id="radio-hidden" value="<?=$_POST['filho-pergunta']?>" >
            </div>
            <div class="col-sm-4">
                <label for="filhos">Qtde de Filhos</label>
                <input type="number" class="form-control <?=$erros['filhos'] ? 'is-invalid':'' ?>" id="filhos" name="filhos" placeholder="Qtde de Filhos" value="<?=$_POST['filhos']?>">
                <div class="invalid-feedback">
                    <?= $erros['filhos']?>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="salario">Salario</label>
                <input type="number" class="form-control <?=$erros['salario'] ? 'is-invalid':'' ?>" id="salario" name="salario" placeholder="Salario" value="<?=$_POST['salario']?>">
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
