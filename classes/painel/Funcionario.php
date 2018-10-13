<?php

require_once "../conexao/Conexao.php";

class Funcionario {
    
    /** Tabela */
    private $tabela = "funcionario";

    /** Atributos */
    private $codigo_fun,
            $nome_fun,
            $email_fun,
            $senha_fun,
            $codigo_gru,
            $codigo_est,
            $ativo_fun;

    /** Métodos Especiais */
    public function getNome_fun() {
        return $this->nome_fun;
    }
    public function setNome_fun($nome_fun) {
        $this->nome_fun = $nome_fun;
    }

    public function getEmail_fun() {
        return $this->email_fun;
    }
    public function setEmail_fun($email_fun) {
        $this->email_fun = $email_fun;
    }

    public function getSenha_fun() {
        return $this->senha_fun;
    }
    public function setSenha_fun($senha_fun) {
        $this->senha_fun = $senha_fun;
    }

    public function getCodigo_gru() {
        return $this->codigo_gru;
    }
    public function setCodigo_gru($codigo_gru) {
        $this->codigo_gru = $codigo_gru;
    }

    public function getAtivo_fun() {
        return $this->ativo_fun;
    }
    public function setAtivo_fun($ativo_fun) {
        $this->ativo_fun = $ativo_fun;
    }

    /** 
     * Função para inserir um novo funcionário
     * */
    public function inserir_funcionario() {
        try {
            $query = "INSERT INTO $this->tabela(nome_fun, email_fun, senha_fun, codigo_gru, ativo_fun) 
                      VALUES(:nome_fun, :email_fun, :senha_fun, :ativo_fun)";
            
            $stmt = DB::prepare($query);

            $stmt->bindParam(":nome_fun", $this->getNome_fun());
            $stmt->bindParam(":email_fun", $this->getEmail_fun());
            $stmt->bindParam(":senha_fun", $this->getSenha_fun());
            $stmt->bindParam(":ativo_fun", $this->getAtivo_fun());

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para realizar a alteração dos dados de um funcionário      
     */
    public function alterar_funcionario($codigo_fun) {
        try {
            $query = "UPDATE $this->tabela 
                      SET nome_fun = :nome_fun, email_fun = : email_fun, senha_fun = :senha_fun 
                      WHERE codigo_fun = :codigo_fun";
            
            $stmt = DB::prepare($query);

            $stmt->bindParam(":codigo_fun", $codigo_fun);
            $stmt->bindParam(":nome_fun", $this->getNome_fun());
            $stmt->bindParam(":email_fun", $this->getEmail_fun());
            $stmt->bindParam(":senha_fun", $this->getSenha_fun());
            $stmt->bindParam(":ativo_fun", $this->getAtivo_fun());

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para inativar um funcionário
     */
    public function inativar_funcionario($codigo_fun) {
        try {
            $query = "UPDATE $this->tabela 
                      SET ativo_con = 0 
                      WHERE codigo_fun = :codigo_fun";
            
            $stmt = DB::prepare($query);

            $stmt->bindParam(":codigo_fun", $codigo_fun);

            echo json_encode($stmt->execute());
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para listar todos os funcionários
     */
    public function listar_funcionarios() {
        try {
            $query = "SELECT * FROM $this->tabela f INNER JOIN grupo g ON f.codigo_gru = g.codigo_gru WHERE f.ativo_fun = 1";

			$stmt = DB::prepare($query);

			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) {
            echo $e->getMessage();
		}
    }
    
    /**
     * Função para buscar um funcionário
     */
    public function buscar_funcionario($codigo_fun) {
        try {
			$query = "SELECT * FROM $this->tabela f INNER JOIN grupo g ON f.codigo_gru = g.codigo_gru WHERE codigo_fun = :codigo_fun AND f.ativo_fun = 1";

			$stmt = DB::prepare($query);
			$stmt->bindParam(":codigo_fun", $codigo_fun);

			$stmt->execute();
			return $stmt->fetch();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Função para autenticar login do funcionário
     */
    public function autenticar_funcionario($email_fun, $senha_fun) {
        try {
            $query = "SELECT * FROM $this->tabela f INNER JOIN grupo g ON f.codigo_gru = g.codigo_gru WHERE email_fun = :email_fun AND senha_fun = :senha_fun AND f.ativo_fun = 1";

            $stmt = DB::prepare($query);
            $stmt->bindParam(":email_fun", $this->getEmail_fun());
            $stmt->bindParam(":senha_fun", $this->getSenha_fun());

            $stmt->execute();

            if($stmt->rowCount() === 1) {
                session_start();

                $dados = $stmt->fetch(PDO::FETCH_OBJ);

                $_SESSION["codigo_fun"] = $dados->codigo_fun;
                $_SESSION["nome_fun"]   = $dados->nome_fun;
                $_SESSION["email_fun"]  = $dados->email_fun;
                $_SESSION["codigo_gru"] = $dados->codigo_gru;

                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}
