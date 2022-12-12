<div class="titulo">Gerenciando Sessao</div>

<?php
// Serve para cuidar da sua sessao
// if(!session_start()){
//     session_start();
// }

echo "Esse e o ID da minha sessao:". session_id();

$contador = &$_SESSION['contador'];
$contador = $contador ? $contador + 1 : 1;
echo '<br>'. $contador;
echo '<br>'. $_SESSION['contador'];

if($_SESSION['contador']%5===0){
    session_regenerate_id();
}

if($_SESSION['contador']>=5){
    session_destroy();
}

?>