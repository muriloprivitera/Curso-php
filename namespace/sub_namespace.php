<?php namespace App; ?>

<div class="titulo">Sub - Namespace</div>

<?php
    // O ideal � que cada namespace seja o nome de cada pasta, otimo para organiza��o!
    // Como a classe � ideal declarar apenas um em cada arquivo.
    echo __NAMESPACE__ . '<br>';
    const constante = 123;

    namespace App\Principal;
    echo __NAMESPACE__ . '<br>';
    const constante = 234;

    namespace App\Principal\Especifico;
    echo __NAMESPACE__ . '<br>';
    const constante = 345;

    echo constante . '<br>';
    echo \App\constante . '<br>';
    echo \App\Principal\constante . '<br>';
    echo \App\Principal\Especifico\constante . '<br>';

?>