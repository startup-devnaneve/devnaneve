<?php
require_once "../../Funcionario.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $codigo_fun = trim(strip_tags($_POST["codigo_fun"]));

        $funcionario = new Funcionario();
        $retorno = $funcionario->buscar_funcionario($codigo_fun);

        if($retorno) {
            echo json_encode(array("retorno" => true, "dados" => $retorno));
        } else {
            echo json_encode(array("retorno" => false));
        }
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}