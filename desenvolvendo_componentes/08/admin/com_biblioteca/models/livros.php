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
		$search = $this->getUserStateFromRequest(
			$this->context.'.filter.search', 'filter_search');
       	$this->setState('filter.search', $search);

		$published = $this->getUserStateFromRequest(
			$this->context.'.filter.state', 'filter_state',
			'', 'string');
    	$this->setState('filter.state', $published);
	    
	    parent::populateState('a.ordering', 'asc');
	}

	protected function getListQuery()
	{
		$db    = $this->getDbo();
		$query  = $db->getQuery(true);
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.titulo, a.autorid, ' .
           		'a.state, a.editora, ' .
           		'a.publish_up, a.publish_down, a.ordering'
				)
			);
		$query->from($db->quoteName('#__biblioteca_livro').' AS a');

		$query->select('d.nome AS autor_nome');
		$query->join('LEFT', '#__biblioteca_autor AS d ON d.id = a.autorid');

		$published = $this->getState('filter.state');
	    if (is_numeric($published))
	    {
	      $query->where('a.state = '.(int) $published);
	    }
	    elseif ($published === '')
	    {
	      $query->where('(a.state IN (0, 1))');
	    }

		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');

		$query->order($db->escape($orderCol.' '.$orderDirn));

		return $query;
	}

}