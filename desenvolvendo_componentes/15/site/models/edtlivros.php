<?php
defined('_JEXEC') or die;
class BibliotecaModelEdtlivros extends JModelList
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
	            'catid', 'a.catid', 'category_title',
	            'autorid', 'a.autor', 'autor_nome',
	            'c.title', 'd.nome'
				);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
		$published = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
		$this->setState('filter.state', $published);
		parent::populateState('a.ordering', 'asc');
	}

	protected function getListQuery()
	{
		$db= $this->getDbo();
		$query = $db->getQuery(true);
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.titulo, a.catid, a.autorid, ' .
           		'a.state, a.editora, a.imagem, a.url, a.ano_publicacao, ' .
           		'a.descricao, '.
           		'a.publish_up, a.publish_down, a.ordering'
				)
		);

		$query->from($db->quoteName('#__biblioteca_livro').' AS a');
		$query->where('(a.state IN (0, 1))');

		$query->select('c.title AS category_title');
		$query->join('LEFT', '#__categories AS c ON c.id = a.catid');

		$query->select('d.nome AS autor_nome');
		$query->join('LEFT', '#__biblioteca_autor AS d ON d.id = a.autorid');

		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('a.id = '.(int) substr($search, 3));
			}
			else
			{
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where('(a.titulo LIKE '.$search.' OR d.nome LIKE
					'.$search.')');
			}
		}
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol.' '.$orderDirn));
		return $query;
	}
}