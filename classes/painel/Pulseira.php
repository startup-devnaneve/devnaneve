<?php

require_once "../conexao/Conexao.php";

class Pulseira {

    /** Tabela */
    private $tabela = "pulseira";

    /** Atributos */
    private $numero_pul,
            $status_pul,
            $ativo_pul;

    /** Métodos Especiais */
    public function getNumero_pul() {
        return $this->numero_pul;
    }
    public function setNumero_pul($numero_pul) {
        $this->numero_pul = $numero_pul;
    }

    public function getStatus_pul() {
        return $this->status_pul;
    }
    public function setStatus_pul($status_pul) {
        $this->status_pul = $status_pul;
    }

    public function getAtivo_pul() {
        return $this->ativo_pul;
    }
    public function setAtivo_pul($ativo_pul) {
        $this->ativo_pul = $ativo_pul;
    }

    /**
     * Função para inserir uma nova pulseira
     */
    public function inserir_pulseira() {
        try {
            $query = "INSERT INTO $this->tabela(numero_pul, status_pul, ativo_pul) 
                      VALUES(:numero_pul, :status_pul, :ativo_pul)";

            $stmt = DB::prepare($query);
            $stmt->bindParam(":numero_pul", $this->getNumero_pul());
            $stmt->bindParam(":status_pul", $this->getStatus_pul());
            $stmt->bindParam(":ativo_pul", $this->getAtivo_pul());

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para alterar os dados de uma pulseira
     */
    public function alterar_pulseira($codigo_pul) {
        try {
            $query = "UPDATE $this->tabela 
                      SET numero_pul = :numero_pul, status_pul = :status_pul, ativo_pul = :ativo_pul
                      WHERE codigo_pul = :codigo_pul";

            $stmt = DB::prepare($query);
            $stmt->bindParam(":codigo_pul", $codigo_pul);
            $stmt->bindParam(":numero_pul", $this->getNumero_pul());
            $stmt->bindParam(":status_pul", $this->getStatus_pul());
            $stmt->bindParam(":ativo_pul", $this->getAtivo_pul());

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para inativar uma pulseira
     */
    public function inativar_pulseira($codigo_pul) {
        try {
            $query = "UPDATE $this->tabela 
                      SET ativo_pul = 1
                      WHERE codigo_pul = :codigo_pul";

            $stmt = DB::prepare($query);
            $stmt->bindParam(":codigo_pul", $codigo_pul);

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para listar as pulseiras cadastradas
     */
    public function listar_pulseiras() {
        try {
            $query = "SELECT * FROM $this->tabela WHERE ativo_pul = 1";

            $stmt = DB::prepare($query);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}
