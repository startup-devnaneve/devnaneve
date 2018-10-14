<?php
require_once "../../Funcionario.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $funcionario = new Funcionario();
        $retorno = $funcionario->listar_funcionarios();

        if($retorno) {
            echo json_encode(array("retorno" => true, "dados" => $retorno));
        } else {
            echo json_encode(array("retorno" => false));
        }
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}