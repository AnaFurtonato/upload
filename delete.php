<?php

 if(!empty($_GET['idcadastro']))
{
  include_once('config.php');

  $idcadastro = $_GET['idcadastro'];

  $sqlSelect = "SELECT * FROM cadastro WHERE idcadastro=$idcadastro";

  $result = $conexao->query($sqlSelect);
 
  if($result->num_rows > 0){
    
    $sqlDelete = "DELETE FROM cadastro WHERE idcadastro=$idcadastro";  
    $resultDelete = $conexao->query($sqlDelete);
  }
} 

header('Location: visualizacao.php');

?>