<?php
defined('_JEXEC') or die;
class BibliotecaModelLivros extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'titulo', 'a.titulo',
				'state', 'a.state',
           		'editora', 'a.editora',
	            'publish_up', 'a.publish_up',
	            'publish_down', 'a.publish_down',
	            'ordering', 'a.ordering',
	            'autorid', 'a.autor', 'autor_nome',
	            'd.nome'
				);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		$catid = JRequest::getInt('catid');
		$this->setState('catid', $catid);
	}

	protected function getListQuery()
	{
		$db    = $this->getDbo();
		$query  = $db->getQuery(true);
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.titulo, a.autorid, ' .
           		'a.state, a.editora, a.imagem, a.ano_publicacao, a.url, ' .
           		'a.publish_up, a.publish_down, a.ordering'
				)
		);
		$query->from($db->quoteName('#__biblioteca_livro').' AS a');
		$query->where('(a.state = 1)');

		$query->select('c.title AS category_title');
		$query->join('LEFT', '#__categories AS c ON c.id = a.catid');

		$query->select('d.nome AS autor_nome');
		$query->join('LEFT', '#__biblioteca_autor AS d ON d.id = a.autorid');

		$dbtype = JFactory::getApplication()->getCfg('dbtype');
		if($dbtype == 'sqlsrv')
		{
		 $query->where("a.imagem NOT LIKE ''");
		}else{
		 $query->where('a.imagem!=""');
		}

		if ($categoryId = $this->getState('catid'))
		{
			$query->where('a.catid = '.(int) $categoryId);
		}

		return $query;
	}
}