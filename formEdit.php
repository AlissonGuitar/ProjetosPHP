<?php
require_once 'Init.php';

//pega o Id

  $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

  // valida o id

  if ((empty($id))) {

    echo "Id nao definido";
    exit;
    // code...
  }

  //busca os dados do usuario a ser editado

  $PDO = db_connect();
  $sql = "select nome, idade, cidade from usuario where id = :id";
  $stmt = $PDO->prepare($sql);
  $stmt->bindParam(':id',$id,PDO::PARAM_INT);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  //se po metodo fetch()nao retornar array,significa que o id nao é validação
  if ((!is_array($user))) {
    echo "nenhum usuario encontrado";
    exit;
    // code...
  }
 ?>


 <!doctype html>
 <html>
<head>
  <meta charset="utf-8">

  <title> Edição - CRUD PHP</title>

</head>

<body>

  <h2>Edição</h2>

  <form action="alteracao.php" method="POST">


    <label for="nome">Nome:</label>
    <br>
    <input type="text" name="nome" id="nome" value="<?php echo $user['nome']?>">
    <br>
    <br>
    <label for="idade">Idade:</label>
    <br>
    <input type="text" name="idade" id="idade" value="<?php echo $user['idade']?>">
    <br> <br>
    <label for="cidade">Cidade:</label>
    <br>
    <input type="text" name="cidade" id="cidade" value="<?php echo $user["cidade"]?>">
      <<br>

      <input type="hidden" name="id" value="<?php echo $id ?>">
      <input type="submit" value="Editar">
  </form>
</body>
 </html>
