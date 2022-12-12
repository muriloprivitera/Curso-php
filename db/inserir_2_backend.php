<?php
    require_once('formulario/validacaoFormulario.php');
    require_once('conexao.php');
    require_once('inserir_registro_2.php');

    $conexao = novaConexao();
    // $erros = [];

    if(!$erros){

        $sql = "INSERT INTO cadastro(
            nome,nascimento,email,site,filhos,salario
        )VALUES(?,?,?,?,?,?)";
        $stmt = $conexao->prepare($sql);

        $dadosFomulario = [
            $dados['nome'],
            $data ? date('Y-m-d',strtotime($dados['nascimento'])) : null,
            $dados['email'],
            $dados['site'],
            $dados['filhos'],
            $dados['salario'],
        ];

        $stmt->bind_param('ssssid',...$dadosFomulario);
        // $stmt->execute();

        if($stmt->execute()){
            unset($dados);
        }

    }
    
?>