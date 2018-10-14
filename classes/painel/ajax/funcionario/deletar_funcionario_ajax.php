<?php
require_once "../../Funcionario.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $codigo_fun = trim(strip_tags($_POST["codigo_fun"]));

    try {
        $funcionario = new Funcionario();        

        $funcionario->inativar_funcionario($codigo_pro);
    } catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}