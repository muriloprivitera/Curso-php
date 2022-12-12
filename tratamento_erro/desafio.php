<div class="titulo">Desafio</div>

<?php
 function calculaDivisao($a,$b){
   $result = $a / $b;

   if($b === 0){
      throw new Exception('Nao é possivel dividir por 0');
   }
   if(!is_int($result)){
      throw new Exception('O seu resultado nao e um inteiro, Por favor tente novamente');
   }
   return $result;
 }


 try{
    calculaDivisao(8,2);
    echo 'Tudo certo </br>';
 }catch(Exception $e){
    echo $e->getMessage();
 }
 try{
    calculaDivisao(8,3);
   //  echo 'Tudo certo </br>';
 }catch(Exception $e){
    echo $e->getMessage().'</br>';
 }
 try{
   calculaDivisao(8,0);
 }catch(DivisionByZeroError $e){
    echo 'Divisao por zero';
 }
 
?>