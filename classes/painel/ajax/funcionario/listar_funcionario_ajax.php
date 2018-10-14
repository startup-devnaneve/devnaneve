<?php
require_once "../../Funcionario.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $funcionario = new Funcionario();
        $dados = $funcionario->listar_funcionarios();

        if($dados) {
            echo json_encode(array("retorno" => true, "dados" => $dados));
        } else {
            echo json_encode(array("retorno" => false));
        }
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}