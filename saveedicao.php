<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $idcadastro = $_POST['idcadastro'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];

        $sqlUpdate = "UPDATE cadastro SET nome = '$nome', cpf = '$cpf', cep = '$cep'
        WHERE  idcadastro = '$idcadastro'";

        $result = $conexao->query($sqlUpdate);
    }

    header('Location: visualizacao.php');

?>