<?php namespace contexto;

use const outro_contexto\constante3;

?>

<div class="tiulo">Exemplo Basico</div>

<?php
 // O namespace é usado para separar o seu codigo voce pode definir o seu namespace com o nome da sua pasta e todo codigo gerado aqui so é utulizado aqui!
 // Ao declarar o namespace deve se iniciar com o tal ou declarar antes
 echo __NAMESPACE__.'<br>';
 const contante1 = 123;// declarando uma constante que ira exixtir somente nesse namespace
 define('contexto\constante2',234);// declarando um constante dentro do namespace
 define(__NAMESPACE__.'\constante3',345);//aqui para pegar o nome do namespace atual
 define('outro_contexto\constante3',345);//aqui serve para declarar um constante em outro namespace

 echo contante1 .'<br>';
 echo constante2 .'<br>';
//  echo constante3 .'<br>'; aqui nao ira funcionar pois esta declarado em outro namespace
// echo \contexto\constante3 .'<br>';
?>