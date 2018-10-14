<?php
require_once "../../Produto.php";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        $produto = new Produto();
        $dados = $produto->listar_produtos();

        if($dados) {
            echo json_encode(array("retorno" => true, "dados" => $dados));
        } else {
            echo json_encode(array("retorno" => false));
        }
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}