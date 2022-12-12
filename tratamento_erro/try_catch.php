<div class="titulo">Try/Catch</div>

<?php

    try{
        echo intdiv(7,0);
    }catch(Error $e){
        echo 'Teve um erro aqui </br>';
    }

    try{
        throw new Exception('Erro de conexao ocorreu');
        echo intdiv(7,0);

    }catch(Exception $e){
        echo 'Erro encontrado:'.$e->getMessage().'<br>Codigo do erro:'.$e->getCode();
        print_r('<pre>');
        print_r($e);
        print_r('</pre>');
    } finally{
        echo " Esse bloco finally, independente de cair em um catch sempre sera executado.";
    }
?>