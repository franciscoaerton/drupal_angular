#! /bin/bash
# My First Script

echo "Informar o caminho: " 
read local_da_pasta;

echo "Informar path do arquivo drupal da distribuição: " 
read path_distribuicao; 

echo " 
====================================
Dados para criacao: 
Local da Pasta: '$local_da_pasta'
Nome do site: '$path_distribuicao'



====================================
";

echo "Confirma as informacoes - 1 'sim', outro valor 'nao': "
read is_confirmed

if [ "$is_confirmed" == 1 ]; then
	sudo wget -c $path_distribuicao o- $local_da_pasta/web/distro.tar.gz;
	sudo tar -c $local_da_pasta/web -xvzf $local_da_pasta/web/distro.tar.gz;
	sudo mv $local_da_pasta/web/distro/* $local_da_pasta/web;
	sudo mv $local_da_pasta/web/distro/.htaccess $local_da_pasta/web;
		
	sudo chown www-data:www-data -c -R /var/www/html/$nome_da_pasta/public_html/sites;
	
	

else
	echo "Nao houve movimentação de arquivos!";
fi
