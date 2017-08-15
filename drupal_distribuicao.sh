#! /bin/bash

echo "Informar o caminho pasta_site: " 
read local_da_pasta;

echo "Informar path do arquivo distribuicao_drupal: " 
read path_distribuicao; 

echo " 
====================================
Dados para criacao: 
Local da Pasta: '$local_da_pasta'
Nome do site: '$path_distribuicao'
====================================
";

echo "Confirme as informacoes - 1 'sim', outro valor 'nao': "
read is_confirmed

if [ "$is_confirmed" == 1 ]; then 
	# baixo arquivos drupal de instalação
	sudo wget -c $path_distribuicao -O $local_da_pasta/web/distro.tar.gz;
	# descompacto a pasta distro
	sudo tar -xvzf $local_da_pasta/web/distro.tar.gz;
	# deleto todos arquivos tar.gz
	sudo rm -rf $local_da_pasta/web/distro.tar.gz; 
	
	#sudo mv $local_da_pasta/web/distro/* $local_da_pasta/web;
	#sudo mv $local_da_pasta/web/distro/.htaccess $local_da_pasta/web;
		
	#sudo chown www-data:www-data -c -R /var/www/html/$nome_da_pasta/public_html/sites; 
	
	

else
	echo "Nao houve movimentação de arquivos!";
fi
