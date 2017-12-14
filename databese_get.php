<?php 
// server information
$session_id = ispconfig_api_login();
$parameters = array(
  'primary_id' => -1
);
$result_isp = ispconfig_api('sites_database_get', $parameters);
$end = ispconfig_api_logout($session_id);
//kpr($result_isp);

// Endpoint Drupal.
$url = 'https://painel.ativos.online/rest_view_06122017/rest02.json';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
   // Set authentication details.
curl_setopt($ch, CURLOPT_USERPWD, "admin_webmaster:pW_webmaster@02157781");
   // Fetch the results.
$result_drupal = curl_exec($ch);
curl_close($ch); 

$obj = json_decode($result_drupal);
// $array_server e $array_drupal tem como chave a id do banco de dados
// $array_news é uma array com novos banco de dados
$array_server = array();
$array_drupal = array();
$array_news = array();

if (count($obj) == 0)
  {
    echo 'No DBs in drupal';

  }else{
    echo 'DBs'; 
  }

//comparar os arquivos e filtrar sites desatualizados
kpr ($result_isp);
kpr($obj);
 ?>
