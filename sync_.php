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
$array_novos = array();
foreach ($array_server as $key => $value) {
	//busca novos sites
	//echo $key;
	//kpr ($value);
   	if (!array_key_exists($key, $array_drupal)) {
   		 $array_novos[$key]['domain'] = $value['domain'];
		$array_novos[$key]['document_root'] = $value['document_root'];
		$array_novos[$key]['active'] = $value['active'];
	}
}
//kpr($array_server);
//kpr($array_drupal);
//kpr ($array_novos);
//$variable_added = $array_novos;
//return $variable_added ;

//-------------------------------------------------------------------------------create nodes-----------------------------------

global $user;
if (!empty($array_novos)){

foreach ($array_novos as $key => $value) {

// Create an Entity.
$node = entity_create('node', array('type' => 'site'));
// Specify the author.
$node->uid = $user->uid;
// Create a Entity Wrapper of that new Entity.
$emw_node = entity_metadata_wrapper('node', $node);
// Set a title and some text field value.
$emw_node->title = 'web'.$key;
$emw_node->field_id_dominio_client_site= $key;
$emw_node->field_dominio_client_site= $value['domain'];
$emw_node->field_root_dir_client_site= $value['document_root'];
$emw_node->field_ativo_client_site= $value['active'];
// And save it.
$emw_node->save();
}
}





