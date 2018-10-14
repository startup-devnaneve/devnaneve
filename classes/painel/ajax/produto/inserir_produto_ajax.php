<?php
require_once "../../Produto.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome_pro       = trim(strip_tags($_POST["nome_pro"]));
    $quantidade_pro = trim(strip_tags($_POST["quantidade_pro"]));
    $valor_pro      = trim(strip_tags($_POST["valor_pro"]));

    $valor = str_replace(",", ".", $valor_pro);

    $produto = new Produto();
    $produto->setNome_pro($nome_pro);
    $produto->setQuantidade_pro($quantidade_pro);
    $produto->setValor_pro($valor);

    $produto->inserir_produto();
}