<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Auth {
	private $CI; //Receberá a instância do codeigniter
	private $noPermitionView = 'acesso_negado'; //classe de acesso negado ou funcionalidade bloqueada
	private $loginView = 'login' ; // classe para realização de login
	
	
	
		
	public function __construct(){
		// é criada a instância do codeigniter na variável $CI
		$this->CI = &get_instance();
		}
		
	function CheckAuth ($class, $metodo){
		// Pesquisa a classe e o método passados como parâmetros em CheckAuth
		$array = array ('classe' => $class, 'metodo' => $metodo);
		$qryMetodos = $this->CI->db->where($array)->get('metodos');
		$resultMetodos = $qryMetodos->result();
				
		// caso o método passado não esteja na tabela 'metodos'
		// ele é inserido atravé de  $this->CI->db->insert ('metodos', $data);..
		
		// a linha abaixo prepara o array para inserir o metodo não encaontrato no db
			if(count($resultMetodos) == 0) {
				$data = array (
					'classe' => $class,
					'metodo' => $metodo,
					'identificacao' => $class.'/'.$metodo,
					'privado' => 1
				);
	
				$this->CI->db->insert ('metodos', $data);
				//redirect(base_url($classe.'/'.$metodo));
				// ESTE É O PRIMEIRO ACESSO DA PÁGINA, ENTÃO O ACESSO É NEGADO, PARA QUE O PROCESSO REINICIE.
				//CASO HAJA UM ERRO E A PÁGINA NÃO SEJA CADASTRADA, ELA NÃO PODERÁ SER ACESSADA.
				return false;
				
		
			// caso o metodo e classe sejam localizados no db, 
			} else{
				// se o método já existir na tabela, então recupera se ele é público ou privado
				// o método sendo público (0), então verifica o login e libera o acesso
				// mas se for privado (1), então é verificado o login e a permissão do usuário
		
				if ($resultMetodos[0]->privado==0){
				//não há acesso público nesta ferramenta.
					return false;
					
					}else{
		
						$nome = $this->CI->session->userdata('username');
						$logged_in = $this->CI->session->userdata('logged_in');
						//$data = $this->CI->session->userdata('data');
						$email = $this->CI->session->userdata('email');
						$id_usuario= $this->CI->session->userdata('id_usuario');
						
						$id_metodo = $resultMetodos[0]->id;
						//echo "<br>id metodo:".$id_metodo.'</br>'; 
						// se o usuario estiver logado, faz a verificação da permissão
						// caso contrário, redireciona para a tela de login
			
						if ($nome && $logged_in && $id_metodo){
		

							$array = array ('id_metodo' => $id_metodo, 'id_usuario' => $id_usuario);
							//print_r($array);
							$qryPermissoes = $this->CI->db->where($array)->get('permissoes');
							$resultPermissoes = $qryPermissoes->result();
				
							if(count($resultPermissoes)==0){
								redirect($this->permitionView, 'refresh');
							} else {
								return true;
								}
						} else {
							redirect ($this->loginView, 'refresh');
						}
						
					}
			}
	}
	
	
	function PageCheckAuth ($class, $metodo){
		
		// Primeiro é verificado se o usuário está logado
		$nome = $this->CI->session->userdata('username');
		$logged_in = $this->CI->session->userdata('logged_in');
		//$data = $this->CI->session->userdata('data');
		$email = $this->CI->session->userdata('email');
		$id_usuario= $this->CI->session->userdata('id_usuario');
		
			if (!$logged_in) { 
			// se não estiver logado, redireciona para tela de login
			redirect ($this->loginView, 'refresh');
			
			} else {
				
			//guarda informações DB da Classe/Metodo
			$DadosDoMetodo = CheckDbMetodo ($class, $metodo);

			//separa o id do metodo
			$id_metodo = $DadosDoMetodo[0]->id_method;
			
			// testa se todas as variaveis existem e se existe a permissão no banco de dados
			if ($nome && $logged_in && $id_metodo){
		
			$array = array ('id_metodo' => $id_metodo, 'id_usuario' => $id_usuario);
			//print_r($array);
			$qryPermissoes = $this->CI->db->where($array)->get('permissoes');
			$resultPermissoes = $qryPermissoes->result();
			
			if(count($resultPermissoes)==0){
				redirect($this->permitionView, 'refresh');
				} else {
				return true;
				}
				}
				
				
			}
		
		
		
		
		
		
		
		// é realizado um teste para saber se a página (classe/metodo) é pública ou privada
		// este checkauth verifica se o usuario esta logado. se não estiver, o acesso é negado.
		
		
						
						$id_metodo = $resultMetodos[0]->id;
						//echo "<br>id metodo:".$id_metodo.'</br>'; 
						// se o usuario estiver logado, faz a verificação da permissão
						// caso contrário, redireciona para a tela de login
			
						if ($nome && $logged_in && $id_metodo){
		

							$array = array ('id_metodo' => $id_metodo, 'id_usuario' => $id_usuario);
							//print_r($array);
							$qryPermissoes = $this->CI->db->where($array)->get('permissoes');
							$resultPermissoes = $qryPermissoes->result();
				
							if(count($resultPermissoes)==0){
								redirect($this->permitionView, 'refresh');
							} else {
								return true;
								}
						} else {
							redirect ($this->loginView, 'refresh');
						}
						
		
		
		
		
		
		if ($resultMetodos[0]->privado==0){
			
			
			
			} else {
				
				
			}
		
		
		//o método sendo público (0), então verifica o login e libera o acesso
		// mas se for privado (1), então é verificado o login e a permissão do usuário
		
		
		
		
		
		
		
		if ($resultMetodos[0]->privado==0){
		//não há acesso público nesta ferramenta.
					return false;
					
					}else{
		
						$nome = $this->CI->session->userdata('username');
						$logged_in = $this->CI->session->userdata('logged_in');
						//$data = $this->CI->session->userdata('data');
						$email = $this->CI->session->userdata('email');
						$id_usuario= $this->CI->session->userdata('id_usuario');
						
						$id_metodo = $resultMetodos[0]->id;
						//echo "<br>id metodo:".$id_metodo.'</br>'; 
						// se o usuario estiver logado, faz a verificação da permissão
						// caso contrário, redireciona para a tela de login
			
						if ($nome && $logged_in && $id_metodo){
		

							$array = array ('id_metodo' => $id_metodo, 'id_usuario' => $id_usuario);
							//print_r($array);
							$qryPermissoes = $this->CI->db->where($array)->get('permissoes');
							$resultPermissoes = $qryPermissoes->result();
				
							if(count($resultPermissoes)==0){
								redirect($this->permitionView, 'refresh');
							} else {
								return true;
								}
						} else {
							redirect ($this->loginView, 'refresh');
						}
						
					}
		
		
		
	}
	
	
	function CheckDbMetodo ($class, $metodo){
		
		// Pesquisa a classe e o método passados como parâmetros em CheckAuth
		// Lança a classe / metodo em DB e retorna as informações de DB
		
		$array = array ('method_class' => $class, 'method_name' => $metodo);
		$qryMetodos = $this->CI->db->where($array)->get('auth_methods');
		$resultMetodos = $qryMetodos->result();
				
		// caso o método passado não esteja na tabela 'metodos'
		// ele é inserido através de  $this->CI->db->insert ('metodos', $data);..
		// a linha abaixo prepara o array para inserir o metodo não encaontrato no db
			if(count($resultMetodos) == 0) {
					$data = array (
						'method_class' => $class,
						'method_name' => $metodo,
						'method_base' => $class.'/'.$metodo,
						'method_active' => 1,
						'method_view' => 1
						
					);
		
			$this->CI->db->insert ('auth_methods', $data);
			
			// refaz a pesquisa em DB e retorna o novo registro
			$array = array ('classe' => $class, 'metodo' => $metodo);
			$qryMetodos = $this->CI->db->where($array)->get('metodos');
			return = $qryMetodos->result();
			
			} else {
				// caso o registro já exista, o resultado é retornado
				return $resultMetodos;		
			}
	
	}

?>
