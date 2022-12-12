<?php namespace Outro\Nome;?>
<div class="titulo">Use/As</div>

<?php
// com use/as posso mudar o nome para pode usar uma variavel/constante ou alguma função caso aja conflito
echo __NAMESPACE__. '<br>';

const constante = 123;

function soma ($a,$b){
    return $a.$b;
}

class Classe {
    public $var;
    function func(){
        return __NAMESPACE__ . ' -> '. __CLASS__ . ' -> '. __METHOD__ . '<br>';
    }
}


echo \Nome\Bem\Grande\constante. '<br>';

use Nome\Bem\Grande as ctx;
echo soma(1,2);
echo ctx\soma(1,2);
?>