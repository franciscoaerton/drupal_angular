#! /bin/bash
# My First Script

echo "Informar o nome da nova pasta: " 
read nome_da_pasta;

echo "Informar o nome do site: " 
read nome_do_site;

echo " 
====================================
Dados para criacao: 
Pasta a ser criada: '$nome_da_pasta'
Nome do site: '$nome_do_site'
====================================
";

echo "Confirma as informacoes - 1 'sim', outro valor 'nao': "
read is_confirmed

if [ "$is_confirmed" == 1 ]; then
	sudo mkdir /var/www/html/$nome_da_pasta;
	sudo mkdir /var/www/html/$nome_da_pasta/public_html;
	sudo mkdir /var/www/html/$nome_da_pasta/log;
	sudo mkdir /var/www/html/$nome_da_pasta/backups;
	sudo wget -c -P /var/www/html/$nome_da_pasta/public_html https://ftp.drupal.org/files/projects/panopoly-7.x-1.44-core.tar.gz;
	sudo tar -C /var/www/html/$nome_da_pasta/public_html -xvzf /var/www/html/$nome_da_pasta/public_html/panopoly-7.x-1.44-core.tar.gz;
	sudo rm /var/www/html/$nome_da_pasta/public_html/panopoly-7.x-1.44-core.tar.gz;
	sudo rm -rf ./panopoly-7.x-1.44;
	sudo mv /var/www/html/$nome_da_pasta/public_html/panopoly-7.x-1.44/* /var/www/html/$nome_da_pasta/public_html/;
	sudo mv /var/www/html/$nome_da_pasta/public_html/panopoly-7.x-1.44/* /var/www/html/$nome_da_pasta/public_html/;
	sudo mv /var/www/html/$nome_da_pasta/public_html/panopoly-7.x-1.44/.htaccess /var/www/html/$nome_da_pasta/public_html/;
	sudo mv /var/www/html/$nome_da_pasta/public_html/panopoly-7.x-1.44/.gitignore /var/www/html/$nome_da_pasta/public_html/;
	sudo rm -rf /var/www/html/$nome_da_pasta/public_html/panopoly-7.x-1.44;
	sudo chown www-data:www-data -c -R /var/www/html/$nome_da_pasta/public_html/sites;
	
	#sudo nano /etc/apache2/sites-available/core.conf
	#sudo a2ensite core.conf
	
	sudo service apache2 restart;

else
	echo "Nao houve criacao de pastas!";
fi



