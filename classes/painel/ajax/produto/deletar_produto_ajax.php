<?php
require_once "../../Produto.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $codigo_pro = trim(strip_tags($_POST["codigo_pro"]));

    try {
        $produto = new Produto();        

        $produto->inativar_produto($codigo_pro);
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}