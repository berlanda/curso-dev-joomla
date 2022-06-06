Exemplo de utilização de queries de inserção, alteração ou deleção com JDatabase
================

Exercício: faça você mesmo
---------------------
1.	Baixe código de https://github.com/berlanda/curso-dev-joomla/archive/refs/heads/master.zip
2.	Descompacte o contjunto de arquivos e compacte novamente apenas o diretório mod_db_update, instalando o pacote resultante a partir do menu Extensões > Gerenciar > Instalar. Procure o arquivo zip resultante e carregue-o para instalar o pacote.
3. Publique o módulo em uma posição visível do template atualmente utilizado
4. Acesse o site e autentique-se na área pública do site
5. Localize-o na tela e atualize a janela do navegador mais de uma vez para ver a diferença, vendo as alternâncias de conteúdos
6. Acesse a base de dados diretamente e verifique a diferença do uppercase e lowercase, na tabela #__users
7. Acesse a base de dados diretamente e verifique as inserções e alterações na tabela #__user_profiles
8. Passe o parâmetro msg2 na URL e veja alteração da segunda mensagem, referente à informação profile.message2

Referências
---------------------
-   https://docs.joomla.org/Special:MyLanguage/Inserting,_Updating_and_Removing_data_using_JDatabase
-	https://gist.github.com/ChrisFrench/4275209 (Accessing the Custom Fields in Joomla User Profile)
-	https://www.joomlashack.com/blog/joomla/user-profile-plugin/
-	https://docs.joomla.org/Retrieving_request_data_using_JInput
-	https://docs.joomla.org/Creating_a_profile_plugin
-	https://docs.joomla.org/Accessing_the_current_user_object
-	https://docs.joomla.org/API17:JDatabase::insertid