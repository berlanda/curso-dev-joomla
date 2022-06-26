passo-a-passo.txt

01. criar estrutura de pastas

02. criar arquivos de entrada (entry points) e primeiro xml de instalação. Instale o componente por meio do modo "Discover" ("Pendente" em português)
	a. acesse o componente em backend
	b. acesse o componente em frontend (index.php?option=com_biblioteca)

03. "passar o controle" do componente para a controller.php da raiz e permitir criar item de menu de frontend
	a. veja pasta components/com_biblioteca/views/livros/tmpl/
	b. crie item de menu no frontend para o componente

04. delegar o controle para as views de livros de backend e frontend
	a. acesse o componente em backend
	b. acesse o componente em frontend, repare os códigos já inseridos nas view.html.php e no número maior de linhas que já começa a se apresentar para a default.php de backend

05. ajustar e executar código sql para criar estrutura e dados de exemplo iniciais; e criar as models de livros (backend e frontend), fazendo as 	alterações necessárias nas views de livros
	a. busque o código a partir de administrator/components/com_biblioteca/sql, altere o prefixo #__ para o que está utilizando em sua instalação local e execute o código para criar as tabelas e as informações de exemplo (#__biblioteca_livro e #__biblioteca_autor)
	b. atente para a necessidade de ajustar o prefixo da tabela e repare na nomenclatura que relaciona a tabela ao componente
	c. observe o join left nas models e os parâmetros de ordenação na model de backend recém criada

06. criar as controllers específicas de livros em backend e frontend, bem como criar a model livro de backend e a classe table correspondente; modificar a view.html.php de backend/livros para permitir ações de alteração de estado dos itens; modificar a model de frontend para exibir somente os itens publicados
	a. teste publicar e despublicar itens de backend, copiando um arquivo por vez, na ordem: controller livros de backend, model livro de backend e depois table livro (backend)
	b. acesse a página em frontend e perceba que os itens despublicados não são apresentados
	c. utilize outros botões e múltiplas seleções para publicar, despublicar, mandar para a lixeira ou retornar itens. Não os apague definitivamente
	d. Observe o erro ao tentar criar ou editar um item

07. criar pasta images/com_biblioteca no site e copiar para ela os arquivos constantes em 07/media/com_biblioteca/images/; copiar diretório 07/media/com_biblioteca/ para media/com_biblioteca/; alterar o arquivo de entrada de frontend para adicionar arquivo css recém adicionado na pasta media; modificar a view.html.php de backend/livros para adicionar  primeiro filtro de backend e botão de preferências do componente;
	a. altere novamente os estados e experimente utilizar o filtro lateral
	b. utilize o botão de opções do componente, o que resultará em erro (esperado para o momento)
	c. recarregue a view de frontend e veja como a página está apresentada, a partir do carregamento do css

08. criar controller livro.php em backend; criar view para livro e arquivo default.php equivalente; alterar model livro.php e criar form livro.xml com campos da tabela (tudo em backend)
	a. a cada etapa, clique nas opções de editar ou criar novo item para se habituar às mensagens de erro normalmente retornadas
	b. edite as informações de um livro e crie outro, como exemplo. Use uma imagem já existente para ganhar tempo
	
09. criar helper.php de backend para apoiar AGORA no controle de itens de menu do componente, e FUTURAMENTE no controle de permissões por categoria; fazer inclusão (require_once) do arquivo helper.php a partir da controller principal da raiz; alterar view.html.php de livros para poder incluir método de menus da helper; criar arquivo de configuração ACL para permitir o funcionamento correto do link de categorias do componente, bem como registrar as permissões apropriadas, se necessário; testar; executar o arquivo sql corresponde à versão 0.9.0 para adicionar a coluna de categoria à tabela #__biblioteca_livro; alterar a model livros para inserir a coluna nas consultas; alterar as views para inserir a coluna de categoria a visuação (e ediçao), incluindo a default.php; alterar o xml responsável pelo formulário de cadastro de livro; testar; alterar o xml de instalação para incluir menu de categorias (só ficará disponível ao reinstalar o componente, então só faça isso ao final)

	a. observe o conteúdo do arquivo access.xml e perceba que o controle básico de permissões do componente, bem como o controle de nível de categoria, exige basicamente o mesmo padrão de arquivo xml, independentemente do componente utilizado
	b. crie as categorias que quiser ou siga a sugestão a seguir vinculando os livros da seguinte forma:

		Romance > Dom Casmurro
		Jornalismo literário > O Reacionário
		Fantasia > Crônicas de Nárnia
		New Age: Religião e Espiritualidade > 12 Regras para a vida
		Psicologia e Filosofia > Por que fazemos o que fazemos?
		Relacionamentos > As Cinco Linguagens do Amor
		Ficção Científica > A Garota do Lago

10. alterar arquivo default.xml a fim de poder escolher a categoria do link na lista de livros em frontend; alterar a model livros de frontend para incluir informação de categoria e também para poder filtrar por categoria; criar arquivo config.xml na raiz do componente de backend para permitir parâmetros de configuração globais para o componente, bem como configurar tipos de permissão mais gerais para o componente (passo necessário para configurar permissões mais específicas para categorias, em todo o componente); incluir controller, model e view para visualização de livro único em frontend (view=livro&id={ID_DO_LIVRO}); alterar view de livros (plural) para apontar para view de livro (singular)

	a. na model livros de frontend, observe o código adicionado junto ao filtro de categoria para apresentar somente livros com imagem de capa cadastrada: esse código demonstra como personalizar consultas de acordo com o adapter utilizado, caso seja necessário

	b. altere os parâmetros do componente e teste os diferentes tipos ao clicar nos livros da lista de frontend

	c. Crie um item de menu novo apontado para categoria específica de livros;

11. criar filtros de lista em backend, incluindo paginação; incluir links nos itens da lista direto para edição; inserir opções para permitir ordenação por drag and drop, desde a controller até chegar na view de lista de livros; inserir os primeiros controles de permissão no nível da default.php de livros; ordenar a lista de livros em frontend pela ordenação definida ao arrastar itens em backend (campo ordering)
	
	a. altere a ordenação e perceba as mudancas em frontend

	b. observe que as funções de ordenação e filtro sao quase todas padronizadas, podendo ser replicadas em seus próximos componentes facilmente

12. estender o nível de controle de permissões até o nível de categoria, começando por criar função específica na helper do componente; revisar todos os arquivos de backend, a fim de incluir as permissões necessárias

	a. crie um usuário manager ou editor
	b. faça teste de controle de permissões para ele, primeiro em nível de categoria e depois em nível de componente


13. criar edição de autores em backend (cópia de pasta); criar arquivos de tradução de backend e frontend; alterar função da helper para adicionar novo item de menu para autores; alterar o xml de instalação para incluir menu de autores (só ficará disponível ao reinstalar o componente, faça isso somente ao final)

	a. aproveite o exemplo para verificar as strings de tradução utilizadas no exemplo: pasta autores em backend

14. criar edição livros em frontend, criando controllers, models e views edtlivro e edtlivros; não esquecer das strings de tradução em frontend

	a. edite itens em frontend

15. empacotar para instalação: retirar arquivos dos diretórios com_biblioteca, dentro de site e admin (subir um nível), e apagar diretórios com_biblioteca; mover biblioteca.xml para a raiz do diretório de instalação; criar arquivo script.php na raiz; detalhar o arquivo biblioteca.xml, utilizando strings de tradução; e padronizar os arquivos sql de instalação

	a. crie uma nova instalação do CMS Joomla, instale o idioma pt-BR e depois instale o componente, em sua versão final. Faça os cadastros, confirme se o diretório images/com_bibliotecas foi criado e crie os itens de menu de frontend.

	b. PARABÉNS! seu componente está pronto.



