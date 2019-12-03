<?php
require_once 'Init.php';
require_once 'Conexao.php';

//abre a conexao
$PDO = db_connect();


$sql = "Select id,nome,idade,cidade from usuario order by nome asc";
//sql para contar total de registros

$sql_count = "select count(*) as total from usuario order by nome asc";

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

//seleciona registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
 ?>


 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">

         <title>CRUD - PHP</title>
     </head>

     <body>

         <h1>CRUD- PHP</h1>

         <p><a href="formCrud.php">Adicionar Usuário</a></p>

         <h2>Lista de Usuários</h2>

 <p>Total de usuários: <?php echo $total ?></p>

    <?php if ($total > 0): ?>


         <table width="50%" border="1">
             <thead>
                 <tr>
                     <th>Nome</th>
                     <th>Idade</th>
                     <th>Cidade</th>
                 </tr>
             </thead>
             <tbody>
                 <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                 <tr>
                     <td><?php echo $user['nome'] ?></td>
                     <td><?php echo $user['idade'] ?></td>
                      <td><?php echo $user['cidade'] ?></td>


                     <td>
                         <a href="formEdit.php?id=<?php echo $user['id'] ?>">Editar</a>
                         <a href="delete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                     </td>
                 </tr>
                 <?php endwhile; ?>
             </tbody>
         </table>

         <?php else: ?>

         <p>Nenhum usuário registrado</p>

         <?php endif; ?>
     </body>
 </html>
