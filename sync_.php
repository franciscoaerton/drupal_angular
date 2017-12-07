<div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr class="active">
        <th>#</th>
        <th>Id Domínio</th>
        <th>Domínio</th>
        <th>Pasta</th>
        <th>Link de Sincronização</th>
      </tr>
    </thead>
    <tbody>
      
<?php 
$session_id = ispconfig_api_login();
$parameters = array(
  'sys_userid' => 0,
  'sys_groupid' => 0
);
 $result = ispconfig_api('client_get_sites_by_user', $parameters);
//kpr ($result);
//kpr ($session_id);
$end = ispconfig_api_logout($session_id);

foreach ($result as $key => $value) {
//print_r($value);
  echo '<tr>
          <td>ordem'.$key.'</td>
          <td>'.$value['domain_id']'</td>
          <td>'.$value['domain'].'</td>
          <td>'.$value['document_root'].'</td>
          <td>link</td>
        </tr>';
}
 // Endpoint URL.
$url = 'https://painel.ativos.online/rest_view_06122017/rest01.json';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
   // Set authentication details.
curl_setopt($ch, CURLOPT_USERPWD, "login:senha");
   // Fetch the results.
$result = curl_exec($ch);
curl_close($ch); 

$obj = json_decode($result );
print_r( $obj); // 12345

kpr($obj);
?>
    </tbody>
  </table>
</div>
