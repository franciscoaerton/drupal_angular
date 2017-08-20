#! /bin/bash

echo "Informar o caminho pasta_site: " 
read local_da_pasta;

echo " 
====================================
Dados para criacao: 
Local da Pasta (sem web, na raiz web[x]): '$local_da_pasta'
====================================
";

echo "Confirme as informacoes - 1 'sim', outro valor 'nao': "
read is_confirmed

if [ "$is_confirmed" == 1 ]; then 
	# coloco o ponteiro no diretorio do site:
	cd $local_da_pasta/web;
	
	# baixo arquivos drupal de instalação na pasta do site:
	sudo wget -c https://ftp.drupal.org/files/projects/varbase-8.x-4.06-core.tar.gz;
  sudo wget -c https://ftp.drupal.org/files/projects/drupal-8.3.7.tar.gz;
  
	
	# descompacto o arquivo para uma pasta e deleto o arquivo compactado:
	sudo tar -xvzf varbase-8.x-4.06-core.tar.gz;
  sudo tar -xvzf drupal-8.3.7.tar.gz;
  
  
	sudo rm -rf panopoly-7.x-1.46-core.tar.gz;
	
	# Movimento os arquivos da instalação drupal um diretório acima:
	
  sudo cp -rf varbase-8.x-4.06/* /var/www/clients/client0/web13/web;
  
  sudo cp -rf drupal-8.3.7/* /var/www/clients/client0/web13/web;
  sudo cp -rf drupal-8.3.7/.htaccess /var/www/clients/client0/web13/web;
  
  
  sudo mv  varbase-8.x-4.06/* /var/www/clients/client0/web13/web;
  sudo mv  varbase-8.x-4.06/.htaccess /var/www/clients/client0/web13/web;
  
	sudo rm -rf /var/www/clients/client0/web13/web/*;
  sudo rm -rf panopoly-7.x-1.46; 
	sudo rm -rf panopoly-7.x-1.44;
	
	#movo os arquivos um diretório acima
	
	
	#sudo mv $local_da_pasta/web/distro/* $local_da_pasta/web;
	#sudo mv $local_da_pasta/web/distro/.htaccess $local_da_pasta/web;
		
	#sudo chown web13:client0 -c -R /var/www/html/$nome_da_pasta/public_html/sites; 
  #sudo chown web13:www-data -c -R /var/www/clients/client0/web13/web; 
	
	

else
	echo "Nao houve movimentação de arquivos!";
fi
