<?php
    require_once('formulario/validacaoFormulario.php');
    require_once('conexao.php');
    require_once('alterar.php');

    $conexao = novaConexao();

    if($_GET['codigo']){
        $sqlConsutar = "SELECT * FROM cadastro WHERE id =?";

        $stmt = $conexao->prepare($sqlConsutar);

        $stmt->bind_param('i',$_GET['codigo']);

        if($stmt->execute()){
            $resultado = $stmt->get_result();

            if($resultado->num_rows > 0){
                $dados = $resultado->fetch_assoc();
            }
        }
    }
    print_r('<pre>');
    echo 'dados do select<br>';
    print_r($dados);
    print_r('</pre>');
    
    if(!$erros){
        $sql = "UPDATE cadastro 
        SET nome = ?,nascimento = ?,email = ?,site = ?,filhos = ?,salario = ? 
        WHERE id = ?
        ";
        $stmt = $conexao->prepare($sql);

        $dadosFomulario = [
            $dados['nome'],
            $data ? date('Y-m-d',strtotime($dados['nascimento'])) : null,
            $dados['email'],
            $dados['site'],
            $dados['filhos'],
            $dados['salario'],
            $dados['id'],
        ];
        $stmt->bind_param('ssssidi',...$dadosFomulario);
        if($stmt->execute()){
            unset($dados);
        }
    }
    print_r('<pre>');
    print_r($dadosFomulario);
    echo 'dados do request';
    print_r('</pre>');