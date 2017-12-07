<?php 

// server information
$session_id = ispconfig_api_login();
$parameters = array(
  'sys_userid' => 0,
  'sys_groupid' => 0
);
$result_isp = ispconfig_api('client_get_sites_by_user', $parameters);

$end = ispconfig_api_logout($session_id);

 // Endpoint Drupal.
$url = 'https://painel.ativos.online/rest_view_06122017/rest01.json';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
   // Set authentication details.
curl_setopt($ch, CURLOPT_USERPWD, "login:senha");
   // Fetch the results.
$result_drupal = curl_exec($ch);
curl_close($ch); 

$obj = json_decode($result_drupal);


//comparar os arquivos e filtrar sites desatualizados
kpr ($result_isp);
kpr($obj);
?>