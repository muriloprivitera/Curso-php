<div class="titulo">Erros personalizados</div>

<?php
    class FaixaEtariaException extends Exception{
        public function __construct($message,$code=0,$previous=null)
        {
           parent::__construct($message,$code,$previous);
        }
    }
    function calcularTempoAposentadoria($idade){
        if($idade < 18 ){
            throw new FaixaEtariaException('Ainda esta muito longe');
        }
        if($idade > 70){
            throw new FaixaEtariaException('Ja deveria estar aposentado');
        }
        if($idade == 70){
            throw new FaixaEtariaException('Esse ano aposenta');
        }

        return 70 - $idade;
    }

    $idades = [15,35,60,80,70];

    foreach($idades as $vlr_idade){
        print_r('<pre>');
        print_r($vlr_idade);
        print_r('</pre>');
        try{
            $tempoRestante = calcularTempoAposentadoria($vlr_idade);
            echo "idade:$vlr_idade, $tempoRestante anos restantes<br>";
        }catch(FaixaEtariaException $e){
            echo "Nao foi possivel calcular para $vlr_idade anos.<br>";
            echo "Motivo:".$e->getMessage();
        }
    }
?>