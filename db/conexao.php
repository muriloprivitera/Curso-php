<?php
    function novaConexao($banco='curso_php'){
        $servidor = '127.0.0.1';
        $usuario = 'root';
        $senha = '';

        $conexao = new mysqli($servidor,$usuario,$senha,$banco);


        if($conexao->connect_error){
            echo "Erro:{$conexao->connect_error}";
        }else{
            return $conexao;
        }
        // try {   
        //     return $conexao;
        // } catch (Exception $e) {
        //     echo "Erro:{$conexao->connect_error}";
        // }
    }

?>