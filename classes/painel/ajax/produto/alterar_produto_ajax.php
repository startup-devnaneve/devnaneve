<?php
require_once "../../Produto.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $codigo_pro     = trim(strip_tags($_POST["codigo_pro"]));
    $nome_pro       = trim(strip_tags($_POST["nome_pro"]));
    $quantidade_pro = trim(strip_tags($_POST["quantidade_pro"]));
    $valor_pro      = trim(strip_tags($_POST["valor_pro"]));

    $valor = str_replace(",", ".", $valor_pro);

    try {
        $produto = new Produto();
        $produto->setNome_pro($nome_pro);
        $produto->setQuantidade_pro($quantidade_pro);
        $produto->setValor_pro($valor);
    
        $produto->alterar_produto($codigo_pro);
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}