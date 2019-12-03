<?php
require_once 'Init.php'

 ?>
<!doctype html>

<html>

<head>
  <meta charset="utf-8">
  <title>CRUD Cadastro</title>

</head>
<body>

  <h1>CRUD Cadastro</h1>

  <h2>
  Cadastro de usuario</h2>

  <form action="cadastro.php" method="post">
  <label for="name">Nome:</label>
  <br>
<input type="text" name=nome id="nome">
<br>
<br>
<label for="name">Idade:</label>
<br>
<input type="text" name="idade" id="idade">
<br>
<br>
<label for="cidade">Cidade:</label>
<br>
<input type="text" name="cidade" id="cidade">
<br>
<br>
<input type="submit" value="Cadastrar">
</form>
</body>
</html>
