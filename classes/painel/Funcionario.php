<?php

class Funcionario {
    
    /** Atributos */
    private $nome_fun,
            $email_fun,
            $senha_fun,
            $codigo_gru,
            $codigo_est,
            $ativo_fun;

    /** Métodos Especiais */
    function setNome_fun() {
        return $this->nome_fun;
    }
    function getNome_fun($nome_fun) {
        $this->nome_fun = $nome_fun;
    }

    function getEmail_fun() {
        return $this->email_fun;
    }
    function setEmail_fun($email_fun) {
        $this->email_fun = $email_fun;
    }

    function getSenha_fun() {
        return $this->senha_fun;
    }
    function setSenha_fun($senha_fun) {
        $this->senha_fun = $senha_fun;
    }

    function getCodigo_gru() {
        return $this->codigo_gru;
    }
    function setCodigo_gru($codigo_gru) {
        $this->codigo_gru = $codigo_gru;
    }

    function getCodigo_est() {
        return $this->codigo_gru;
    }
    function setCodigo_est($codigo_est) {
        $this->codigo_est = $codigo_est;
    }

    function getAtivo_fun() {
        return $this->ativo_fun;
    }
    function setAtivo_fun($ativo_fun) {
        $this->ativo_fun = $ativo_fun;
    }

    /** 
     * Função para inserir um novo funcionário 
     * @param $nome_fun, $email_fun, $senha_fun, $codigo_gru, $codigo_est, $ativo_fun
     * */
    public function inserir_funcionario() {
        require_once("../conexao/Conexao.php");

        try {
            $pdo->exec('SET NAMES UTF8');
            
            $query = "INSERT INTO funcionario(nome_fun, email_fun, senha_fun, codigo_gru, codigo_est, ativo_fun) 
                      VALUES(:nome_fun, :email_fun, :senha_fun, :codigo_gru, :codigo_est, :ativo_fun)";

            $parametros = array(
                ":nome_fun"   => $this->nome_fun,
                ":email_fun"  => $this->email_fun,
                ":senha_fun"  => $this->senha_fun,
                ":codigo_gru" => $this->codigo_gru,
                ":codigo_est" => $this->codigo_est,
                ":ativo_fun"  => 1
            );

            $stmt = $pdo->prepare($query);
            $stmt->execute($parametros);

            $pdo = null;
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;                
        }
    }

}
