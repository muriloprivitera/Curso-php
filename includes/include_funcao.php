<div class="titulo">Include Funcao</div>
<?php
    function carregaArquivo(){
        include ('include_arquivo.php');

        echo '</br>'.$var.'</br>';
        echo soma('1','9');
    }
    carregaArquivo();
    //O include dentro da funcao so � possivel acessar dentro da fun��o.
?>