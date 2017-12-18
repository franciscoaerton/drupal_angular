<?php

$_biblioteca_sh = ; //arquivo para ser executado
$_diretorio_web = ; //diretorio raiz da instalação
$_application_ftp = ; //endereço ftp da applicação -- poder ser local em drupal
$_tar_folder = ; // nome da pasta criada que será expluida apos a instalação

shell_exec('sh $_biblioteca_sh $_diretorio_web $_application_ftp $_tar_folder');

?>
