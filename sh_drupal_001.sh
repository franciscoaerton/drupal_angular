###### arquivo bash #############
#!/bin/bash

HomeDir=$1;
AplicationFtp=$2;
TarFolderName=$3;

sudo wget -c -P /var/www/html/$nome_da_pasta/public_html https://ftp.drupal.org/files/projects/panopoly-7.x-1.44-core.tar.gz;
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
	

###### arquivo bash #############
#!/bin/bash
NAME="$1"
DIR="$2"

tar -zcf $NAME.tar.gz $DIR

#################################

################### arquivo php #

<?php
shell_exec('sh seu_script.sh nome_qualquer diretorio_qualquer');
?>

#################################

--

#!/bin/bash

    NAME=$1
    DIR=$2

    echo $NAME
    echo $DIR
    tar -zcf $NAME.tar.gz $DIR

--

$file = "script.sh";

   $params = array('filename', 'path');
   $param = ' '.implode(' ', $params);
    if (file_exists($file)) {
       chmod($file, "go+x");
       $string = shell_exec('sh '.$file.$param);
       $data = explode("\n", $string);
       //Nome: filename - Diretório: path
       echo 'Nome: '. $data[0] . ' - Diretório: ' . $data[1]; 
    } else {
      echo 'arquivo  não existe';
    }
--
