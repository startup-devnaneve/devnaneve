<?php
require_once "../../Funcionario.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome_fun   = trim(strip_tags($_POST["nome_fun"]));
    $email_fun  = trim(strip_tags($_POST["email_fun"]));
    $senha_fun  = trim(strip_tags($_POST["senha_fun"]));
    $codigo_gru = trim(strip_tags($_POST["codigo_gru"]));

    try {
        $funcionario = new Funcionario();
        $funcionario->setNome_fun($nome_fun);
        $funcionario->setEmail_fun($email_fun);
        $funcionario->setSenha_fun($senha_fun);
        $funcionario->setCodigo_gru($codigo_gru);
        $funcionario->setAtivo_fun(1);
    
        $funcionario->inserir_funcionario();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}