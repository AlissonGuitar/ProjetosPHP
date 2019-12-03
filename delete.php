<?php
require_once 'Init.php';



$id = ($_GET['id']?$_GET['id']:null);

if (empty($id)) {

  echo "id nao informado";
  exit;
  // code...
}


$PDO = db_connect();
$sql ="delete from usuario where id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id,PDO::PARAM_INT);



if ($stmt->execute()) {

  header('Location:index.php');
  // code...
}
else {
  {
    echo "Nada foi deletado";
    print_r($stmt->errorInfo());
  }
}


 ?>
