<?php
    require_once('Usuario.php');
    class Pessoa extends Usuario{
        public $nome;
        public $idade;

        function __construct($nome, $idade) {
            $this->nome = $nome;
            $this->idade = $idade;
            echo 'Pessoa Criada! <br>';
        }

        function __destruct() {
            echo 'Pessoa diz: Tchau!!';
        }

        public function apresentar() {
            echo "{$this->nome}, {$this->idade} anos<br>";
        }
    }

?>