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
curl_setopt($ch, CURLOPT_USERPWD, "admin_webmaster:pW_webmaster@02157781");
   // Fetch the results.
$result_drupal = curl_exec($ch);
curl_close($ch); 

$obj = json_decode($result_drupal);

$array_server = array();
$array_drupal = array();

//comparar os arquivos e filtrar sites desatualizados
//kpr ($result_isp);
//kpr($obj);

foreach($result_isp as $key => $value) {
$array_server[$value['domain_id']]['domain'] = $value['domain'] ;
$array_server[$value['domain_id']]['document_root'] = $value['document_root'] ;
$array_server[$value['domain_id']]['active'] = $value['active'] ;

}

foreach($obj as $key => $value) {
$array_drupal[$value->domain_id]['domain'] = $value->domain ;
$array_drupal[$value->domain_id]['document_root'] = $value->document_root ;
$array_drupal[$value->domain_id]['active'] = $value->ativo ;

}

kpr($array_server);
kpr($array_drupal);
?>
