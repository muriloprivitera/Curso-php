<div class="titulo">Include VS Require</div>

<?php
    echo 'Include de um arquivo errado nao gera fatal error</br>';
    include('arquivo_inexistente.php');
    echo 'Continua depois</br>';

    echo 'Require para sua aplicacao e retorna um fatal error</br>';
    require('arquivo inexistente.php');
    echo 'Nao continua';
?>