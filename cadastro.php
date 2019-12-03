<?php
require_once 'init.php';

//pegar dados formulario
$nome = ($_POST["nome"]?$_POST["nome"]:null);
$idade = ($_POST["idade"]?$_POST["idade"]:null);
$cidade = ($_POST["cidade"]?$_POST["cidade"]:null);


// validação (bem simples, só pra evitar dados vazios)
if (empty($nome) || empty($idade) || empty($cidade))
{
    echo "Volte e preencha todos os campos";
    exit;
}

//inserindo no BadFunctionCallException
$PDO = db_connect();
$sql = "insert into usuario(nome,idade,cidade) values (:nome,:idade,:cidade) ";
$stmt = $PDO->prepare($sql);
$stmt ->bindParam(':nome',$nome);
$stmt ->bindParam(':idade',$idade);
$stmt ->bindParam(':cidade',$cidade);

if($stmt->execute())
{
  header('Location:index.php');
}else {
  echo "erro ao cadastrar";
  print_r($stmt->errorInfo());
}



 ?>
