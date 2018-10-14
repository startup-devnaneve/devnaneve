<?php
require_once "../../Produto.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $codigo_pro = trim(strip_tags($_POST["codigo_pro"]));

        $produto = new Produto();
        $retorno = $produto->buscar_produto($codigo_pro);

        if($retorno) {
            echo json_encode(array("retorno" => true, "dados" => $retorno));
        } else {
            echo json_encode(array("retorno" => false));
        }
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}