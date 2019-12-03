<?php
require_once 'Init.php';
//resgatar valores do form

$nome = ($_POST['nome']?$_POST['nome']:null);
$idade = ($_POST['idade']?$_POST['idade']:null);
$cidade = ($_POST['cidade']?$_POST['cidade']:null);
$id = ($_POST['id']?$_POST['id']:null);

// validação (bem simples, mais uma vez)
if (empty($nome) || empty($idade) || empty($cidade))
{
    echo "Volte e preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql ="update usuario set nome = :nome, idade = :idade, cidade = :cidade where id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome',$nome);
$stmt->bindParam(':idade',$idade);
$stmt->bindParam(':cidade',$cidade);
$stmt->bindParam(':id', $id,PDO::PARAM_INT);

if ($stmt->execute()) {

  header('Location:index.php');
  // code...
}
else {
  {
    echo "Nada foi alterado";
    print_r($stmt->errorInfo());
  }
}





 ?>
