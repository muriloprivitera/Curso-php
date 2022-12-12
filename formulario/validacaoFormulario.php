<?php
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
    }
?>