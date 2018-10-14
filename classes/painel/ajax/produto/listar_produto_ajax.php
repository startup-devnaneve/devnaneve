<?php
require_once "../../Produto.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $produto = new Produto();
        $retorno = $produto->listar_produtos();

        if($retorno) {
            echo json_encode(array("retorno" => true, "dados" => $retorno));
        } else {
            echo json_encode(array("retorno" => false));
        }
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}