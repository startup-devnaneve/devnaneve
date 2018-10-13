<?php

class Produto {
    
    /** Atributos */
    private $nome_pro,
            $quantidade_pro,
            $valor_pro,
            $ativo_pro;

    /** Métodos Especiais */
    function getNome_pro() {
        return $this->nome_pro;
    }
    function setNome_pro($nome_pro) {
        $this->nome_pro = $nome_pro;
    }

    function getQuantidade_pro() {
        return $this->quantidade_pro;
    }
    function setQuantidade_pro($quantidade_pro) {
        $this->quantidade_pro = $quantidade_pro;
    }

    function getValor_pro() {
        return $this->valor_pro;
    }
    function setValor_pro($valor_pro) {
        $this->valor_pro = $valor_pro;
    }

    function getAtivo_pro() {
        return $this->ativo_pro;
    }
    function setAtivo_pro($ativo_pro) {
        $this->ativo_pro = $ativo_pro;
    }

    /**
     * Função para inserir um novo produto
     * @param $nome_pro, $quantidade_pro, $valor_pro, $ativo_pro
     */
    public function inserir_produto() {
        require_once("../conexao/Conexao.php");

        try {
            $pdo->exec('SET NAMES UTF8');

            $query = "INSERT INTO produto(nome_pro, quantidade_pro, valor_pro, ativo_pro) 
                      VALUES(:nome_pro, :quantidade_pro, :valor_pro, :ativo_pro)";

            $parametros = array(
                ":nome_pro"   => $this->nome_pro,
                ":quantidade" => $this->quantidade_pro,
                ":valor_pro"  => $this->valor_pro,
                ":ativo_pro"  => 1
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
     * Função para alterar os dados de um produto
     * @param $codigo_pro, $nome_pro, $quantidade_pro, $valor_pro, $ativo_pro
     */
    public function alterar_produto() {
        require_once("../conexao/Conexao.php");

        try {
            $pdo->exec('SET NAMES UTF8');

            $query = "UPDATE produto 
                      SET nome_pro = :nome_pro, quantidade_pro = :quantidade_pro, valor_pro = :valor_pro, ativo_pro = :ativo_pro 
                      WHERE codigo_pro = :codigo_pro";

            $parametros = array(
                "codigo_pro"      => $this->codigo_pro,
                ":nome_pro"       => $this->nome_pro,
                ":quantidade_pro" => $this->quantidade_pro,
                ":valor_pro"      => $this->valor_pro
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
     * Função para inativar um produto
     * @param $codigo_pro
     */
    public function inativar_produto() {
        require_once("../conexao/Conexao.php");

        try {
            $query = "UPDATE produto SET ativo_pro = 0 WHERE codigo_pro = :codigo_pro";

            $paramentros = array(
                "codigo_pro" => $this->codigo_pro
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
     * Função para listar os produtos cadastrados
     */
    public function listar_produtos() {
        require_once("../conexao/Conexao.php");

        try {
            $query = "SELECT * FROM funcionarios f INNER JOIN grupo g ON f.codigo_gru = g.codigo_gru WHERE ativo_fun = 1";

            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $retorno = $stmt->fetchAll();
            $pdo = null;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        return $retorno;
    }

    /**
     * Função para buscar um registro de produto
     * @param $codigo_pro
     */
    public function buscar_produto($codigo_pro) {
        require_once("../conexao/Conexao.php");

        try {
            $query = "SELECT * FROM produto WHERE ativo_pro = 1 AND codigo_pro = {$codigo_pro}";

            $stmt    = $pdo->prepare($query);
            $stmt->execute();

            $retorno = $stmt->fetchAll();
            $pdo = null;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        return $retorno;
    }

}
