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

foreach($result_isp as $key => $value) {
$array_server[$value['database_id']]['parent_domain_id'] = $value['parent_domain_id'];
$array_server[$value['database_id']]['database_name'] = $value['database_name'] ;
$array_server[$value['database_id']]['database_user_id'] = $value['database_user_id'] ;
}
foreach($obj as $key => $value) {
$array_drupal[$value->database_id]['parent_domain_id'] = $value->parent_domain_id ;
$array_drupal[$value->database_id]['database_name'] = $value->database_name ;
$array_drupal[$value->database_id]['database_user_id'] = $value->database_user_id ;
}
// separa os novos itens da tabela
foreach ($array_server as $key => $value) {
	//echo $key;
	//kpr ($value);
   	if (!array_key_exists($key, $array_drupal)) {
   		$array_news[$key]['parent_domain_id'] = $value['parent_domain_id'];
		  $array_news[$key]['database_name'] = $value['database_name'];
		  $array_news[$key]['database_user_id'] = $value['database_user_id'];
	}
}

if (count($obj) == 0)
  {
    echo 'No DBs in drupal';

  }else{
    echo 'DBs'; 
  }

//comparar os arquivos e filtrar sites desatualizados
kpr ($array_server);
kpr ($array_drupal);
kpr ($array_news);
//kpr($obj);
 ?>
