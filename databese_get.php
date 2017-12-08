<?php 

/*
O banco de dados não possui vinculação no servidor. Assim, cada banco de dados pode ser
atribuido a qualquer site. O que determina o acesso são as nome do banco de dados e o usuário.
*/

// server information
$session_id = ispconfig_api_login();
$parameters = array(
  'primary_id' => 1
);

$result_isp = ispconfig_api('sites_database_get', $parameters);

$end = ispconfig_api_logout($session_id);
kpr($result_isp);
 ?>
