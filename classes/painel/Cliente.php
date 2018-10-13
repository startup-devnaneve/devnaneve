<?php

require_once "../conexao/Conexao.php";

class Cliente{

    /** Tabela */
    private $tabela = "cliente";

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
            $codigo_cid,
            $ativo_cli;

    /** Métodos Especiais */
    public function getNome_cli(){
        return $this->nome_cli;
    }
    public function setNome_cli($nome_cli){
        $this->nome_cli = $nome_cli;
    }
    
    public function getDataNascimento_cli(){
        return $this->datanascimento_cli;
    }
    public function setDataNascimento_cli($datanascimento_cli){
        $this->datanascimento_cli = $datanascimento_cli;
    }
    
    public function getTelefone_cli(){
        return $telefone_cli;
    }
    public function setTelefone_cli($telefone_cli){
        $this->telefone_cli = $telefone_cli;
    }
    
    public function getCelular_cli(){
        return $celular_cli;
    }
    public function setCelular_cli($celular_cli){
        $this->celular_cli = $celular_cli;
    }
    
    public function getEmail_cli(){
        return $this->email_cli;
    }
    public function setEmail_cli($email_cli){
        $this->email_cli = $email_cli;
    }
    
    public function getCpf_cli(){
        return $this->cpf_cli;
    }
    public function setCpf_cli($cpf_cli){
        $this->cpf_cli = $cpf_cli;
    }
    
    public function getRg_cli(){
        return $this->rg_cli;
    }
    public function setRg_cli($rg_cli){
        $this->rg_cli = $rg_cli;
    }
    
    public function getLogradouro_cli(){
        return $this->logradouro_cli;
    }
    public function setLogradouro_cli($logradouro_cli){
        $this->logradouro = $logradouro_cli;
    }
    
    public function getNumero_cli(){
        return $this->numero_cli;
    }
    public function setNumero_cli($numero_cli){
        $this->numero_ci = $numero_cli;
    }
    
    public function getBairro_cli(){
        return $this->bairro_cli;
    }
    public function setBairro_cli($bairro_cli){
        $this->bairro_cli = $bairro_cli;
    }
    
    public function getComplemento_cli(){
        return $this->complemento_cli;
    }
    public function setComplemento_cli($complemento_cli){
        $this->complemento_cli = $complemento_cli;
    }
    
    public function getCodigo_cid() {
        return $this->codigo_cid;
    }
    public function setCodigo_cid($codigo_cid) {
        $this->codigo_cid = $codigo_cid;
    }

    public function getAtivo_cli() {
        return $this->ativo_cli;
    }
    public function setAtivo_cli($ativo_cli){
        $this->ativo_cli = $ativo_cli;
    }

    /**
     * Função para inserir um novo cliente
     */
    public function inserir_cliente() {
        try {
            $query = "INSERT INTO $this->tabela(nome_cli, datanascimento_cli, telefone_cli, celular_cli, email_cli, cpf_cli, rg_cli, logradouro_cli, numero_cli, bairro_cli, complemento_cli, codigo_cid, ativo_cli)
                      VALUES(:nome_cli, :datanascimento_cli, :telefone_cli, :celular_cli, :email_cli, :cpf_cli, :rg_cli, :logradouro_cli, :numero_cli, :bairro_cli, :complemento_cli, :codigo_cid, :ativo_cli)";

            $stmt = DB::prepare($query);
            $stmt->bindParam(":nome_cli", $this->getNome_cli());
            $stmt->bindParam(":datanascimento_cli", $this->getDataNascimento_cli()());
            $stmt->bindParam(":telefone_cli", $this->getTelefone_cli());
            $stmt->bindParam(":celular_cli", $this->getCelular_fun());
            $stmt->bindParam(":email_cli", $this->getEmail_cli());
            $stmt->bindParam(":cpf_cli", $this->getCpf_cli());
            $stmt->bindParam(":rg_cli", $this->getRg_cli());
            $stmt->bindParam(":logradouro_cli", $this->getLogradouro_cli());
            $stmt->bindParam(":numero_cli", $this->getNumero_cli());
            $stmt->bindParam(":bairro_cli", $this->getBairro_cli());
            $stmt->bindParam(":complemento_cli", $this->getComplemento_cli());
            $stmt->bindParam(":codigo_cid", $this->getCodigo_cid());
            $stmt->bindParam(":ativo_cli", $this->getAtivo_cli());

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage(); 
        }
    }

    /**
     * Função para alterar um cliente
     */
    public function alterar_cliente($codigo_cli) {
        try {
            $query = "UPDATE $this->tabela 
                      SET nome_cli = :nome_cli, datanascimento_cli = :datanascimento_cli, telefone_cli = :telefone_cli, celular_cli = :celular_cli, email_cli = :email_cli, cpf_cli = :cpf_cli, rg_cli = :rg_cli, logradouro_cli = :logradouro_cli, numero_cli = :numero_cli, bairro_cli = :bairro_cli, complemento_cli = :complemento_cli, codigo_cid = :codigo_cid, ativo_cli = :ativo_cli
                      WHERE codigo_cli = :codigo_cli";

            $stmt = DB::prepare($query);
            $stmt->bindParam(":codigo_cli", $codigo_cli);
            $stmt->bindParam(":nome_cli", $this->getNome_cli());
            $stmt->bindParam(":datanascimento_cli", $this->getDataNascimento_cli()());
            $stmt->bindParam(":telefone_cli", $this->getTelefone_cli());
            $stmt->bindParam(":celular_cli", $this->getCelular_fun());
            $stmt->bindParam(":email_cli", $this->getEmail_cli());
            $stmt->bindParam(":cpf_cli", $this->getCpf_cli());
            $stmt->bindParam(":rg_cli", $this->getRg_cli());
            $stmt->bindParam(":logradouro_cli", $this->getLogradouro_cli());
            $stmt->bindParam(":numero_cli", $this->getNumero_cli());
            $stmt->bindParam(":bairro_cli", $this->getBairro_cli());
            $stmt->bindParam(":complemento_cli", $this->getComplemento_cli());
            $stmt->bindParam(":codigo_cid", $this->getCodigo_cid());
            $stmt->bindParam(":ativo_cli", $this->getAtivo_cli());

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage(); 
        }
    }

    /**
     * Função para inativar um cliente
     */
    public function inativar_cliente($codigo_cli) {
        try {
            $query = "UPDATE $this->tabela 
                      SET ativo_cli = 0
                      WHERE codigo_cli = :codigo_cli";

            $stmt = DB::prepare($query);
            $stmt->bindParam(":codigo_cli", $codigo_cli);
            
            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage(); 
        }
    }

    /**
     * Função para listar os clientes cadastrados
     */
    public function listar_clientes() {
        try {
            $query = "SELECT * FROM $this->tabela WHERE ativo_cli = 1";

            $stmt = DB::prepare($query);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage(); 
        }
    }

    /**
     * Função para buscar um cliente
     */
    public function buscar_cliente($codigo_cli) {
        try {
            $query = "SELECT * FROM $this->tabela WHERE codigo_cli = :codigo_cli AND ativo_cli = 1";

            $stmt = DB::prepare($query);        
            $stmt->bindParam(":codigo_cli", $codigo_cli);

            $stmt->execute();
            return $stmt->fetch();
        } catch(PDOException $e) {
            echo $e->getMessage(); 
        }
    }
    
}