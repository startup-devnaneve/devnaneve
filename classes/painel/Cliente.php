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


            /**GETS SET
             * 
             * verificar se esta ativo um cliente 
             * usar a função isAtivo();
             */
    function setNome_cli($nome_cli){
        $this->nome_cli = $nome_cli;
    }
    function getNome_cli(){
        return $this->nome_cli;
    }
    function setDataNascimento_cli($datanascimento_cli){
        $this->datanascimento_cli = $datanascimento_cli;
    }
    function getDataNascimento(){
        return $this->datanascimento_cli;
    }
    function setTelefone_cli($telefone_cli){
        $this->telefone_cli = $telefone_cli;
    }
    function getTelefone_cli(){
        return $telefone_cli;
    }
    function setCelular_cli($celular_cli){
        $this->celular_cli= $celular_cli;

    }
    function getCelular_cli(){
        return $celular_cli;
    }
    function setEmail_cli($email_cli){
        $this->email_cli = $email_cli;

    }
    function getEmail_cli(){
        return $this->email_cli;

    }
    function setCpf_cli($cpf_cli){
        $this->cpf_cli=$cpf_cli;

    }
    function getCpf_cli(){
        return $this->cpf_cli;

    }
    function setRg_cli(`$rg_cli){
        $this->rg_cli = $rg_cli;

    }
    function getRg_cli(){
        return $this->rg_cli;
    }
    function setLogradouro_cli($logradouro_cli){
        $this->logradouro = $logradouro_cli;

    }
    function getLogradouro_cli(){
        return $this->logradouro_cli;

    }
    function setNumero_cli($numero_cli){
        $this->numero_ci = $numero_cli;

    }
    function getNumero_cli(){
        return $this->numero_cli;
    }
    function setBairro_cli($bairro_cli){
        $this->bairro_cli = $bairro_cli;

    }
    function getBairro_cli(){
        return $this->bairro_cli;

    }
    function setComplemento_cli($complemento_cli){
        $this->complemento_cli = $complemento_cli;
    }
    function getComplemento_cli(){
        return $this->complemento_cli;

    }
    function setAtivo_cli($ativo_cli){
        $this->ativo_cli = $ativo_cli;
    }
    function isAtivo(){
        return $ativo_cli;
    }



}

?>