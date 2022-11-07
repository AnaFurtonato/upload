<?php

 if(!empty($_GET['idcadastro']))
{
  include_once('config.php');

  $idcadastro = $_GET['idcadastro'];

  $sqlSelect = "SELECT * FROM cadastro WHERE idcadastro=$idcadastro";

  $result = $conexao->query($sqlSelect);
 
  if($result->num_rows > 0){
    
    while($user_data = mysqli_fetch_assoc($result))
    {
      $nome = $user_data['nome'];
      $cpf = $user_data['cpf'];
      $cep = $user_data['cep'];
    }      
  } 

  else{
    header('Location: visualizacao.php');
  }
} 

else{
  header('Location: visualizacao.php');
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
    <title>Atualização de Cadastro</title>
</head>
<body>
  <a href="visualizacao.php">Voltar</a>
<div class="wrapper fadeInDown">
  
  <div class="content-login">
      <h2 class="active"> Atualizar o Cadastro </h2>
      <form action="saveedicao.php" method="POST" class="box-login">
        <input type="text" name="nome" id="nome" class="campo" value="<?php echo $nome ?>" required placeholder="Seu nome">
        <input type="text" name="cpf" id="cpf" class="campo" value="<?php echo $cpf ?>" required placeholder="CPF">
        <input type="text" name="cep" id="cep" class="campo" value="<?php echo $cep ?>" required placeholder="cep">
        <input type="hidden" name="idcadastro" value="<?php echo $idcadastro ?>">
        <input type="submit" name="update" class="update" value="Salvar">
     </form>
      
  </div>
</div>
</body>
</html> 