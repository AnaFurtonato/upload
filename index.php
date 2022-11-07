<?php

 if(isset($_POST['submit'])){

   //print_r('Nome: '. $_POST['nome']);
   //print_r('<br>');
   //print_r('CPF: '. $_POST['cpf']);
   //print_r('<br>');
   //print_r('Cep: '. $_POST['cep']);

    include_once('config.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];

    $result = mysqli_query($conexao, "INSERT INTO cadastro(nome,cpf,cep) 
    VALUES('$nome','$cpf','$cep')");

  }

  
  include_once('config.php');

  if(isset($_FILES['arquivo'])){

    $arquivo = $_FILES['arquivo'];

    
    if($arquivo['error']){
      die("Falha ao enviar arquivo");
    }

    if($arquivo['size'] > 2097152){
      die("Arquivo muito grande! Max:2MB");
    }

    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novonomearquivo = uniqid();

    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if($extensao !="jpg" && $extensao != 'png'){
      die("Tipo de arquivo não permitido, apenas png e jpg");
    }

    $path = $pasta . $novonomearquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    if($deu_certo)
    {
      $banco = mysqli_query($conexao, "INSERT INTO arquivos(nome, path) 
      VALUES('$nomeDoArquivo','$path')") or die($mysqli->error);
      echo "<p> Arquivo enviado com sucesso! Para acessa-ló, <a target =\"_blank\" href=\"arquivos/$novonomearquivo.$extensao\">Clique aqui!</a><p>";
    }
    else{
      echo "<p> Falha ao enviar o arquivo<p>";
    }
      
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./js/bootstrap.min.js">
    <title>Formulario de cadastro</title>
</head>
<body>
  
<div class="wrapper fadeInDown">  
  <div class="content-login">
      <h2 class="active"> Cadastrar </h2>
      <form enctype="multipart/form-data" action="index.php" method="POST" class="box-login">
        <input type="text" name="nome" id="nome" class="campo"  placeholder="Seu nome">
        <input type="text" name="cpf" id="cpf" class="campo"  placeholder="CPF">
        <input type="text" name="cep" id="cep" class="campo"  placeholder="cep">
        <p><label for="">Selecione a Imagem</label>
        <input name="arquivo" type="file" class="campo"><p>
        <p><label for="">Selecione o arquivo</label>
        <input name="arquivo2" type="file" class="campo"></p>
        <input type="submit" name="submit" class="botao" value="Enviar">
      </form>
      
  </div>
</div>
</body>
</html>