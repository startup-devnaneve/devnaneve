<?php
require_once "../../Funcionario.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $codigo_fun = trim(strip_tags($_POST["codigo_fun"]));
    $nome_fun   = trim(strip_tags($_POST["nome_fun"]));
    $email_fun  = trim(strip_tags($_POST["email_fun"]));
    $senha_fun  = md5(trim(strip_tags($_POST["valor_pro"])));
    $codigo_gru = trim(strip_tags($_POST["codigo_gru"]));

    try {
        $funcionario = new Funcionario();
        $funcionario->setNome_fun($nome_fun);
        $funcionario->setEmail_fun($email_fun);
        $funcionario->setSenha_fun($senha_fun);
        $funcionario->setCodigo_gru($codigo_gru);
    
        $funcionario->alterar_funcionario($codigo_fun);
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}