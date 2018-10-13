<?php

class Funcionario {
    
    /** Atributos */
    private $codigo_fun,
            $nome_fun,
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

    /**
     * Função para realizar a alteração dos dados de um funcionário
     * @param $codigo_fun, $nome_fun, $email_fun, $senha_fun, $codigo_gru, $codigo_est, $ativo_fun
     */
    public function alterar_funcionario() {
        require_once("../conexao/Conexao.php");

        try {
            $pdo->exec('SET NAMES UTF8');
            
            $query = "UPDATE funcionario 
                      SET nome_fun = :nome_fun, email_fun = :email_fun, senha_fun = :senha_fun, codigo_gru = :codigo_gru, codigo_est = :codigo_est 
                      WHERE codigo_fun = :codigo_fun";

            $parametros = array(
                ":codigo_fun" => $this->codigo_fun,
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

    /**
     * Função para inativar um funcionário
     * @param $codigo_fun
     */
    public function inativar_funcionario() {
        require_once("../conexao/Conexao.php");

        try {
            $query = "UPDATE funcionario SET ativo_fun = 0 WHERE codigo_fun = :codigo_fun";

            $paramentros = array(
                "codigo_fun" => $this->codigo_fun
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

    /**
     * Função para listar todos os funcionários
     */
    public function listar_funcionarios() {
        require_once("../conexao/Conexao.php");

        try {
            $query = "SELECT * FROM funcionarios f INNER JOIN grupo g ON f.codigo_gru = g.codigo_gru WHERE ativo_fun = 1";

            $stmt    = $pdo->prepare($query);            
            $retorno = $stmt->fetchAll();

            $pdo = null;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        return $retorno;
    }
    
    /**
     * Função para buscar um funcionário
     * @param $codigo_fun
     */
    public function buscar_funcionario($codigo_fun) {
        require_once("../conexao/Conexao.php");

        try {
            $query = "SELECT * FROM funcionarios f INNER JOIN grupo g ON f.codigo_gru = g.codigo_gru WHERE ativo_fun = 1";

            $stmt    = $pdo->prepare($query);            
            $retorno = $stmt->fetchAll();

            $pdo = null;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        return $retorno;
    }

    /**
     * Função para autenticar login do funcionário
     * @param $email_fun, $senha_fun
     */
    public function autenticar_funcionario($email_fun, $senha_fun) {
        require_once("../conexao/Conexao.php");

        try {
            $query = "SELECT * FROM funcionario f INNER JOIN grupo g ON f.codigo_gru = g.codigo_gru WHERE f.ativo_fun = 1 AND f.email_fun = {$email_fun} AND f.senha_fun = {$senha_fun}";

            $stmt    = $pdo->prepare($query);            
            $retorno = $stmt->fetchAll();

            $pdo = null;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        return $retorno;
    }

}
