<?php
//constantes com as credenciais de acesso ao banco mysql
define('DB_HOST','localhost');
define('DB_NAME','usuario crud');
define('DB_USER','root');
define('DB_PASS','');

//habilita todas as exibições de erros
ini_set('display errors',true);
error_reporting(E_ALL);

//inclui  arquivo conexao
require_once 'Conexao.php';

 ?>
