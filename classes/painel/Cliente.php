<?php

class Cliente{

    /**Atributos */
    private $codigo_cli,
            $nome_cli,
            $datanascimento_cli,
            $telefone_cli,
            $celular_cli,
            $email_cli,
            $cpf_cli,
            $rg_cli,
            $logradouro_cli,
            $numero_cli,
            $bairro_cli,
            $complemento_cli,
            $ativo_cli;

    function setNome_cli($nome_cli){
        $this->nome_cli = $nome_cli;
    }
    function getNome_cli(){
        return this->nome_cli;
    }




}

?>