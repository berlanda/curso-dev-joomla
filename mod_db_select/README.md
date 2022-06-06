Exemplo de utilização de queries de consulta com JDatabase
================

Referências e fontes
---------------------
-   https://docs.joomla.org/Selecting_data_using_JDatabase
-	https://docs.joomla.org/J1.5:Using_the_Joomla!_configuration_in_an_external_script
-	https://docs.joomla.org/Connecting_to_an_external_database

- 	https://api.joomla.org/cms-3/classes/JDatabaseQuery.html
-	https://api.joomla.org/cms-3/classes/JDatabase.html
-	https://api.joomla.org/cms-3/classes/JRequest.html
-	https://www.itoctopus.com/application-instantiation-error-no-database-selected-joomla-error
-	https://forum.joomla.org/viewtopic.php?t=411548
-	https://www.reilldesign.com/tutorials/get-component-module-plugin-template-menu-parameters-in-joomla-3-x.html

Exercício: faça você mesmo
---------------------
1.	Baixe código de https://github.com/berlanda/curso-dev-joomla/archive/refs/heads/master.zip
2.	Descompacte o contjunto de arquivos e compacte novamente apenas o diretório mod_db_update, instalando o pacote resultante a partir do menu Extensões > Gerenciar > Instalar. Procure o arquivo zip resultante e carregue-o para instalar o pacote.
3. Publique o módulo em uma posição visível do template atualmente utilizado
4. Veja os exemplos de códigos e acompanhe os detalhes diretamente no código-fonte do módulo
5. Depois de instalar, vá na raiz do diretório do módulo (modules/mod_db_select) e execute o arquivo SQL para criar uma nova base de dados (CUIDADO: verifique não haver uma base local sua chamada mvc, antes de executar)
5. Depois de executar, copie o arquivo configuration_mvc.php para a raiz e configure-o conforme necessário
7. Acesse a área administrativa do módulo e altere a configuração do parâmetro disponível (Consultar MVC Database)
