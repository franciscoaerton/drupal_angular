#! /bin/bash

echo "Informar o caminho pasta_site: " 
# /var/www/clients/client0/web8/ web
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
	# coloco os arquivos de outra instalação:
	scp -r root@sig.adm.br:/var/www/html/core $local_da_pasta/web;
	echo "Arquivos transferidos!";

else
	echo "Nao houve movimentação de arquivos!";
fi
