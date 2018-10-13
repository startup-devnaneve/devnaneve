<?php

require_once "../conexao/Conexao.php";

class Produto {

    /** Tabela */
    private $tabela = "produto";
    
    /** Atributos */
    private $nome_pro,
            $quantidade_pro,
            $valor_pro,
            $ativo_pro;

    /** Métodos Especiais */
    public function getNome_pro() {
        return $this->nome_pro;
    }
    public function setNome_pro($nome_pro) {
        $this->nome_pro = $nome_pro;
    }

    public function getQuantidade_pro() {
        return $this->quantidade_pro;
    }
    public function setQuantidade_pro($quantidade_pro) {
        $this->quantidade_pro = $quantidade_pro;
    }

    public function getValor_pro() {
        return $this->valor_pro;
    }
    public function setValor_pro($valor_pro) {
        $this->valor_pro = $valor_pro;
    }

    public function getAtivo_pro() {
        return $this->ativo_pro;
    }
    public function setAtivo_pro($ativo_pro) {
        $this->ativo_pro = $ativo_pro;
    }

    /**
     * Função para inserir um novo produto
     */
    public function inserir_produto() {
        try {
            $query = "INSERT INTO $this->tabela(nome_pro, quantidade_pro, valor_pro, ativo_pro) 
                      VALUES(:nome_pro, :quantidade_pro, :valor_pro, :ativo_pro)";

            $stmt = DB::prepare($query);
            $stmt->bindParam(":nome_pro", $this->getNome_pro());
            $stmt->bindParam(":quantidade_pro", $this->getQuantidade_pro());
            $stmt->bindParam(":valor_pro", $this->getValor_pro());
            $stmt->bindParam(":ativo_pro", $this->getAtivo_pro());

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Função para alterar os dados de um produto
     */
    public function alterar_produto($codigo_pro) {
        try {
            $query = "UPDATE $this->tabela 
                      SET nome_pro = :nome_pro, quantidade_pro = :quantidade_pro, valor_pro = :valor_pro 
                      WHERE codigo_pro = :codigo_pro";

            $stmt = DB::prepare($query);
            $stmt->bindParam(":codigo_pro", $codigo_pro);
            $stmt->bindParam(":nome_pro", $this->getNome_pro());
            $stmt->bindParam(":quantidade_pro", $this->getQuantidade_pro());
            $stmt->bindParam(":valor_pro", $this->getValor_pro());
            $stmt->bindParam(":ativo_pro", $this->getAtivo_pro());

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para inativar um produto
     */
    public function inativar_produto($codigo_pro) {
        try {
            $query = "UPDATE $this->tabela 
                      SET ativo_pro = 0
                      WHERE codigo_pro = :codigo_pro";

            $stmt = DB::prepare($query);        
            $stmt->bindParam(":codigo_pro", $codigo_pro);

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Função para listar os produtos cadastrados
     */
    public function listar_produtos() {
        try {
            $query = "SELECT * FROM produto WHERE ativo_pro = 1";
            
            $stmt = DB::prepare($query);

			$stmt->execute();
			return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para buscar um registro de produto
     */
    public function buscar_produto($codigo_pro) {
        try {
            $query = "SELECT * FROM produto WHERE codigo_pro = :codigo_pro AND ativo_pro = 1";
            
            $stmt = DB::prepare($query);
            $stmt->bindParam(":codigo_pro", $codigo_pro);

			$stmt->execute();
			return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}
